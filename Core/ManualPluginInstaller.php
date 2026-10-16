<?php

namespace Kanboard\Plugin\PluginManager\Core;

use Kanboard\Core\Plugin\Installer;
use Kanboard\Core\Plugin\PluginInstallerException;
use Kanboard\Core\Tool;
use ZipArchive;

/**
 * Installs a validated manual plugin archive without extracting partial files into the live plugin directory.
 *
 * Related test file: tests/SecurityBoundaryTest.php.
 */
class ManualPluginInstaller extends Installer
{
    private const MAX_ARCHIVE_FILES = 2000;
    private const MAX_UNCOMPRESSED_BYTES = 52428800;

    /**
     * Install a manual plugin from an HTTP or HTTPS URL.
     *
     * @throws PluginInstallerException
     */
    public function installFromUrl(string $archiveUrl): void
    {
        $zip = $this->downloadPluginArchive($archiveUrl);

        try {
            $this->installArchive($zip);
        } finally {
            $this->cleanupArchive($zip);
        }
    }

    /**
     * Install a manual plugin from an uploaded ZIP file.
     *
     * @throws PluginInstallerException
     */
    public function installFromFile(string $archiveFile): void
    {
        if (! is_file($archiveFile)) {
            throw new PluginInstallerException(t('Plugin archive file not found'));
        }

        $zip = new ZipArchive();
        $isOpen = false;

        try {
            if ($zip->open($archiveFile) !== true) {
                throw new PluginInstallerException(t('Unable to open the plugin archive'));
            }

            $isOpen = true;
            $this->installArchive($zip);
        } finally {
            if ($isOpen) {
                $zip->close();
            }

            if (is_file($archiveFile)) {
                unlink($archiveFile);
            }
        }
    }

    /**
     * Validate and stage the archive before one same-filesystem move makes it live.
     *
     * @throws PluginInstallerException
     */
    private function installArchive(ZipArchive $zip): void
    {
        $pluginName = $this->validateArchive($zip);
        $targetDirectory = PLUGINS_DIR . DIRECTORY_SEPARATOR . $pluginName;

        if (file_exists($targetDirectory) || is_link($targetDirectory)) {
            throw new PluginInstallerException(t('The plugin is already installed'));
        }

        $stagingDirectory = $this->createStagingDirectory();

        try {
            if (! $zip->extractTo($stagingDirectory)) {
                throw new PluginInstallerException(t('Unable to extract the plugin archive'));
            }

            $stagedPlugin = $stagingDirectory . DIRECTORY_SEPARATOR . $pluginName;

            if (! is_file($stagedPlugin . DIRECTORY_SEPARATOR . 'Plugin.php') || ! rename($stagedPlugin, $targetDirectory)) {
                throw new PluginInstallerException(t('Unable to prepare the plugin installation'));
            }
        } finally {
            if (is_dir($stagingDirectory)) {
                Tool::removeAllFiles($stagingDirectory);
            }
        }
    }

