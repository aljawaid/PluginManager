<?php

namespace Kanboard\Plugin\PluginManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;

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
