<div id="PluginDirectoryPage" class="pm-page-header">
    <h2 class="">
        <span class="pm-plugin-directory-icon"></span><?= t('Plugin Directory') ?>
    </h2>
    <?php if (!$is_configured): ?>
    <p class="alert alert-error">
        <?= t('Your application instance is not configured to install plugins from the user interface.') ?>
    </p>
    <?php endif ?>
    <?php if (empty($available_plugins)): ?>
        <p class="alert"><?= t('There is no plugin available.') ?></p>
    <?php else: ?>
        <?php $updates = $this->helper->pluginManagerHelper->getPluginUpdates() ?>
        <?php usort($available_plugins, fn ($a, $b) => strtolower($a['title']) <=> strtolower($b['title'])); ?>
        <div class="directory-info-wrapper">
            <table id="DirectoryInfo" class="directory-info">
                <thead class="">
                    <tr class="">
                        <th scope="col" class="column-10"><?= t('Available Plugins') ?></th>
                        <th scope="col" class="column-10"><?= t('Currently Installed') ?></th>
                        <th scope="col" class="column-15"><?= t('Your Application') ?></th>
                        <th scope="col" colspan="2" class=""><?= t('Directory Source') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row" class="available-count pp-green">&#10004; <?= count($available_plugins) ?></td>
                        <td scope="row" class="total-count"><?= count($installed_plugins) ?></td>
                        <td class="kb-app-version">v<?= APP_VERSION ?></td>
                        <td class="plugin-dir-view">
                            <?php if (PLUGIN_API_URL == 'https://kanboard.org/plugins.json'): ?>
                                <a href="https://kanboard.org/plugins.html" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                                    <span class="pm-source-directory-icon"></span> <?= t('Official Plugin Directory') ?>
                                </a>
                            <?php else: ?>
                                <?= t('Custom Directory') ?>
                            <?php endif ?>
                        </td>
                        <td class="plugin-dir-url"><?= PLUGIN_API_URL ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="plugin-available-filter-wrapper">
            <form class="plugin-available-filter">
                <label for="AvailablePluginsFilterInput">
                    <span class="pm-filter-icon"></span>
                </label>
                <input class="form-control" id="AvailablePluginsFilterInput" type="search" placeholder="<?= t('Search for plugin...') ?>" title="<?= t('Search available plugins') ?>" autocomplete="off">
            </form>
            <?php $countTypes = $this->helper->pluginManagerHelper->countTypes($available_plugins); ?>
            <div class="plugin-type-counts">
                <label for="AvailablePluginsFilterInput">
                    <?php if (!empty($updates)): ?>
                        <div class="plugin-type-count-section plugin-type-count-section-updates" data-type="update" title="<?= t('Filter by type') ?>">
                            <div class="plugin-type-count-icon"><i class="fa fa-refresh"></i></div>
                            <div class="plugin-type-count-text"><?= t('Updates') ?></div>
                            <div class="plugin-type-count-total-updates"><?= isset($countTypes['plugin']) ? count($updates) : '0' ?></div>
                        </div>
                    <?php endif ?>
                    <div class="plugin-type-count-section" data-type="plugin" title="<?= t('Filter by type') ?>">
                        <div class="plugin-type-count-icon"><span class="pm-plugin-icon"></span></div>
                        <div class="plugin-type-count-text"><?= t('General') ?></div>
                        <div class="plugin-type-count-total"><?= isset($countTypes['plugin']) ? $countTypes['plugin'] : '0' ?></div>
                    </div>
                    <div class="plugin-type-count-section" data-type="action" title="<?= t('Filter by type') ?>">
                        <div class="plugin-type-count-icon"><span class="pm-action-icon"></span></div>
                        <div class="plugin-type-count-text" title="<?= t('Automatic Actions') ?>"><?= t('Actions') ?></div>
                        <div class="plugin-type-count-total"><?= isset($countTypes['action']) ? $countTypes['action'] : '0' ?></div>
                    </div>
                    <div class="plugin-type-count-section" data-type="theme" title="<?= t('Filter by type') ?>">
                        <div class="plugin-type-count-icon"><span class="pm-theme-icon"></span></div>
                        <div class="plugin-type-count-text"><?= t('Themes') ?></div>
                        <div class="plugin-type-count-total"><?= isset($countTypes['theme']) ? $countTypes['theme'] : '0' ?></div>
                    </div>
                    <div class="plugin-type-count-section" data-type="connector" title="<?= t('Filter by type') ?>">
                        <div class="plugin-type-count-icon"><span class="pm-connector-icon"></span></div>
                        <div class="plugin-type-count-text"><?= t('Connectors') ?></div>
                        <div class="plugin-type-count-total"><?= isset($countTypes['connector']) ? $countTypes['connector'] : '0' ?></div>
                    </div>
                    <div class="plugin-type-count-section" data-type="multi" title="<?= t('Filter by type') ?>">
                        <div class="plugin-type-count-icon"><span class="pm-multi-icon"></span></div>
                        <div class="plugin-type-count-text"><?= t('Multi') ?></div>
                        <div class="plugin-type-count-total"><?= isset($countTypes['multi']) ? $countTypes['multi'] : '0' ?></div>
                    </div>
                    <?php $totalOthers = isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes))) : '0' ?>
                    <?php if ($totalOthers > 0): ?>
                        <div class="plugin-type-count-section" data-type="other" title="<?= t('Filter by type') ?>">
                            <div class="plugin-type-count-icon"><span class="pm-other-icon"></span></div>
                            <div class="plugin-type-count-text"><?= t('Others') ?></div>
                            <div class="plugin-type-count-total"><?= isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes))) : '0' ?></div>
                        </div>
                    <?php endif ?>
                </label>
                <span class="tooltip">
                    <span class="pm-info-circle-icon"></span>
                    <script type="text/template">
                        <div class="markdown"><?= $this->render('pluginManager:info/info-tooltip') ?></div>
                    </script>
                </span>
            </div>
        </div>
        <div class="top-detail-bar">
            <div class="plugin-dir-last-updated"><?= t('Directory Last Updated') ?>: <?=$this->helper->pluginManagerHelper->lastUpdatedDirectory() ?></div>
            <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action"><i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?></a>
        </div>
        <?php foreach ($available_plugins as $plugin): ?>
            <table id="Plugin-<?= preg_replace('/\s+/', '', ($this->text->e($plugin['title']))) ?>" class="available-plugins-table" data-type="<?= ($is_configured && isset($installed_plugins[$plugin['title']]) && ($installed_plugins[$plugin['title']] < $plugin['version'])) ? 'update' : $plugin['is_type'] ?>">
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
                        <span class="pm-license-icon" title="<?= $this->text->e($plugin['license']) ?> <?= t('License') ?>"></span>
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
                    <?php if (!isset($installed_plugins[$plugin['title']])): ?>
                        <td class="available-plugin-version" title="<?= t('Plugin Version') ?>">
                            <?= $this->text->e($plugin['version']) ?>
                        </td>
                    <?php elseif ($installed_plugins[$plugin['title']] < $plugin['version']): ?>
                        <td class="available-plugin-version font-weight-bold" title="<?= t('Updated plugin version available') ?>">
                            <?= $this->text->e($plugin['version']) ?>
                        </td>
                    <?php else: ?>
                        <td class="available-plugin-version" title="<?= t('Plugin Version') ?>">
                            <?= $this->text->e($plugin['version']) ?>
                        </td>
                    <?php endif ?>
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
                        <?php if ($is_configured): ?>
                            <?php if (!isset($installed_plugins[$plugin['title']])): ?>
                                <?= $this->url->icon('cloud-download', t('Install'), 'PluginController', 'install', array('archive_url' => urlencode($plugin['download'])), true, 'install-plugin', t('Install this plugin')) ?>
                            <?php elseif ($installed_plugins[$plugin['title']] < $plugin['version']): ?>
                                <div class="currently-installed-v pp-grey" title="<?= t('Currently Installed') ?>">
                                    <?= ($installed_plugins[$plugin['title']]) ?>
                                </div>
                                <?= $this->url->icon('refresh', t('Update'), 'PluginController', 'update', array('archive_url' => urlencode($plugin['download'])), true, 'update-plugin', t('Update this plugin')) ?>
                            <?php else: ?>
                                <div class="tick">&#10004;</div> <?= t('Up to date') ?>
                                <?= $this->url->link('<span class="pm-eye-icon"></span>', 'PluginController', 'show', array(), false, 'plugin-manager-view', t('View in Plugin Manager'), false, str_replace(" ", "", 'installed' . $this->text->e($plugin['title']))) ?>
                            <?php endif ?>
                        <?php else: ?>
                            <div class="cross">&#10008;</div> <?= t('Not available') ?>
                        <?php endif ?>
                    </td>
                </tr>
                <tr class="">
                    <td class="available-plugin-description" colspan="5">
                        <div class="markdown">
                            <?= $this->text->markdown($plugin['description']) ?>
                        </div>
                    </td>
                </tr>
            </table>
        <?php endforeach ?>
        <a id="PluginTop" href="#main" title="<?= t('Go to the top of the page') ?>" class="btn-action"><i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Top') ?></a>
    <?php endif ?>
</div>