    /**
     * Check archive paths, size, shape and plugin identity before extraction.
     *
     * @throws PluginInstallerException
     */
    private function validateArchive(ZipArchive $zip): string
    {
        if ($zip->numFiles === 0 || $zip->numFiles > self::MAX_ARCHIVE_FILES) {
            throw new PluginInstallerException(t('The plugin archive exceeds the installation limits'));
        }

        $pluginDirectories = array();
        $uncompressedBytes = 0;

        for ($index = 0; $index < $zip->numFiles; $index++) {
            $entry = $zip->statIndex($index);

            if ($entry === false || ! $this->isSafeArchivePath($entry['name']) || $this->isSymbolicLink($zip, $index)) {
                throw new PluginInstallerException(t('The plugin archive contains unsafe files'));
            }

            $uncompressedBytes += (int) ($entry['size'] ?? 0);
            if ($uncompressedBytes > self::MAX_UNCOMPRESSED_BYTES) {
                throw new PluginInstallerException(t('The plugin archive exceeds the installation limits'));
            }

            $normalisedName = rtrim($entry['name'], '/');
            $pluginDirectory = explode('/', $normalisedName, 2)[0];
            $pluginDirectories[$pluginDirectory] = true;
        }

        if (count($pluginDirectories) !== 1) {
            throw new PluginInstallerException(t('The plugin archive contains unsafe files'));
        }

        $pluginDirectory = (string) array_key_first($pluginDirectories);
        $pluginFile = $zip->getFromName($pluginDirectory . '/Plugin.php');

        if ($pluginFile === false) {
            throw new PluginInstallerException(t("File 'Plugin.php' could not get extracted"));
        }

        $namespace = $this->getPluginNamespace($pluginFile);
        if ($pluginDirectory !== $namespace) {
            throw new PluginInstallerException(t(
                'The directory name (%s) does not match with the namespace (%s)',
                $pluginDirectory,
                $namespace
            ));
        }

        $pluginName = $this->getPluginName($pluginFile);
        if ($pluginName !== $namespace) {
            throw new PluginInstallerException(t(
                'The plugin name (%s) does not match with the namespace (%s)',
                $pluginName,
                $namespace
            ));
        }

        return $pluginName;
    }

    private function isSafeArchivePath(string $entryName): bool
    {
        if ($entryName === '' || str_contains($entryName, "\0") || str_contains($entryName, '\\') || str_contains($entryName, ':')) {
            return false;
        }

        $normalisedName = rtrim($entryName, '/');
        if ($normalisedName === '' || str_starts_with($normalisedName, '/')) {
            return false;
        }

        $segments = explode('/', $normalisedName);
        foreach ($segments as $segment) {
            if ($segment === '' || $segment === '.' || $segment === '..') {
                return false;
            }
        }

        return preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $segments[0]) === 1;
    }

    private function isSymbolicLink(ZipArchive $zip, int $index): bool
    {
        $operatingSystem = 0;
        $attributes = 0;

        return $zip->getExternalAttributesIndex($index, $operatingSystem, $attributes)
            && (($attributes >> 16) & 0170000) === 0120000;
    }

    /**
     * Extract the plugin name from its namespace declaration without executing archive code.
     *
     * @throws PluginInstallerException
     */
    private function getPluginNamespace(string $pluginFile): string
    {
        $matches = array();

        if (preg_match('/^\s*namespace\s+Kanboard\\\\Plugin\\\\([A-Za-z_][A-Za-z0-9_]*)\s*;/m', $pluginFile, $matches) !== 1) {
            throw new PluginInstallerException(t('The namespace was not found'));
        }

        return $matches[1];
    }

    /**
     * Extract the declared plugin name without executing archive code.
     *
     * @throws PluginInstallerException
     */
    private function getPluginName(string $pluginFile): string
    {
        $matches = array();
        $pattern = '/public\s+function\s+getPluginName\s*\(\s*\)\s*(?::\s*string\s*)?'
            . '\{.*?\breturn\s+([\'\"])([A-Za-z_][A-Za-z0-9_]*)\1\s*;/s';

        if (preg_match($pattern, $pluginFile, $matches) !== 1) {
            throw new PluginInstallerException(t('The plugin name was not found'));
        }

        return $matches[2];
    }

    /**
     * Create a private staging directory on the live plugin filesystem.
     *
     * Keeping the directory on the same filesystem makes the final rename atomic. The
     * temporary directory cannot be loaded as a plugin because it has no root Plugin.php.
     *
     * @throws PluginInstallerException
     */
    private function createStagingDirectory(): string
    {
        try {
            $temporaryPath = PLUGINS_DIR . DIRECTORY_SEPARATOR . '.pluginmanager-stage-' . bin2hex(random_bytes(16));
        } catch (\Throwable $exception) {
            throw new PluginInstallerException(t('Unable to prepare the plugin installation'));
        }

        if (! mkdir($temporaryPath, 0700)) {
            throw new PluginInstallerException(t('Unable to prepare the plugin installation'));
        }

        return $temporaryPath;
    }
}
