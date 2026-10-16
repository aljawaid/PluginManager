<?php

namespace Kanboard\Plugin\PluginManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Core\Plugin\Directory;
use Kanboard\Core\Plugin\Installer;
use Kanboard\Core\Plugin\PluginInstallerException;
use Kanboard\Plugin\PluginManager\Core\ManualPluginInstaller;

/**
 * Plugin PluginManager
 *
 * Class PluginManagerController
 * @package  Kanboard\Controller
 * @author   Frederic Guillot
 * @author   aljawaid
 * @author   alfredbuehler Alfred Bühler
 *
 * Related test file: tests/SecurityBoundaryTest.php.
 */

class PluginManagerController extends BaseController
{
    /**
     * Display the Plugin Problems Page
     *
     * @access  public
     * @author  aljawaid
     */
    public function show()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:info/plugin-problems', array(
            'title' => t('Plugin Manager') . ' &#10562; ' . t('Plugin Problems'),
        )));
    }

    /**
     * Display the Plugin Info Page
     *
     * @access  public
     * @author  aljawaid
     */
    public function showPluginInfo()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:info/plugin-info', array(
            'title' => t('Plugin Manager') . ' &#10562; ' . t('Plugin Info'),
            'available_plugins' => Directory::getInstance($this->container)->getAvailablePlugins()
        )));
    }

    /**
     * Display the Manual Plugins Page
     *
     * @access  public
     * @author  aljawaid
     */
    public function showManualPlugins()
    {
        $this->response->html($this->helper->layout->plugin('pluginManager:plugin/manual-plugins', array(
            'title' => t('Plugin Manager') . ' &#10562; ' . t('Manual Plugins'),
            'is_configured' => Installer::isConfigured(),
        )));
    }

    /**
     * Install a Plugin
     *
     * @author  alfredbuehler   Alfred Bühler
     */
    public function installPlugin()
    {
        if (! $this->request->isPost() || ! Installer::isConfigured()) {
            throw new AccessForbiddenException();
        }

        $this->checkCSRFForm();

        $archiveUrl = trim((string) $this->request->getRawValue('plugin_url'));
        $archiveFile = $this->request->getFilePath('plugin_file');
        $upload = $this->request->getFileInfo('plugin_file');
        $uploadAttempted = ! empty($upload) && (int) ($upload['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_NO_FILE;

        $hasArchiveUrl = $archiveUrl !== '';

        if ($hasArchiveUrl === $uploadAttempted) {
            $this->flash->failure(t('Choose either a local archive or a remote URL'));
            $this->redirectToManualInstaller();
            return;
        }

        if ($uploadAttempted && ((int) ($upload['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK || ! is_uploaded_file($archiveFile))) {
            $this->flash->failure(t('The uploaded plugin archive could not be read'));
            $this->redirectToManualInstaller();
            return;
        }

        try {
            $installer = new ManualPluginInstaller($this->container);

            if ($hasArchiveUrl) {
                $installer->installFromUrl($archiveUrl);
            } else {
                $installer->installFromFile($archiveFile);
            }

            $this->flash->success(t('Plugin installed successfully'));
            $this->response->redirect($this->helper->url->to('PluginController', 'show'));
        } catch (PluginInstallerException $e) {
            $this->flash->failure($e->getMessage());
            $this->redirectToManualInstaller();
        }
    }

    /**
     * Return failed manual installations to their source form.
     */
    private function redirectToManualInstaller(): void
    {
        $this->response->redirect($this->helper->url->to(
            'PluginManagerController',
            'showManualPlugins',
            array('plugin' => 'PluginManager')
        ));
    }
}
