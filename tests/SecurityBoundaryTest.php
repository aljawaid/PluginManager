<?php

namespace Kanboard\Plugin\PluginManager\Tests;

use Kanboard\Controller\BaseController;
use Kanboard\Controller\PluginController;
use Kanboard\Core\Plugin\PluginInstallerException;
use Kanboard\Core\Security\Role;
use Kanboard\Plugin\PluginManager\Controller\PluginManagerController;
use Kanboard\Plugin\PluginManager\Core\ManualPluginInstaller;
use Kanboard\Plugin\PluginManager\Plugin;
use Pimple\Container;
use ZipArchive;

/**
 * Verifies Plugin.php, Controller/PluginManagerController.php and Core/ManualPluginInstaller.php.
 */
final class SecurityBoundaryTest
{
    public function run(Container $container, string $sandbox, TestAssertions $assertions): void
    {
        $this->testAdministratorAccessMap($container, $assertions);
        $this->testControllerSurface($assertions);
        $this->testArchiveValidation($container, $sandbox, $assertions);
    }

    private function testAdministratorAccessMap(Container $container, TestAssertions $assertions): void
    {
        $plugin = new Plugin($container);
        $plugin->initialize();

        foreach (array('show', 'showPluginInfo', 'showManualPlugins', 'installPlugin') as $action) {
            $assertions->same(
                array(Role::APP_ADMIN),
                $container['applicationAccessMap']->getRoles('PluginManagerController', $action),
                'The ' . $action . ' action must require an administrator'
            );
        }
    }

    private function testControllerSurface(TestAssertions $assertions): void
    {
        $assertions->true(
            is_subclass_of(PluginManagerController::class, BaseController::class),
            'PluginManagerController must use Kanboard BaseController'
        );
        $assertions->true(
            ! is_subclass_of(PluginManagerController::class, PluginController::class),
            'PluginManagerController must not expose native plugin installer actions'
        );

        foreach (array('install', 'update', 'confirm', 'uninstall') as $inheritedAction) {
            $assertions->true(
                ! method_exists(PluginManagerController::class, $inheritedAction),
                'PluginManagerController must not expose ' . $inheritedAction
            );
        }
    }

    private function testArchiveValidation(Container $container, string $sandbox, TestAssertions $assertions): void
    {
        $installer = new ManualPluginInstaller($container);
        $safeArchive = $sandbox . DIRECTORY_SEPARATOR . 'safe-plugin.zip';
        $this->createArchive($safeArchive, array(
            'FixturePlugin/Plugin.php' => $this->fixturePluginSource(),
            'FixturePlugin/README.md' => '# Fixture plugin',
        ));

        $installer->installFromFile($safeArchive);
        $assertions->true(
            is_file(PLUGINS_DIR . DIRECTORY_SEPARATOR . 'FixturePlugin' . DIRECTORY_SEPARATOR . 'Plugin.php'),
            'A valid archive must install its complete plugin directory'
        );
        $assertions->true(! is_file($safeArchive), 'The uploaded archive must be removed after installation');

        $existingArchive = $sandbox . DIRECTORY_SEPARATOR . 'existing-plugin.zip';
        $this->createArchive($existingArchive, array(
            'FixturePlugin/Plugin.php' => $this->fixturePluginSource(),
        ));
        $assertions->same(
            'The plugin is already installed',
            $this->captureInstallerFailure($installer, $existingArchive),
            'An existing plugin directory must never be overwritten'
        );

        $unsafeArchive = $sandbox . DIRECTORY_SEPARATOR . 'unsafe-plugin.zip';
        $this->createArchive($unsafeArchive, array(
            'UnsafePlugin/Plugin.php' => str_replace('FixturePlugin', 'UnsafePlugin', $this->fixturePluginSource()),
            '../outside.txt' => 'unsafe',
        ));
        $assertions->same(
            'The plugin archive contains unsafe files',
            $this->captureInstallerFailure($installer, $unsafeArchive),
            'Archive traversal paths must be rejected'
        );
        $assertions->true(
            ! file_exists($sandbox . DIRECTORY_SEPARATOR . 'outside.txt')
                && ! file_exists(PLUGINS_DIR . DIRECTORY_SEPARATOR . 'UnsafePlugin'),
            'A rejected archive must not create live or escaped files'
        );

        $stagingDirectories = glob(PLUGINS_DIR . DIRECTORY_SEPARATOR . '.pluginmanager-stage-*');
        $assertions->same(array(), $stagingDirectories ?: array(), 'Private staging directories must be removed');
    }

    private function createArchive(string $path, array $files): void
    {
        $zip = new ZipArchive();

        if ($zip->open($path, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Unable to create test archive: ' . $path);
        }

        foreach ($files as $name => $contents) {
            $zip->addFromString($name, $contents);
        }

        $zip->close();
    }

    private function captureInstallerFailure(ManualPluginInstaller $installer, string $archive): string
    {
        try {
            $installer->installFromFile($archive);
        } catch (PluginInstallerException $exception) {
            return $exception->getMessage();
        }

        throw new \RuntimeException('The archive installation unexpectedly succeeded: ' . $archive);
    }

    private function fixturePluginSource(): string
    {
        return <<<'PHP'
<?php

namespace Kanboard\Plugin\FixturePlugin;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function getPluginName()
    {
        return 'FixturePlugin';
    }
}
PHP;
    }
}
