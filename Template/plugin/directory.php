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
    <div class="plugin-available-filter-wrapper">
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
        <?php $countTypes = $this->helper->pluginManagerHelper->countTypes($available_plugins); ?>
        <div class="plugin-type-counts">
            <label for="AvailablePluginsFilterInput">
            <div class="plugin-type-count-section">
                <div class="plugin-type-count-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                        <title><?= t('General Plugin') ?></title>
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                    </svg>
                </div>
                <div class="plugin-type-count-text"><?= t('General') ?></div>
                <div class="plugin-type-count-total"><?= isset($countTypes['plugin']) ? $countTypes['plugin'] : '0' ?></div>
            </div>
            <div class="plugin-type-count-section">
                <div class="plugin-type-count-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 52 52"  fill="currentColor" enable-background="new 0 0 52 52" xml:space="preserve">
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
                </div>
                <div class="plugin-type-count-text" title="<?= t('Automatic Actions') ?>"><?= t('Actions') ?></div>
                <div class="plugin-type-count-total"><?= isset($countTypes['action']) ? $countTypes['action'] : '0' ?></div>
            </div>
            <div class="plugin-type-count-section">
                <div class="plugin-type-count-icon">
                    <svg width="50px" height="50px" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <title><?= t('Theme Plugin') ?></title>
                        <g data-name="Layer 75" id="Layer_75">
                            <path d="M23,28H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V9A1,1,0,0,1,5,8H9.1a5,5,0,0,1,9.8,0H23a1,1,0,0,1,1,1v4.1a5,5,0,0,1,0,9.8V27A1,1,0,0,1,23,28Zm-4.1-2H22V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V10H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H6v3.1a5,5,0,0,1,0,9.8V26H9.1a5,5,0,0,1,9.8,0Z"/>
                            <path d="M26,18.15c-.46,2.16-5.94,2.36-9.46,2.36s-6.71-2.43-6.71-3.64h-1A4.17,4.17,0,0,1,9,18a4,4,0,0,1-4,4v5h5a4,4,0,0,1,8,0h5V22a4,4,0,0,0,3.1-1.5Z"/>
                        </g>
                    </svg>
                </div>
                <div class="plugin-type-count-text"><?= t('Themes') ?></div>
                <div class="plugin-type-count-total"><?= isset($countTypes['theme']) ? $countTypes['theme'] : '0' ?></div>
            </div>
            <div class="plugin-type-count-section">
                <div class="plugin-type-count-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="50px"  viewBox="0 0 32 32" xml:space="preserve">
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
                </div>
                <div class="plugin-type-count-text"><?= t('Connectors') ?></div>
                <div class="plugin-type-count-total"><?= isset($countTypes['connector']) ? $countTypes['connector'] : '0' ?></div>
            </div>
            <div class="plugin-type-count-section">
                <div class="plugin-type-count-icon">
                    <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <title><?= t('Multi Plugin') ?></title>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 3H21V11H13V3ZM15 5H19V9H15V5Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 21V13H11V7H3V21H17ZM9 9H5V13H9V9ZM5 19L5 15H9V19H5ZM11 19V15H15V19H11Z" fill="currentColor"/>
                    </svg>
                </div>
                <div class="plugin-type-count-text"><?= t('Multi') ?></div>
                <div class="plugin-type-count-total"><?= isset($countTypes['multi']) ? $countTypes['multi'] : '0' ?></div>
            </div>
            <?php $totalOthers = isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes)) ) : '0' ?>
            <?php if ($totalOthers > 0): ?>
                <div class="plugin-type-count-section">
                    <div class="plugin-type-count-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                            <title><?= t('Others') ?></title>
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="plugin-type-count-text"><?= t('Others') ?></div>
                    <div class="plugin-type-count-total"><?= isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes)) ) : '0' ?></div>
                </div>
            <?php endif ?>
            </label>
            <span class="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
                <script type="text/template">
                    <div class="markdown"><?= $this->render('pluginManager:info/info-tooltip') ?></div>
                </script>
            </span>
        </div>
    </div>
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
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px"  viewBox="0 0 32 32" xml:space="preserve">
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
                            <title><?= t('Other Plugin') ?></title>
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
            <td class="available-plugin-structure">
                <?php if (isset($plugin['readme']) && $plugin['readme']): ?>
                    <a href="<?= $plugin['readme'] ?>" class="dir-plugin-readme btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('View Readme') ?> &#8663; <?= t('Opens in a new window') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-book-half" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                    </a>
                <?php endif ?>
                <?php if (isset($plugin['homepage']) && $plugin['homepage']): ?>
                    <a href="<?= $plugin['homepage'] ?>" class="plugin-homepage btn-action plugin-book" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                            <path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                        </svg>
                    </a>
                <?php endif ?>
                <?php if (isset($plugin['has_schema'])): ?>
                    <?php if ($plugin['has_schema']): ?>
                        <!-- SCHEMA IS TRUE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-database-add btn-action has-schema" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin contains database changes') ?></title>
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                            <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                        </svg>
                    <?php else: ?>
                        <!-- SCHEMA IS FALSE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-database-check btn-action xx-has-schema" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin contains no database changes') ?></title>
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                            <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                        </svg>
                    <?php endif ?>
                 <?php else: ?>
                    <!-- NOT SPECIFIED / ASSUME FALSE -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="btn-action bi bi-database x-has-schema" fill="currentColor" viewBox="0 0 16 16">
                        <title><?= t('This plugin has not specified any database changes') ?></title>
                        <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313ZM13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 5.698ZM14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13V4Zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 8.698Zm0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525Z"/>
                    </svg>
                <?php endif ?>
                <?php if (isset($plugin['has_overrides'])): ?>
                    <?php if ($plugin['has_overrides']): ?>
                        <!-- OVERRIDES IS TRUE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="btn-action bi bi-file-earmark-plus has-overrides" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin overrides certain templates or models') ?></title>
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        </svg>
                    <?php else: ?>
                        <!-- OVERRIDES IS FALSE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="btn-action bi bi-file-earmark-check xx-has-overrides" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin does not override any templates or models') ?></title>
                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                    <?php endif ?>
                <?php else: ?>
                    <!-- NOT SPECIFIED / ASSUME FALSE -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="btn-action bi bi-file-earmark-diff x-has-overrides" fill="currentColor" viewBox="0 0 16 16">
                        <title><?= t('This plugin has not specified any template or model overrides') ?></title>
                        <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                <?php endif ?>
                <?php if (isset($plugin['has_hooks'])): ?>
                    <?php if ($plugin['has_hooks']): ?>
                        <!-- HOOKS IS TRUE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="btn-action has-hooks" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin contains hooks') ?></title>
                            <path d="M5.5 4.25a2.25 2.25 0 014.5 0 .75.75 0 001.5 0 3.75 3.75 0 10-6.14 2.889l-2.272 4.258a.75.75 0 001.324.706L7 7.25a.75.75 0 00-.309-1.015A2.25 2.25 0 015.5 4.25z"></path>
                            <path d="M7.364 3.607a.75.75 0 011.03.257l2.608 4.349a3.75 3.75 0 11-.628 6.785.75.75 0 01.752-1.299 2.25 2.25 0 10-.033-3.88.75.75 0 01-1.03-.256L7.107 4.636a.75.75 0 01.257-1.03z"></path>
                            <path d="M2.9 8.776A.75.75 0 012.625 9.8 2.25 2.25 0 106 11.75a.75.75 0 01.75-.751h5.5a.75.75 0 010 1.5H7.425a3.751 3.751 0 11-5.55-3.998.75.75 0 011.024.274z"></path>
                        </svg>
                    <?php else: ?>
                        <!-- HOOKS IS FALSE -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-bezier2 btn-action xx-has-hooks" fill="currentColor" viewBox="0 0 16 16">
                            <title><?= t('This plugin does not contain any hooks') ?></title>
                            <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                        </svg>
                    <?php endif ?>
                <?php else: ?>
                    <!-- NOT SPECIFIED / ASSUME FALSE -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-git btn-action x-has-hooks" fill="currentColor" viewBox="0 0 16 16">
                        <title><?= t('This plugin has not specified any hooks') ?></title>
                        <path d="M15.698 7.287 8.712.302a1.03 1.03 0 0 0-1.457 0l-1.45 1.45 1.84 1.84a1.223 1.223 0 0 1 1.55 1.56l1.773 1.774a1.224 1.224 0 0 1 1.267 2.025 1.226 1.226 0 0 1-2.002-1.334L8.58 5.963v4.353a1.226 1.226 0 1 1-1.008-.036V5.887a1.226 1.226 0 0 1-.666-1.608L5.093 2.465l-4.79 4.79a1.03 1.03 0 0 0 0 1.457l6.986 6.986a1.03 1.03 0 0 0 1.457 0l6.953-6.953a1.031 1.031 0 0 0 0-1.457"/>
                    </svg>
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

