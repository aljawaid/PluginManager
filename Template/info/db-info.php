<div class="tooltip-section">
    <h4 class="tooltip-title">
        <span class="pm-database-add-icon"></span> <?= t('This plugin contains database changes') ?>
    </h4>
    <hr class="tooltip-hr">
    <p class="tooltip-content">
        <?= t('This plugin makes changes to your database, usually by adding more tables. Read more about the possible effects of this plugin.') ?> <?= $this->url->link(t('Learn more'), 'PluginManagerController', 'show', array('plugin' => 'PluginManager'), false, 'tooltip-link', t('Go to Plugin Problems')) ?>
    </p>
</div>
