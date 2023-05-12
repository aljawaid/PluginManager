<div class="info-tooltip-wrapper">
    <div class="info-tooltip-title">
        <span class="pm-info-circle-icon"></span>
        <?= t('Last Updated') ?>
    </div>
    <hr class="tooltip-hr">
    <p class="info-tooltip-text"><?= t('The last updated date helps you decide whether a plugin is actively developed and is appropriate for your use case.') ?></p>
    <p class="info-tooltip-text"><?= t('Plugin Manager will highlight the last updated date based on the date specified by the plugin developer in the Plugins Directory.') ?></p>
    <ul class="info-tooltip-list">
        <li class="info-tooltip-item">
            <span class="age-pass"><?= t('Active') ?></span>
            <span class="timeframe"><?= t('Up to 1 year') ?></span>
        </li>
        <li class="info-tooltip-item">
            <span class="age-warning"><?= t('Stale') ?></span>
            <span class="timeframe"><?= t('1 - 2 years') ?></span>
        </li>
        <li class="info-tooltip-item">
            <span class="age-danger"><?= t('Archived') ?></span>
            <span class="timeframe"><?= t('Over 2 years') ?></span>
        </li>
    </ul>
</div>
