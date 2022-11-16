<div id="PluginSideBar" class="sidebar">
    <ul id="PluginMenu" class="plugin-menu">
        <li <?= $this->app->checkMenuSelection('PluginController', 'show') ?>>
            <?= $this->url->link(t('Plugin Manager'), 'PluginController', 'show', array(), false, 'plugin-manager-item') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginController', 'directory') ?>>
            <?= $this->url->link(t('Plugin Directory'), 'PluginController', 'directory', array(), false, 'plugin-directory-item') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'show') ?>>
            <?= $this->url->link(t('Plugin Problems'), 'PluginManagerController', 'show', array('plugin' => 'PluginManager'), false, 'plugin-problems-item') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'showPluginInfo') ?>>
            <?= $this->url->link(t('Plugin Info'), 'PluginManagerController', 'showPluginInfo', array('plugin' => 'PluginManager'), false, 'plugin-info-item') ?>
        </li>
    </ul>
</div>
