<li <?= $this->app->checkMenuSelection('PluginController', 'show') ?>>
    <?= $this->url->link(t('Plugin Manager'), 'PluginController', 'show', array(), false, 'plugin-manager-item') ?>
</li>
