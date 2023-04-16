<?php

namespace Kanboard\Plugin\PluginManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;
use Kanboard\Core\Plugin\Installer;
use Kanboard\Core\Plugin\PluginInstallerException;
use ZipArchive;

/**
 * Class PluginManager
 * 
 * @author aljawaid
 * 
 */

class PluginManagerController extends \Kanboard\Controller\PluginController
{
	/**
     * Display the Plugin Problems Page
     *
     * @access public
     */

    public function show()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:info/plugin-problems', array(
            'title' => t('Plugins').' &#10562; '.t('Plugin Problems'),
        )));
    }

    /**
     * Install a plugin.
     */
    public function installPlugin()
    {
        if (strlen($archiveURL = urldecode($this->request->getValue('plugin_url'))) > 0) {
            $this->installByURL($archiveURL);
        }

        if (strlen($archiveFile = $this->request->getFilePath('plugin_file')) > 0) {
            $this->installByFile($archiveFile);
        }

        $this->response->redirect($this->helper->url->to('PluginController', 'show'));
    }

    /**
     * Install a plugin from URL.
     *
     * @param string $archiveUrl
     */
    private function installByURL(string $archiveUrl)
    {
        try {
            $installer = new Installer($this->container);
            $installer->install($archiveUrl);
            $this->flash->success(t('Plugin installed successfully'));
        } catch (PluginInstallerException $e) {
            $this->flash->failure($e->getMessage());
        }
    }

    /**
     * Install a plugin from file.
     *
     * @param string $archiveFile
     */
    private function installByFile(string $archiveFile)
    {
        if (file_exists($archiveFile)) {
            $zip = new ZipArchive();

            try {
                if ($zip->open($archiveFile) !== true) {
                    throw new PluginInstallerException(t('Unable to open plugin archive'));
                }

                if ($zip->numFiles === 0) {
                    throw new PluginInstallerException(t('There is no file in the plugin archive'));
                }

                if ($zip->locateName('Plugin.php', ZipArchive::FL_NODIR) === false) {
                    throw new PluginInstallerException(t('This file is not recognised as a plugin'));
                }

                if (!$zip->extractTo(PLUGINS_DIR)) {
                    $zip->close();
                    throw new PluginInstallerException(t('Unable to extract plugin archive'));
                }

                $zip->close();
                $this->flash->success(t('Plugin installed successfully'));
            } catch (PluginInstallerException $e) {
                $this->flash->failure($e->getMessage());
            }

            unlink($archiveFile);
        } else {
            $this->flash->failure(t('Plugin archive file not found'));
        }
    }

    /**
     * Display the Plugin Info Page
     *
     * @access public
     */

    public function showPluginInfo()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:info/plugin-info', array(
            'title' => t('Plugins').' &#10562; '.t('Plugin Info'),
            'available_plugins' => Directory::getInstance($this->container)->getAvailablePlugins()
        )));
    }

    /**
     * Display the Manual Plugins Page
     *
     * @access public
     */

    public function showManualPlugins()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:plugin/manual-plugins', array(
            'title' => t('Manual Plugins'),
        )));
    }
}
