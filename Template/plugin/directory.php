<div class="page-header">
    <h2 class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
        </svg>
        <?= t('Plugin Directory') ?>
    </h2>
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
    <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action"><i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?></a>
    <?php foreach ($available_plugins as $plugin): ?>
    <table class="available-plugins-table">
        <tr class="">
            <th class="available-plugins-author" colspan="2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                </svg>
                <span title="<?= t('Plugin Author(s)') ?>"><?= $this->text->e($plugin['author']) ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" version="1.1" class="octicon octicon-law">
                    <title><?= $this->text->e($plugin['license']) ?> <?= t('License') ?></title>
                    <path fill-rule="evenodd" d="M12.75 2.75a.75.75 0 00-1.5 0V4.5H9.276a1.75 1.75 0 00-.985.303L6.596 5.957A.25.25 0 016.455 6H2.353a.75.75 0 100 1.5H3.93L.563 15.18a.762.762 0 00.21.88c.08.064.161.125.309.221.186.121.452.278.792.433.68.311 1.662.62 2.876.62a6.919 6.919 0 002.876-.62c.34-.155.606-.312.792-.433.15-.097.23-.158.31-.223a.75.75 0 00.209-.878L5.569 7.5h.886c.351 0 .694-.106.984-.303l1.696-1.154A.25.25 0 019.275 6h1.975v14.5H6.763a.75.75 0 000 1.5h10.474a.75.75 0 000-1.5H12.75V6h1.974c.05 0 .1.015.14.043l1.697 1.154c.29.197.633.303.984.303h.886l-3.368 7.68a.75.75 0 00.23.896c.012.009 0 0 .002 0a3.154 3.154 0 00.31.206c.185.112.45.256.79.4a7.343 7.343 0 002.855.568 7.343 7.343 0 002.856-.569c.338-.143.604-.287.79-.399a3.5 3.5 0 00.31-.206.75.75 0 00.23-.896L20.07 7.5h1.578a.75.75 0 000-1.5h-4.102a.25.25 0 01-.14-.043l-1.697-1.154a1.75 1.75 0 00-.984-.303H12.75V2.75zM2.193 15.198a5.418 5.418 0 002.557.635 5.418 5.418 0 002.557-.635L4.75 9.368l-2.557 5.83zm14.51-.024c.082.04.174.083.275.126.53.223 1.305.45 2.272.45a5.846 5.846 0 002.547-.576L19.25 9.367l-2.547 5.807z"></path>
                </svg>
            </th>
            <th class="plugin-last-updated text-center"><?= t('Last Updated') ?></th>
            <th class="plugin-structure text-center"><?= t('Plugin Structure') ?></th>
            <th class="plugin-status text-center"><?= t('Status') ?></th>
        </tr>
        <tr class="">
            <td class="column-40 available-plugins-title">
                <?= $this->text->e($plugin['title']) ?>
            </td>
            <td class="available-plugin-version" title="<?= t('Plugin Version') ?>">
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
            <td class="available-plugin-status text-center">
                <?php if ($is_configured): ?>
                    <?php if (! isset($installed_plugins[$plugin['title']])): ?>
                        <?= $this->url->icon('cloud-download', t('Install'), 'PluginController', 'install', array('archive_url' => urlencode($plugin['download'])), true, 'install-plugin', t('Install this plugin')) ?>
                    <?php elseif ($installed_plugins[$plugin['title']] < $plugin['version']): ?>
                        <?= $this->url->icon('refresh', t('Update'), 'PluginController', 'update', array('archive_url' => urlencode($plugin['download'])), true, 'update-plugin', t('Update this plugin')) ?>
                    <?php else: ?>
                        <div class="tick">&#10004;</div> <?= t('Up to date') ?>
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
