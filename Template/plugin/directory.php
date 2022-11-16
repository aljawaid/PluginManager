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
    <div class="directory-info-wrapper">
        <table id="DirectoryInfo" class="directory-info">
            <thead class="">
                <tr class="">
                    <th scope="col" class=""><?= t('Available Plugins') ?></th>
                    <th scope="col" colspan="2" class="text-center"><?= t('Directory Source') ?></th>
                    <th scope="col" class=""><?= t('Your Application Version') ?></th>
                    <th scope="col" class=""><?= t('Currently Installed') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row" class="available-count pp-green">&#10004; <?= count($available_plugins) ?></td>
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
                    <td scope="row" class="total-count"><?= count($installed_plugins) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <form class="plugin-available-filter">
        <label for="AvailablePluginsFilterInput">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-filter-square" viewBox="0 0 16 16">
                <title><?= t('Filter Available Plugins') ?></title>
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </label>
        <input class="form-control" id="AvailablePluginsFilterInput" type="search" placeholder="<?= t('Search for plugin...') ?>" title="<?= t('Search available plugins') ?>" autocomplete="off">
    </form>
    <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action"><i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?></a>
    <?php foreach ($available_plugins as $plugin): ?>
    <table class="available-plugins-table">
        <tr class="">
            <th class="available-plugins-author" colspan="2">
                <?php if (isset($plugin['is_type'])): ?>
                    <?php if ($plugin['is_type'] == 'plugin'): ?>
                        <span class="plugin-type v-top">
                            <!-- GENERAL PLUGIN -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                                <title><?= t('General Plugin') ?></title>
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                            </svg>
                        </span>
                    <?php elseif ($plugin['is_type'] == 'action'): ?>
                        <span class="plugin-type v-sub">
                            <!-- ACTION PLUGIN -->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 52 52"  fill="currentColor" enable-background="new 0 0 52 52" xml:space="preserve">
                                <title><?= t('Action Plugin') ?></title>
                                <path d="M47.6,37.6c-0.5-0.1-1.1-0.1-1.6-0.2c-0.1,0-0.2-0.1-0.2-0.2c-0.2-0.6-0.5-1.2-0.7-1.7c0-0.1,0-0.2,0-0.3
                                c0.3-0.4,0.7-0.9,1-1.3c0.2-0.3,0.2-0.6-0.1-0.9c-0.6-0.6-1.2-1.2-1.8-1.8c-0.1-0.1-0.3-0.2-0.4-0.2s-0.3,0.1-0.4,0.2
                                c-0.4,0.3-0.9,0.7-1.3,1c-0.1,0-0.1,0.1-0.1,0.1h-0.1c-0.6-0.2-1.1-0.5-1.7-0.7c-0.1,0-0.2-0.1-0.2-0.2c-0.1-0.5-0.1-1-0.2-1.5
                                c0-0.3-0.1-0.5-0.4-0.7c-0.1-0.1-0.2-0.1-0.2-0.1c-0.9,0-1.7,0-2.6,0c-0.2,0-0.3,0-0.4,0.1c-0.2,0.2-0.4,0.4-0.4,0.7
                                c0,0.5-0.1,1-0.2,1.5c0,0.1-0.1,0.2-0.2,0.2c-0.6,0.2-1.1,0.5-1.7,0.7h-0.1c-0.1,0-0.1,0-0.2-0.1c-0.4-0.3-0.8-0.7-1.3-1
                                C32,31.1,31.9,31,31.7,31s-0.3,0.1-0.5,0.2c-0.6,0.6-1.2,1.2-1.8,1.8c-0.3,0.3-0.3,0.6-0.1,0.9c0.3,0.4,0.7,0.8,1,1.3
                                c0.1,0.1,0.1,0.2,0,0.3c-0.2,0.6-0.5,1.1-0.7,1.7c0,0.1-0.1,0.2-0.2,0.2c-0.5,0.1-1,0.1-1.5,0.2c-0.3,0-0.6,0.2-0.7,0.5c0,1,0,2,0,3
                                c0.2,0.3,0.4,0.4,0.7,0.5c0.5,0,1,0.1,1.5,0.2c0.1,0,0.2,0.1,0.2,0.2c0.2,0.6,0.5,1.1,0.7,1.7c0,0.1,0.1,0.2,0,0.3
                                c-0.3,0.4-0.7,0.9-1,1.3c-0.2,0.3-0.2,0.6,0.1,0.9c0.6,0.6,1.2,1.2,1.8,1.8c0.2,0.2,0.3,0.2,0.5,0.2c0.1,0,0.3-0.1,0.4-0.2
                                c0.4-0.3,0.8-0.7,1.3-1c0.1,0,0.1-0.1,0.2-0.1h0.1c0.6,0.2,1.1,0.5,1.7,0.7c0.1,0,0.2,0.1,0.2,0.2c0.1,0.5,0.1,1.1,0.2,1.6
                                c0,0.4,0.3,0.6,0.7,0.6s0.9,0,1.3,0c0.4,0,0.8,0,1.2,0s0.6-0.2,0.7-0.6c0.1-0.5,0.1-1.1,0.2-1.6c0-0.1,0.1-0.2,0.2-0.2
                                c0.6-0.2,1.2-0.5,1.7-0.7h0.1c0,0,0.1,0,0.1,0.1c0.4,0.3,0.9,0.7,1.3,1c0.1,0.1,0.3,0.2,0.4,0.2c0.2,0,0.3-0.1,0.5-0.2
                                c0.6-0.6,1.2-1.2,1.8-1.8c0.3-0.3,0.3-0.6,0.1-0.9c-0.3-0.4-0.7-0.8-1-1.3c-0.1-0.1-0.1-0.2,0-0.3c0.2-0.6,0.5-1.1,0.7-1.7
                                c0-0.1,0.1-0.2,0.2-0.2c0.5-0.1,1.1-0.1,1.6-0.2c0.4,0,0.6-0.3,0.6-0.7c0-0.8,0-1.7,0-2.5C48.2,37.9,48,37.7,47.6,37.6z M37.8,43.6
                                C37.8,43.6,37.7,43.6,37.8,43.6c-2.3,0-4-1.8-4-4s1.8-4,4-4l0,0c2.2,0,4,1.8,4,4C41.7,41.8,39.9,43.6,37.8,43.6z"/>
                                <path d="M38.7,20.7c-0.2-0.8-0.8-1.3-1.6-1.3c-3.2,0-6.4,0-9.6,0l0,0c-1.2,0-0.6-1-0.6-1c0.2-0.4,0.4-0.7,0.5-1.1
                                c2.2-4.3,4.3-8.6,6.5-12.9c0.8-1.2,0-2.4-1.4-2.4c-6,0-11.9,0-17.9,0c-0.9,0-1.3,0.3-1.7,1.1c-3,7.6-6,15.1-8.9,22.7
                                c0,0.2-0.1,0.4-0.1,0.5c-0.1,1,0.6,1.7,1.7,1.7c3.2,0,6.5,0,9.7,0c0.7,0.1,2.1,0.4,1.4,2.2c-1.2,3.1-2.4,6.1-3.6,9.2
                                c-1.2,2.8-2.3,5.6-3.4,8.4c-0.4,1,0,1.9,1,2.2c0.7,0.2,1.2-0.1,1.7-0.6c4-4.2,8-8.4,12-12.7c0.5-0.5,0.9-1,1.4-1.5
                                c0.6-0.6,0.5-1.6,0.5-1.6l0,0c0-1,0.3-1.9,1.1-2.7c0.6-0.6,1.2-1.2,1.8-1.8c0.7-0.7,1.6-1.1,2.6-1.1c0.7,0,1.1-0.3,1.3-0.4l0.1-0.1
                                l0,0l0,0c1.7-1.8,3.5-3.7,5.2-5.5C38.7,21.7,38.9,21.2,38.7,20.7z"/>
                            </svg>
                        </span>
                    <?php elseif ($plugin['is_type'] == 'theme'): ?>
                        <span class="plugin-type v-sub">
                            <!-- THEME PLUGIN -->
                            <svg width="20px" height="20px" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <title><?= t('Theme Plugin') ?></title>
                                <g data-name="Layer 75" id="Layer_75">
                                    <path d="M23,28H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V9A1,1,0,0,1,5,8H9.1a5,5,0,0,1,9.8,0H23a1,1,0,0,1,1,1v4.1a5,5,0,0,1,0,9.8V27A1,1,0,0,1,23,28Zm-4.1-2H22V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V10H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H6v3.1a5,5,0,0,1,0,9.8V26H9.1a5,5,0,0,1,9.8,0Z"/>
                                    <path d="M26,18.15c-.46,2.16-5.94,2.36-9.46,2.36s-6.71-2.43-6.71-3.64h-1A4.17,4.17,0,0,1,9,18a4,4,0,0,1-4,4v5h5a4,4,0,0,1,8,0h5V22a4,4,0,0,0,3.1-1.5Z"/>
                                </g>
                            </svg>
                        </span>
                    <?php elseif ($plugin['is_type'] == 'connector'): ?>
                        <span class="plugin-type v-sub">
                            <!-- CONNECTOR PLUGIN -->
                            <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px"  viewBox="0 0 32 32" xml:space="preserve">
                                <title><?= t('Connector Plugin') ?></title>
                                <style type="text/css">.st0 {fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; stroke-miterlimit:10;}</style>
                                <path class="st0" d="M5.5,26.5L5.5,26.5c1.9,1.9,5.1,1.9,7,0L16,23l-7-7l-3.5,3.5C3.5,21.5,3.5,24.6,5.5,26.5z"/>
                                <line class="st0" x1="8" y1="15" x2="17" y2="24"/>
                                <line class="st0" x1="10" y1="17" x2="14" y2="13"/>
                                <line class="st0" x1="15" y1="22" x2="19" y2="18"/>
                                <line class="st0" x1="2" y1="30" x2="5" y2="27"/>
                                <path class="st0" d="M26.5,5.5L26.5,5.5c-1.9-1.9-5.1-1.9-7,0L16,9l7,7l3.5-3.5C28.5,10.5,28.5,7.4,26.5,5.5z"/>
                                <line class="st0" x1="30" y1="2" x2="27" y2="5"/>
                            </svg>
                        </span>
                    <?php elseif ($plugin['is_type'] == 'multi'): ?>
                        <span class="plugin-type v-sub">
                            <!-- MULTI PLUGIN -->
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <title><?= t('Multi Plugin') ?></title>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 3H21V11H13V3ZM15 5H19V9H15V5Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17 21V13H11V7H3V21H17ZM9 9H5V13H9V9ZM5 19L5 15H9V19H5ZM11 19V15H15V19H11Z" fill="currentColor"/>
                            </svg>
                        </span>
                    <?php endif ?>
                <?php else: ?>
                    <!-- IF UNRECOGNISED VALUE -->
                    <span class="plugin-type">
                        <!-- UNRECOGNISED PLUGIN TYPE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </span>
                <?php endif ?>
                <span title="<?= t('Plugin Author(s)') ?>"><?= $this->text->e($plugin['author']) ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" version="1.1" class="octicon octicon-law">
                    <title><?= $this->text->e($plugin['license']) ?> <?= t('License') ?></title>
                    <path fill-rule="evenodd" d="M12.75 2.75a.75.75 0 00-1.5 0V4.5H9.276a1.75 1.75 0 00-.985.303L6.596 5.957A.25.25 0 016.455 6H2.353a.75.75 0 100 1.5H3.93L.563 15.18a.762.762 0 00.21.88c.08.064.161.125.309.221.186.121.452.278.792.433.68.311 1.662.62 2.876.62a6.919 6.919 0 002.876-.62c.34-.155.606-.312.792-.433.15-.097.23-.158.31-.223a.75.75 0 00.209-.878L5.569 7.5h.886c.351 0 .694-.106.984-.303l1.696-1.154A.25.25 0 019.275 6h1.975v14.5H6.763a.75.75 0 000 1.5h10.474a.75.75 0 000-1.5H12.75V6h1.974c.05 0 .1.015.14.043l1.697 1.154c.29.197.633.303.984.303h.886l-3.368 7.68a.75.75 0 00.23.896c.012.009 0 0 .002 0a3.154 3.154 0 00.31.206c.185.112.45.256.79.4a7.343 7.343 0 002.855.568 7.343 7.343 0 002.856-.569c.338-.143.604-.287.79-.399a3.5 3.5 0 00.31-.206.75.75 0 00.23-.896L20.07 7.5h1.578a.75.75 0 000-1.5h-4.102a.25.25 0 01-.14-.043l-1.697-1.154a1.75 1.75 0 00-.984-.303H12.75V2.75zM2.193 15.198a5.418 5.418 0 002.557.635 5.418 5.418 0 002.557-.635L4.75 9.368l-2.557 5.83zm14.51-.024c.082.04.174.083.275.126.53.223 1.305.45 2.272.45a5.846 5.846 0 002.547-.576L19.25 9.367l-2.547 5.807z"></path>
                </svg>
            </th>
            <th class="plugin-last-updated text-center"><?= t('Last Updated') ?>
                <span class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <script type="text/template">
                        <div class="markdown"><?= $this->render('pluginManager:info/last-updated') ?></div>
                    </script>
                </span>
            </th>
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
