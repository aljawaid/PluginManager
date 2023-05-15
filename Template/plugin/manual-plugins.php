<div id="ManualPlugins" class="pm-page-header manual-plugins">
    <h2 class="">
        <span class="pm-manual-plugin-icon"></span><?= t('Manual Plugins') ?>
        <span class="manual-plugin-count"><?= count($this->helper->pluginManagerHelper->getAllPlugins()) ?></span>
    </h2>
    <?= $this->render('PluginManager:plugin/installer') ?>
    <?php if (!empty($this->helper->pluginManagerHelper->getAllPlugins())): ?>
        <section class="message error cleaner-warning">
            <header></header>
            <i class=""></i>
            <h3 class="">
                <span class="message-title"><?= t('Warning') ?></span>
                <span class="message-text"><?= t('Use these plugins with great caution and check their functionality with the plugin developer before installing') ?></span>
            </h3>
        </section>
        <div class="top-detail-bar">
            <div class="plugin-dir-last-updated">
                <?= t('Directory Last Updated') ?>: <?=$this->helper->pluginManagerHelper->lastUpdatedDirectory() ?>
            </div>
            <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action">
                <i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?>
            </a>
        </div>
        <?php
            $manualPlugins = $this->helper->pluginManagerHelper->getAllPlugins();
            usort($manualPlugins, fn ($a, $b) => strtolower($a['title']) <=> strtolower($b['title']));
        ?>
        <?php foreach ($this->helper->pluginManagerHelper->getAllPlugins() as $plugin): ?>
            <table class="manual-plugins-table available-plugins-table">
                <tr class="">
                    <th class="available-plugins-author" colspan="2">
                        <?php if (isset($plugin['is_type'])): ?>
                            <?php if ($plugin['is_type'] == 'plugin'): ?>
                                <span class="plugin-type v-sub"><span class="pm-plugin-icon"></span></span>
                            <?php elseif ($plugin['is_type'] == 'action'): ?>
                                <span class="plugin-type v-sub"><span class="pm-action-icon"></span></span>
                            <?php elseif ($plugin['is_type'] == 'theme'): ?>
                                <span class="plugin-type v-sub"><span class="pm-theme-icon"></span></span>
                            <?php elseif ($plugin['is_type'] == 'connector'): ?>
                                <span class="plugin-type v-sub"><span class="pm-connector-icon"></span></span>
                            <?php elseif ($plugin['is_type'] == 'multi'): ?>
                                <span class="plugin-type v-sub"><span class="pm-multi-icon"></span></span>
                            <?php endif ?>
                        <?php else: ?>
                            <!-- IF UNRECOGNISED VALUE -->
                            <span class="plugin-type"><span class="pm-other-icon"></span></span>
                        <?php endif ?>
                        <span title="<?= t('Plugin Author(s)') ?>"><?= $this->text->e($plugin['author']) ?></span>
                        <span class="pm-license-icon"></span>
                    </th>
                    <th class="plugin-last-updated text-center"><?= t('Last Updated') ?>
                        <span class="tooltip">
                            <span class="pm-info-circle-icon"></span>
                        <script type="text/template">
                            <div class="markdown"><?= $this->render('pluginManager:info/info-last-updated') ?></div>
                        </script>
                        </span>
                    </th>
                    <th class="plugin-structure text-center"><?= t('Plugin Structure') ?>
                        <span class="tooltip">
                            <span class="pm-info-circle-icon"></span>
                            <script type="text/template">
                                <div class="markdown"><?= $this->render('pluginManager:info/info-structure') ?></div>
                            </script>
                        </span>
                    </th>
                    <th class="plugin-status text-center"><?= t('Status') ?></th>
                </tr>
                <tr class="">
                    <td class="column-40 available-plugins-title">
                        <?= $this->text->e($plugin['title']) ?>
                    </td>
                    <td class="available-plugin-version" title="<?= t('Plugin Version') ?>">
                        <?= $this->text->e($plugin['version']) ?>
                    </td>
                    <td class="date-toggle available-plugin-last-updated">
                        <?php if (isset($plugin['last_updated']) && $plugin['last_updated']): ?>
                            <?php
                            $dateFormatplugin = date_create($plugin['last_updated']);
                            $dateFormat = date_format($dateFormatplugin, 'd F Y');
                            ?>
                            <div class="relative-date dir-plugin-last-updated" title="<?= $dateFormat ?>">
                                <?php $pluginAge = strtotime($plugin['last_updated']) ?>
                                <?= $this->helper->ageHelper->newAge($pluginAge) ?>
                            </div>
                            <div class="exact-date dir-plugin-last-updated" title="<?= strip_tags($this->helper->ageHelper->newAge($pluginAge)) ?>" style="display: none;">
                                <?= $dateFormat ?>
                            </div>
                        <?php else: ?>
                            <span class="not-specified" title="<?= t('Unable to detect the last time this plugin was updated or a version was released') ?>">
                                <?= t('Not Specified') ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td class="available-plugin-structure">
                        <?php if (isset($plugin['readme']) && $plugin['readme']): ?>
                            <a href="<?= $plugin['readme'] ?>" class="dir-plugin-readme btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('View Readme') ?> &#8663; <?= t('Opens in a new window') ?>">
                                <span class="pm-readme-icon"></span>
                            </a>
                        <?php endif ?>
                        <?php if (isset($plugin['homepage']) && $plugin['homepage']): ?>
                            <a href="<?= $plugin['homepage'] ?>" class="plugin-homepage btn-action plugin-book" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                                <span class="pm-homepage-icon"></span>
                            </a>
                        <?php endif ?>
                        <?php if (isset($plugin['has_schema'])): ?>
                            <?php if ($plugin['has_schema']): ?>
                                <!-- SCHEMA IS SET AS TRUE -->
                                <span class="pm-database-add-icon btn-action has-schema" title="<?= t('This plugin contains database changes') ?>"></span>
                            <?php else: ?>
                                <!-- SCHEMA IS SET AS FALSE -->
                                <span class="pm-database-check-icon btn-action xx-has-schema" title="<?= t('This plugin contains no database changes') ?>"></span>
                            <?php endif ?>
                        <?php else: ?>
                            <!-- SCHEMA NOT SPECIFIED / ASSUME FALSE -->
                            <span class="pm-database-icon btn-action x-has-schema" title="<?= t('This plugin has not specified any database changes') ?>"></span>
                        <?php endif ?>
                        <?php if (isset($plugin['has_overrides'])): ?>
                            <?php if ($plugin['has_overrides']): ?>
                                <!-- OVERRIDES IS SET AS TRUE -->
                                <span class="pm-overrides-add-icon btn-action has-overrides" title="<?= t('This plugin overrides certain templates or models') ?>"></span>
                            <?php else: ?>
                                <!-- OVERRIDES IS SET AS FALSE -->
                                <span class="pm-overrides-check-icon btn-action xx-has-overrides" title="<?= t('This plugin does not override any templates or models') ?>"></span>
                            <?php endif ?>
                        <?php else: ?>
                            <!-- OVERRIDES NOT SPECIFIED / ASSUME FALSE -->
                            <span class="pm-overrides-icon btn-action x-has-overrides" title="<?= t('This plugin has not specified any template or model overrides') ?>"></span>
                        <?php endif ?>
                        <?php if (isset($plugin['has_hooks'])): ?>
                            <?php if ($plugin['has_hooks']): ?>
                                <!-- HOOKS IS SET AS TRUE -->
                                <span class="pm-hooks-add-icon btn-action has-hooks" title="<?= t('This plugin contains hooks') ?>"></span>
                            <?php else: ?>
                                <!-- HOOKS IS SET AS FALSE -->
                                <span class="pm-hooks-check-icon btn-action xx-has-hooks" title="<?= t('This plugin does not contain any hooks') ?>"></span>
                            <?php endif ?>
                        <?php else: ?>
                            <!-- HOOKS NOT SPECIFIED / ASSUME FALSE -->
                            <span class="pm-hooks-icon btn-action x-has-hooks" title="<?= t('This plugin has not specified any hooks') ?>"></span>
                        <?php endif ?>
                    </td>
                    <td class="available-plugin-status text-center">
                        <?php if ($plugin['download']): ?>
                            <a href="<?= ($plugin['download']) ?>" class="download-archive" title="<?= t('Download Plugin') ?>">
                                <span class="pm-download-icon"></span><?= t('Download') ?>
                            </a>
                            <span class="copy-url-link-format btn" title="<?= t('Copy download link') ?>" data-clipboard-text="<?= $plugin['download'] ?>">
                                <span class="pm-clipboard-icon"></span>
                            </span>
                        <?php else: ?>
                            <div class="cross">&#10008;</div> <?= t('Not available') ?>
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="">
                    <td class="manual-plugin-description" colspan="5">
                        <div class="markdown">
                            <?= $this->text->markdown($plugin['description']) ?>
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <?php if ($this->text->e($plugin['title']) == 'KanboardSkeletonPlugin'): ?>
                        <td class="manual-plugin-note developer-plugin" colspan="5"><?= t('This plugin is for developers') ?></td>
                    <?php elseif ($this->text->e($plugin['title']) == 'php_Translation_Helper' || $this->text->e($plugin['title']) == 'PHP Translation Helper'): ?>
                        <td class="manual-plugin-note developer-plugin" colspan="5"><?= t('This plugin is for translators and developers') ?></td>
                    <?php else: ?>
                        <td class="manual-plugin-note" colspan="5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle warning" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg> <?= t('This plugin may not be completely functional. Always check the homepage for recent developments as the download link may not show the latest version.') ?>
                        </td>
                    <?php endif ?>
                </tr>
            </table>
        <?php endforeach ?>
        <a id="PluginTop" href="#main" title="<?= t('Go to the top of the page') ?>" class="btn-action">
            <i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Top') ?>
        </a>
    <?php else: ?>
        <?= t('There are no manual plugins listed at the moment') ?>
    <?php endif ?>
</div>
