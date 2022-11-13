<div class="page-header">
    <h2><?= t('Plugin Directory') ?></h2>
</div>

<?php if (! $is_configured): ?>
<p class="alert alert-error">
    <?= t('Your Kanboard instance is not configured to install plugins from the user interface.') ?>
</p>
<?php endif ?>

<?php if (empty($available_plugins)): ?>
    <p class="alert"><?= t('There is no plugin available.') ?></p>
<?php else: ?>
    <?php usort($available_plugins, fn ($a, $b) => strtolower($a['title']) <=> strtolower($b['title'])); ?>
    <?php $availableCount = count($available_plugins) ?>
        <div class="directory-info-wrapper">
            <table id="DirectoryInfo" class="directory-info">
                <thead class="">
                    <tr>
                        <th scope="col" class=""><?= t('Available Plugins') ?></th>
                        <th scope="col" colspan="2" class="text-center"><?= t('Directory Source') ?></th>
                        <th scope="col" class=""><?= t('Your Application Version') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row" class="available-count pp-green">&#10004; <?= $availableCount ?></td>
                        <td class="plugin-dir-view">
                            <?php $dirURL = 'https://kanboard.org/plugins.html'; ?>
                            <?php if (!defined(PLUGIN_API_URL)): ?>
                                <a href="<?= $dirURL ?>" target="_blank" title="<?= t('Opens in a new window') ?> &#8663; " rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                    <?= t('View Official Plugin Directory') ?>
                                </a>
                            <?php else: ?>
                                <?= t('Custom Directory') ?>
                            <?php endif ?>
                        </td>
                        <td class="plugin-dir-url"><?= PLUGIN_API_URL ?></td>
                        <td class="kb-app-version"><?= APP_VERSION ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php foreach ($available_plugins as $plugin): ?>
    <table>
        <tr>
            <th colspan="3">
                <a href="<?= $plugin['homepage'] ?>" target="_blank" rel="noopener noreferrer"><?= $this->text->e($plugin['title']) ?></a>
            </th>
        </tr>
        <tr>
            <td class="column-40">
                <?= $this->text->e($plugin['author']) ?>
            </td>
            <td class="column-30">
                <?= $this->text->e($plugin['version']) ?>
            </td>
            <td class="available-plugin-last-updated">
                <?php if (isset($plugin['last_updated']) && $plugin['last_updated']): ?>
                    <span class="dir-plugin-last-updated" title="<?= ($plugin['last_updated']) ?>">
                        <?php $pluginAge = strtotime($plugin['last_updated']) ?>
                        <?= $this->helper->ageHelper->newAge($pluginAge) ?>
                    </span>
                <?php else: ?>
                    <span class="not-specified" title="<?= t('Unable to detect the last time this plugin was updated or a version was released') ?>"><?= t('Not Specified') ?></span>
                <?php endif ?>
            </td>
                <?php if ($is_configured): ?>
                    <?php if (! isset($installed_plugins[$plugin['title']])): ?>
                        <?= $this->url->icon('cloud-download', t('Install'), 'PluginController', 'install', array('archive_url' => urlencode($plugin['download'])), true) ?>
                    <?php elseif ($installed_plugins[$plugin['title']] < $plugin['version']): ?>
                        <?= $this->url->icon('refresh', t('Update'), 'PluginController', 'update', array('archive_url' => urlencode($plugin['download'])), true) ?>
                    <?php else: ?>
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <?= t('Up to date') ?>
                    <?php endif ?>
                <?php else: ?>
                    <i class="fa fa-ban fa-fw" aria-hidden="true"></i>
                    <?= t('Not available') ?>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="markdown">
                    <?= $this->text->markdown($plugin['description']) ?>
                </div>
            </td>
        </tr>
    </table>
    <?php endforeach ?>
<?php endif ?>
