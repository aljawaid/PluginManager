<style type="text/css">
    /* MODAL SIZE */
    #modal-box {
        width: auto !important;
        overflow: hidden;
    }

    #modal-content {
        padding: 10px 15px;
    }

    /* MODAL CLOSE BUTTON */
    #modal-close-button {
        transform: scale(1.5);
        display: inline-block;
        position: absolute;
        right: 5px;
        top: 6px;
        background: var(--pp-red-alt-2);
        padding: 3px 3px 5px 6px;
        border-bottom-left-radius: 3px;
        box-shadow: -1px -1px 0 3px var(--pp-white);
        z-index: 1;
    }

    #modal-close-button i {
        color: var(--pp-white);
        transition: var(--transition-pm);
    }

    #modal-close-button:hover i {
        color: var(--pp-grey);
        text-shadow: 0 0 1px var(--pp-white);
    }
</style>

<div id="UninstallModal" class="plugin-manager-modal">
    <div class="modal-page-header">
        <h2 class="relative"><?= t('Uninstall Plugin') ?></h2>
    </div>
    <div class="modal-contents">
        <?php $schema = Kanboard\Core\Plugin\SchemaHandler::hasSchema($plugin->getPluginName()); ?>
        <?php if (file_exists('plugins/ContentCleaner')): ?>
            <?php if ($schema): ?>
                <section class="message warning cleaner-warning">
                    <header></header>
                    <i class=""></i>
                    <h3 class="">
                        <span class="message-title"><?= t('Important') ?></span>
                        <span class="message-text"><?= e('%s After uninstalling, you should run the relevant cleaning jobs using ContentCleaner.', '<strong>' . t('This plugin contains database changes.') . '</strong>') ?></span>
                    </h3>
                </section>
            <?php else: ?>
                <section class="message neutral cleaner-warning">
                    <header></header>
                    <i class=""></i>
                    <h3 class="">
                        <span class="message-title"><?= t('Tip') ?></span>
                        <span class="message-text"><?= t('Use ContentCleaner to keep your application clean after uninstalling plugins.') ?></span>
                    </h3>
                </section>
            <?php endif ?>
        <?php elseif ($schema): ?>
            <section class="message warning cleaner-warning">
                    <header></header>
                    <i class=""></i>
                    <h3 class="">
                        <span class="message-title"><?= t('Important') ?></span>
                        <span class="message-text"><?= e('Changes made to the application database by plugins are not restored or removed by default. %s After uninstalling, you should run the relevant cleaning jobs using ContentCleaner.', '<strong>' . t('This plugin contains database changes.') . '</strong>') ?></span>
                    </h3>
                </section>
        <?php else: ?>
            <section class="message neutral cleaner-warning">
                    <header></header>
                    <i class=""></i>
                    <h3 class="">
                        <span class="message-title"><?= t('Tip') ?></span>
                        <span class="message-text"><?= t('Install the ContentCleaner plugin to keep your application clean after uninstalling plugins.') ?></span>
                    </h3>
                </section>
        <?php endif ?>
        <div class="confirm">
            <?php $installDate = date("d F Y", filemtime(PLUGINS_DIR . '/' . $plugin_id . '/.')); ?>
            <p class="">
                <?= e('Do you really want to remove %s which was installed on %s?', '<strong>' . $plugin->getPluginName() . '</strong>', '<strong>' . $installDate . '</strong>') ?>
            </p>
        </div>
    </div>
    <div class="modal-actions">
        <?= $this->modal->confirmButtons('PluginController', 'uninstall', array('pluginId' => $plugin_id)) ?>
    </div>
</div>
