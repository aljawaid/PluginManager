<?php

namespace Kanboard\Plugin\PluginManager\Helper;

use Kanboard\Core\Base;
use Kanboard\Core\Plugin\Directory;

/**
 * Plugin PluginManager
 * Class PluginManagerHelper
 *
 * @package  Plugin\PluginManager\Helper
 * @author   aljawaid
 * @author   creecros       Craig Crosby
 * @author   alfredbuehler  Alfred Bühler
 * @author   cptsanifair    Cpt. Sanifair
 *
 * Related test file: tests/DirectoryDataTest.php.
 */
class PluginManagerHelper extends Base
{
    private array $manualPluginCache = array();
    private array $installablePluginCache = array();
    private array $svgIconCache = array();

    /**
     * Get SVG Icons for Inline Markup and CSS Styling (Embed SVG Fly Method)
     *
     * Include filename as class inside SVG file
     * Set 'color' as 'currentColor' to use CSS or define a color
     * Style using normal CSS
     * @uses    $this->helper->myHelper->embedSVGIcon('icon-filename-without-extension')
     * @var     $svgFilename
     * @return  svg
     * @author  Erik Moberg https://www.erikmoberg.net/article/embed-svg-icons-in-html-with-php
     * @author  aljawaid
     */
    public function embedSVGIcon($icon_filename)
    {
        if (! is_string($icon_filename) || preg_match('/^[A-Za-z0-9_-]+$/', $icon_filename) !== 1) {
            return '';
        }

        $pluginName = $this->router->getPlugin() ? $this->helper->app->getPluginName() : 'PluginManager';
        if (! is_string($pluginName) || preg_match('/^[A-Za-z0-9_-]+$/', $pluginName) !== 1) {
            return '';
        }

        $iconRoot = realpath(PLUGINS_DIR . DIRECTORY_SEPARATOR . $pluginName . DIRECTORY_SEPARATOR . 'Assets' . DIRECTORY_SEPARATOR . 'icons');
        $iconPath = $iconRoot === false ? false : realpath($iconRoot . DIRECTORY_SEPARATOR . $icon_filename . '.svg');

        if ($iconPath === false || dirname($iconPath) !== $iconRoot) {
            return '';
        }

        if (! array_key_exists($iconPath, $this->svgIconCache)) {
            $contents = file_get_contents($iconPath);
            $this->svgIconCache[$iconPath] = is_string($contents) ? $contents : '';
        }

        return $this->svgIconCache[$iconPath];
    }

    /**
     * Get README File Based on Domain
     *
     * @access  public
     * @see     /plugin/show.php
     * @var     $url
     * @return  string
     * @author  aljawaid
     * @author  cptsanifair     Cpt. Sanifair
     */
    public function checkRootDomain($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }

        $domain = implode('.', array_slice(explode('.', parse_url($url, PHP_URL_HOST)), -2));

