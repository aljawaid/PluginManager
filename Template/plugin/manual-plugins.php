<div id="ManualPlugins" class="pm-page-header manual-plugins">
    <h2 class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
        </svg>
        <?= t('Manual Plugins') ?>
    </h2>

    <?php if (!empty($this->helper->pluginManagerHelper->getAllPlugins())): ?>
        <section class="message error cleaner-warning">
            <header></header>
            <i class=""></i>
            <h3 class="">
                <span class="message-title"><?= t('Warning') ?></span>
                <span class="message-text"><?= t('Use these plugins with great caution and check their functionality with the plugin developer before installing') ?></span>
            </h3>
        </section>
        <p class="">
        <?php foreach ($this->helper->pluginManagerHelper->getAllPlugins() as $manualPlugin): ?>
            <?= $this->text->e($manualPlugin['title']) ?>,
        <?php endforeach ?>
        </p>
    <?php else: ?>
        <?= t('There are no manual plugins listed at the moment') ?>
    <?php endif ?>
</div>
