<?php

namespace Kanboard\Plugin\PluginManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\PluginManager\AgeHelper;
use Kanboard\Plugin\PluginManager\PluginManagerHelper;

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('plugin/show', 'pluginManager:plugin/show');
        $this->template->setTemplateOverride('plugin/directory', 'pluginManager:plugin/directory');
        $this->template->setTemplateOverride('plugin/sidebar', 'pluginManager:plugin/sidebar');

        // Views - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'pluginManager:config/sidebar');

        // PLUGIN PROBLEMS Page - Routes
        $this->route->addRoute('/extensions/plugin-problems', 'PluginManagerController', 'show', 'PluginManager');
        // PLUGIN INFO Page - Routes
        $this->route->addRoute('/extensions/plugin-info', 'PluginManagerController', 'showPluginInfo', 'PluginManager');
        // MANUAL PLUGINS Page - Routes
        $this->route->addRoute('/extensions/manual-plugins', 'PluginManagerController', 'showManualPlugins', 'PluginManager');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/PluginManager/Assets/css/plugin-manager.css'));
        $this->hook->on('template:layout:css', array('template' => 'plugins/PluginManager/Assets/css/plugin-manager-icons.css'));
        if (!file_exists('plugins/ContentCleaner') || !file_exists('plugins/KanboardSupport')) {
            $this->hook->on('template:layout:css', array('template' => 'plugins/PluginManager/Assets/css/messages.css'));
        }

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/PluginManager/Assets/js/plugin-manager.js'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/PluginManager/Assets/js/plugin-manager-top-btn.js'));
        if (!file_exists('plugins/Glancer')) {
            $this->hook->on('template:layout:js', array('template' => 'plugins/PluginManager/Assets/js/clipboard-v2.0.11.min.js'));
        }

        // Helper
        $this->helper->register('ageHelper', '\Kanboard\Plugin\PluginManager\Helper\AgeHelper');
        $this->helper->register('pluginManagerHelper', '\Kanboard\Plugin\PluginManager\Helper\PluginManagerHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'PluginManager';
    }

    public function getPluginDescription()
    {
        return t('Replace the Installed Plugins section with a whole new interface. Plugin Manager provides both users and developers with an improved comprehensive layout displaying a new section for troubleshooting plugins with a new plugin structure breakdown for each plugin. Install plugins direct from the Plugin Directory or explore new upcoming or untested features from manual plugins.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '3.5.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/PluginManager';
    }
}
