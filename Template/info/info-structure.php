<div class="info-tooltip-wrapper">
    <div class="info-tooltip-title">
        <span class="pm-info-circle-icon"></span> <?= t('Plugin Structure') ?>
    </div>
    <hr class="tooltip-hr">
    <p class="tooltip-content">
        <?= t('The building blocks of a plugin help define it to complete a structure which works with your application.') ?> <?= $this->url->link(t('Learn more'), 'PluginManagerController', 'showPluginInfo', array('plugin' => 'PluginManager'), false, 'tooltip-link', t('Go to Plugin Information'), false, 'PluginStructure') ?>
    </p>
</div>
