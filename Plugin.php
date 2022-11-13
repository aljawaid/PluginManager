<?php

namespace Kanboard\Plugin\PluginManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\PluginManager\AgeHelper;

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('plugin/show', 'pluginManager:plugin/show');
        $this->template->setTemplateOverride('plugin/directory', 'pluginManager:plugin/directory');
        $this->template->setTemplateOverride('plugin/sidebar', 'pluginManager:plugin/sidebar');

        // PLUGIN PROBLEMS Page - Routes
        $this->route->addRoute('/extensions/plugin-problems', 'PluginManagerController', 'show', 'PluginManager');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/PluginManager/Assets/css/plugin-manager.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/PluginManager/Assets/js/plugin-manager.js'));
        if (!file_exists('plugins/Glancer')) {
            $this->hook->on('template:layout:js', array('template' => 'plugins/PluginManager/Assets/js/plugin-manager-top-btn.js'));
        }
        
        // Helper
        $this->helper->register('ageHelper', '\Kanboard\Plugin\PluginManager\Helper\AgeHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'PluginManager';
    }

    public function getPluginDescription()
    {
        return t('Replace the Installed Plugins section within the Kanboard interface with a new Plugin Manager and revamped Plugins Directory. Plugin Manager provides both users and developers with an improved comprehensive interface displaying a new section for troubleshooting plugins and new indicators for each plugin.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
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
