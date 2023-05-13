<div class="info-tooltip-wrapper">
    <div class="info-tooltip-title">
        <span class="pm-info-circle-icon"></span> <?= t('Plugin Types') ?>
    </div>
    <hr class="tooltip-hr">
    <p class="tooltip-content">
        <?= t('Plugins fall into one of 5 types of categories') ?> <?= $this->url->link(t('Learn more'), 'PluginManagerController', 'showPluginInfo', array('plugin' => 'PluginManager'), false, 'tooltip-link', t('Go to Plugin Information')) ?>
    </p>
</div>