        switch ($domain) {
            case 'github.com':
                return '/blob/master/README.md';
            case 'gitlab.com':
                return '/-/blob/master/README.md';
            case 'gitea.com':
                return '/src/branch/main/README.md';
            case 'codeberg.org':
                return '/src/branch/master/README.md';
            default:
                return false;
        }
    }

    /**
     * Count Total Types
     *
     * @var     $available_plugins
     * @return  int
     * @author  creecros       Craig Crosby
     * @author  cptsanifair    Cpt. Sanifair
     */
    public function countTypes($available_plugins)
    {
        $types = array();

        foreach ($available_plugins as $plugin) {
            $pluginType = $plugin['is_type'] ?? null;

            if (in_array($pluginType, array('plugin', 'action', 'theme', 'multi', 'connector'), true)) {
                $types[] = $pluginType;
            }
        }

        $count_types = array_count_values($types);

        return $count_types;
    }

    /**
     * Get All Plugins
     *
     * @var     $url            string
     * @return  int
     * @author  aljawaid
     * @author  cptsanifair     Cpt. Sanifair
     */
    public function getAllPlugins($url = PLUGIN_API_URL)
    {
        if (! array_key_exists($url, $this->manualPluginCache)) {
            $plugins = $this->httpClient->getJson($url);
            $this->manualPluginCache[$url] = is_array($plugins)
                ? array_filter($plugins, array($this, 'isNotInstallable'))
                : array();
        }

        return $this->manualPluginCache[$url];
    }

    /**
     * Get Not Installable Plugins
     *
     * @return  int
     * @author  aljawaid
     * @author  cptsanifair     Cpt. Sanifair
     */
    public function isNotInstallable(array $plugin)
    {
        return ($plugin['remote_install'] ?? null) === false;
    }

    /**
     * Get Timestamp of Remote File
     *
     * Snippet from: https://www.appsloveworld.com/php/12/get-the-last-modified-date-of-a-remote-file
     * @access  public
     * @return  string
     * @author  aljawaid
     */
    public function lastUpdatedDirectory()
    {
        $curlCheck = $this->httpClient->backend();

        if ($curlCheck !== 'cURL') {
            return t('Not available');
        }

        $curl = curl_init(PLUGIN_API_URL);
        if ($curl === false) {
            return t('Not available');
        }

        curl_setopt_array($curl, array(
            CURLOPT_NOBODY => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FILETIME => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
        ));

        // Honour the Kanboard transport setting for custom directory endpoints.
        if (HTTP_VERIFY_SSL_CERTIFICATE === false) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        }

        $result = curl_exec($curl);
        $timestamp = $result === false ? -1 : curl_getinfo($curl, CURLINFO_FILETIME);

        if (is_int($timestamp) && $timestamp >= 0) {
            return date('d F Y H:i', $timestamp);
        }

        return t('Not available');
    }

    /**
     * Create List of Updatable Plugins
     *
     * @return  array with plugin titles
     * @author  creecros    Craig Crosby
     */
    public function getPluginUpdates(?array $availablePlugins = null): array
    {
        $installedPlugins = array();
        $updatables = array();

        foreach ($this->pluginLoader->getPlugins() as $plugin) {
            $installedPlugins[$plugin->getPluginName()] = $plugin->getPluginVersion();
        }

        foreach ($availablePlugins ?? $this->getAllInstallablePlugins() as $pluginId => $plugin) {
            if ($this->isPluginUpdateAvailable($installedPlugins, (string) $pluginId, $plugin)) {
                $updatables[$pluginId] = $plugin['download'] ?? '';
            }
        }

        return $updatables;
    }

    /**
     * Get All Plugins Available
     *
     * Duplicate function of 'Kanboard\Core\Plugin\Directory\getAvailablePlugins()'
     * @see     getAvailablePlugins()
     * @access  public
     * @var     $url
     * @param   string
     * @return  array
     */
    public function getAllInstallablePlugins($url = PLUGIN_API_URL)
    {
        if (! array_key_exists($url, $this->installablePluginCache)) {
            $plugins = Directory::getInstance($this->container)->getAvailablePlugins($url);
            $this->installablePluginCache[$url] = is_array($plugins) ? $plugins : array();
        }

        return $this->installablePluginCache[$url];
    }

    /**
     * Sort directory entries by their display title without losing their plugin IDs.
     */
    public function sortPluginsByTitle(array $plugins): array
    {
        uasort($plugins, static function (array $left, array $right): int {
            return strcasecmp((string) ($left['title'] ?? ''), (string) ($right['title'] ?? ''));
        });

        return $plugins;
    }

    /**
     * Compare versions against the stable directory ID rather than the display title.
     */
    public function isPluginUpdateAvailable(array $installedPlugins, string $pluginId, array $plugin): bool
    {
        return isset($installedPlugins[$pluginId], $plugin['version'])
            && version_compare((string) $installedPlugins[$pluginId], (string) $plugin['version'], '<');
    }

    /**
     * Return a safe external HTTP(S) URL or an empty string for invalid directory data.
     */
    public function getExternalUrl($url): string
    {
        if (! is_string($url) || filter_var($url, FILTER_VALIDATE_URL) === false) {
            return '';
        }

        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        return in_array($scheme, array('http', 'https'), true) ? $url : '';
    }
}
