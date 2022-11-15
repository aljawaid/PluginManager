<div class="info-tooltip-wrapper">
    <div class="info-tooltip-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
        <?= t('Last Updated') ?>
    </div>
    <hr>
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
