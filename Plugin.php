<?php

namespace Kanboard\Plugin\KanboardPluginsUX;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('plugin/show', 'kanboardPluginsUX:plugin/show');
        $this->template->setTemplateOverride('plugin/directory', 'kanboardPluginsUX:plugin/directory');
        $this->template->setTemplateOverride('plugin/sidebar', 'kanboardPluginsUX:plugin/sidebar');

        // PLUGIN PROBLEMS Page - Routes
        $this->route->addRoute('/extensions/plugin-problems', 'KanboardPluginsUXController', 'show', 'KanboardPluginsUX');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardPluginsUX/Assets/css/kanboard-plugins-ux.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/KanboardPluginsUX/Assets/js/kanboard-plugins-ux.js'));
        if (!file_exists('plugins/Glancer')) {
            $this->hook->on('template:layout:js', array('template' => 'plugins/KanboardPluginsUX/Assets/js/kanboard-plugins-ux-top-btn.js'));
        }
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'KanboardPluginsUX';
    }

    public function getPluginDescription()
    {
        return t('Replace the Installed Plugins and Plugins Directory section within the Kanboard interface.');
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
        return 'https://github.com/aljawaid/KanboardPluginsUX';
    }
}
