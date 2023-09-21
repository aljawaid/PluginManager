<?php
$countAvailablePlugins = count($this->helper->pluginManagerHelper->getAllInstallablePlugins());
$countInstalledPlugins = count($this->task->pluginLoader->getPlugins());
$countManualPlugins = count($this->helper->pluginManagerHelper->getAllPlugins());
?>
<div id="PluginSideBar" class="sidebar">
    <ul id="PluginMenu" class="plugin-menu">
        <li <?= $this->app->checkMenuSelection('PluginController', 'show') ?>>
            <?= $this->url->link('<span class="pm-plugin-icon-grey"></span>' . t('Plugin Manager'), 'PluginController', 'show', array(), false, 'plugin-manager-item') ?>
            <span class="count-menu-item badge-installed"><?= $countInstalledPlugins ?></span>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginController', 'directory') ?>>
            <?= $this->url->link('<span class="pm-plugin-directory-icon-grey"></span>' . t('Plugin Directory'), 'PluginController', 'directory', array(), false, 'plugin-directory-item') ?>
            <span class="count-menu-item badge-available"><?= $countAvailablePlugins ?></span>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'showManualPlugins') ?>>
            <?= $this->url->link('<span class="pm-manual-plugin-icon-grey"></span>' . t('Manual Plugins'), 'PluginManagerController', 'showManualPlugins', array('plugin' => 'PluginManager'), false, 'plugin-info-item') ?>
            <span class="count-menu-item badge-manual"><?= $countManualPlugins ?></span>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'showPluginInfo') ?>>
            <?= $this->url->link('<span class="pm-info-circle-icon"></span>' . t('Plugin Info'), 'PluginManagerController', 'showPluginInfo', array('plugin' => 'PluginManager'), false, 'plugin-info-item') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'show') ?>>
            <?= $this->url->link('<span class="pm-problems-icon-grey"></span>' . t('Plugin Problems'), 'PluginManagerController', 'show', array('plugin' => 'PluginManager'), false, 'plugin-problems-item') ?>
        </li>
        <?php if (file_exists('plugins/KanboardSupport')): ?>
            <li <?= $this->app->checkMenuSelection('TechnicalSupportController', 'show') ?>>
                <?= $this->url->link('<span class="pm-kanboard-support-icon"></span>' . t('Configuration'), 'TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport'), false, 'plugin-problems-support') ?>
            </li>
        <?php endif ?>
        <?php if (file_exists('plugins/ContentCleaner')): ?>
            <li class="content-cleaner-menu-link">
                <?= $this->url->link('<span class="pm-content-cleaner-icon-grey"></span>' . t('Content Cleaner'), 'ContentCleanerController', 'show', array('plugin' => 'ContentCleaner'), false, 'plugin-content-cleaner-item') ?>
            </li>
        <?php endif ?>
        <?= $this->hook->render('template:plugin:sidebar') ?>
    </ul>
</div>
