<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols
function sortPlugins(&$arr)
{
    uasort($arr, fn($a, $b) => strtolower($a->getPluginName()) <=> strtolower($b->getPluginName()));
}
$updatables = $this->helper->pluginManagerHelper->getPluginUpdates();
// phpcs:enable
?>
<div class="pm-page-header plugin-manager-header">
    <h2 class="">
        <span class="pm-plugin-icon"></span><?= t('Plugin Manager') ?></h2>
</div>

<?php if (!empty($incompatible_plugins)): ?>
    <div class="pm-page-title">
        <h3 class="">
            <span class="pm-plugin-icon-red"></span><?= t('Incompatible Plugins') ?>
        </h3>
    </div>
    <div class="pm-page-margin relative">
        <p class="">
            <?= e('Plugins listed as incompatible are based on the application version limit set by the plugin developer. You are using %s', '<strong class="pp-green-dark">v' . APP_VERSION . '</strong>.') ?>
        </p>
        <table id="InstalledIncompatiblePluginsTable" class="installed-incompatible-plugins">
            <thead>
                <tr class="">
                    <th class="column-35"><?= t('Name') ?></th>
                    <th class="column-30"><?= t('Author') ?></th>
                    <th class="column-5 text-center"><?= t('Plugin Version') ?></th>
                    <th class="column-10 text-center"><?= t('Kanboard Compatibility') ?></th>
                    <?php if ($is_configured): ?>
                        <th class="column-25" colspan="2"><?= t('Actions') ?></th>
                    <?php endif ?>
                </tr>
            </thead>
            <?php sortPlugins($incompatible_plugins); ?>
            <?php foreach ($incompatible_plugins as $pluginFolder => $plugin): ?>
                <tbody id="installed<?= str_replace(" ", "", $plugin->getPluginName()) ?>" class="">
                    <tr class="plugin-info">
                        <td class="plugin-name">
                            <span class="pm-plugin-icon"></span><?= $this->text->e($plugin->getPluginName()) ?>
                        </td>
                        <td class="plugin-author"><?= $this->text->e($plugin->getPluginAuthor()) ?></td>
                        <td class="plugin-version text-center"><?= $this->text->e($plugin->getPluginVersion()) ?></td>
                        <td class="plugin-compatible-version text-center">
                            <strong class="pp-red"><?= $this->text->e($plugin->getCompatibleVersion()) ?></strong>
                        </td>
                        <td class="plugin-action">
                            <?php $schema = Kanboard\Core\Plugin\SchemaHandler::hasSchema($plugin->getPluginName()); ?>
                            <?php if ($schema): ?>
                                <span class="plugin-schema">
                                    <span class="tooltip">
                                        <span class="pm-database-add-icon"></span>
                                        <script type="text/template">
                                            <div class="markdown"><?= $this->render('pluginManager:info/db-info') ?></div>
                                        </script>
                                    </span>
                                </span>
                            <?php endif ?>
                            <?php if ($plugin->getPluginHomepage()): ?>
                                <span class="plugin-homepage">
                                    <a href="<?= $plugin->getPluginHomepage() ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                                        <span class="pm-homepage-globe-icon"></span>
                                    </a>
                                </span>
                            <?php endif ?>
                            <span class="plugin-readme">
                                <?php
                                    $pluginReadme = $this->helper->pluginManagerHelper->checkRootDomain($plugin->getPluginHomepage());
                                    $homepage = $plugin->getPluginHomepage();
                                ?>
                                <a href="<?= "$homepage$pluginReadme" ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Readme') ?> &#8663; <?= t('Opens in a new window') ?>">
                                    <span class="pm-readme-icon"></span>
                                </a>
                            </span>
                            <?php if ($is_configured): ?>
                                <td class="plugin-uninstall">
                                    <button class="btn-uninstall">
                                        <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
                                    </button>
                                </td>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr class="plugin-description">
                        <td colspan="<?= $is_configured ? 6 : 5 ?>">
                            <?= $this->text->e($plugin->getPluginDescription()) ?>
                            <?php $installDate = date("d F Y", filemtime(PLUGINS_DIR . '/' . $pluginFolder . '/.')); ?>
                            <span class="install-date" title="<?= t('Installed') ?>"><?= $installDate ?></span>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
    <span style="height: 30px; display: block;"></span>
<?php endif ?>

<?php if (empty($plugins)): ?>
    <p class="alert pm-page-margin"><?= t('There is no plugin loaded.') ?></p>
<?php else: ?>
    <div class="pm-page-margin relative">
        <div class="plugin-list-clipboard">
            <?php sortPlugins($plugins); ?>
            <?php // phpcs:disable Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace,Squiz.WhiteSpace.ScopeClosingBrace.ContentBefore ?>
            <span class="copy-installed-list-format btn" title="<?= t('Copy plugin list') ?>" data-clipboard-text="<?php foreach ($plugins as $pluginFolder => $plugin): ?><?= '- ' . $this->text->e($plugin->getPluginName()) . ' v' . $this->text->e($plugin->getPluginVersion()) . ' ' . t('by') . ' ' . $this->text->e($plugin->getPluginAuthor()) . PHP_EOL ?><?php endforeach ?>">
                <svg height="30px" class="clippy-icon" fill="currentColor" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <title><?= t('Copy to Clipboard') ?></title>
                    <path xmlns="http://www.w3.org/2000/svg" d="M128 768h256v64H128v-64z m320-384H128v64h320v-64z m128 192V448L384 640l192 192V704h320V576H576z m-288-64H128v64h160v-64zM128 704h160v-64H128v64z m576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z"/>
                </svg>
            </span>
            <?php //phpcs:enable ?>
        </div>
        <form class="plugin-installed-filter">
            <label for="InstalledPluginsFilterInput">
                <span class="pm-filter-icon"></span>
            </label>
            <input type="search" id="InstalledPluginsFilterInput" name="search-plugin" class="search-input" placeholder="<?= t('Search for installed plugin...') ?>" title="<?= t('Search installed plugins') ?>" autocomplete="off">
        </form>
        <?php
        $installedCount = count($plugins);
        $incompatibleCount = count($incompatible_plugins);
        $updateCount = count($updatables);
        ?>
        <div class="plugin-count">
            <?= t('You have %s plugins installed', $installedCount) ?>
            <a href="#" class="js-updates-copy-paste" data-update="<?= t('Update') ?>" data-update-target="input[name=search-plugin]" title="<?= t('Click this link then focus in the search box to filter plugins') ?>">
                <?= ($updateCount > 0) ? t('with %s updates available', $updateCount) : '' ?>
            </a>
            <?= ($incompatibleCount > 0) ? t('and %s incompatible plugin(s)', $incompatibleCount) : '' ?>
        </div>
        <?php if ($installedCount > 10): ?>
            <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action"><i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?></a>
        <?php endif ?>
        <table id="InstalledPluginsTable" class="installed-plugins">
            <thead class="">
                <tr class="">
                    <th class="column-35"><?= t('Name') ?></th>
                    <th class="column-25"><?= t('Author') ?></th>
                    <th class="column-5 text-center"><?= t('Plugin Version') ?></th>
                    <th class="column-10 text-center"><?= t('Kanboard Compatibility') ?></th>
                    <th class="column-30" colspan="3">
                        <?= t('Actions') ?>
                    </th>
                </tr>
            </thead>
            <?php sortPlugins($plugins); ?>
            <?php foreach ($plugins as $pluginFolder => $plugin): ?>
                <tbody id="installed<?= str_replace(" ", "", $plugin->getPluginName()) ?>" class="plugin-body">
                    <tr class="plugin-info">
                        <td class="plugin-name">
                            <span class="pm-plugin-icon"></span><?= $this->text->e($plugin->getPluginName()) ?>
                        </td>
                        <td class="plugin-author"><?= $this->text->e($plugin->getPluginAuthor()) ?></td>
                        <td class="plugin-version text-center"><?= $this->text->e($plugin->getPluginVersion()) ?></td>
                        <?php if ($plugin->getCompatibleVersion()): ?>
                            <td class="plugin-compatible-version text-center"><?= $this->text->e($plugin->getCompatibleVersion()) ?></td>
                        <?php else: ?>
                            <td class="not-specified"><?= t('Not Specified') ?></td>
                        <?php endif ?>
                        <td class="plugin-action">
                            <?php $schema = Kanboard\Core\Plugin\SchemaHandler::hasSchema($plugin->getPluginName()); ?>
                            <?php if ($schema): ?>
                                <span class="plugin-schema">
                                    <span class="tooltip">
                                        <span class="pm-database-add-icon"></span>
                                        <script type="text/template">
                                            <div class="markdown"><?= $this->render('pluginManager:info/db-info') ?></div>
                                        </script>
                                    </span>
                                </span>
                            <?php endif ?>
                            <?php if ($plugin->getPluginHomepage()): ?>
                                <span class="plugin-homepage">
                                    <a href="<?= $plugin->getPluginHomepage() ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                                        <span class="pm-homepage-globe-icon"></span>
                                    </a>
                                </span>
                            <?php endif ?>
                            <span class="plugin-readme">
                                <?php
                                    $pluginReadme = $this->helper->pluginManagerHelper->checkRootDomain($plugin->getPluginHomepage());
                                    $homepage = $plugin->getPluginHomepage();
                                ?>
                                <a href="<?= "$homepage$pluginReadme" ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Readme') ?> &#8663; <?= t('Opens in a new window') ?>">
                                    <span class="pm-readme-icon"></span>
                                </a>
                            </span>
                        </td>
                        <?php if ($is_configured && isset($updatables[$plugin->getPluginName()])): ?>
                            <td class="plugin-update-btn">
                                <button class="btn-update">
                                    <?= $this->url->icon('refresh', t('Update'), 'PluginController', 'update', array('archive_url' => urlencode($updatables[$plugin->getPluginName()])), true, 'update-plugin-btn', t('Update this plugin')) ?>
                                </button>
                                <span id="RefreshNotice" class="refresh-notice"><?= t('Refresh this page after updating this plugin') ?></span>
                            </td>
                        <?php endif ?>
                        <?php if ($is_configured): ?>
                            <td colspan="2" class="plugin-uninstall">
                                <button class="btn-uninstall">
                                    <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
                                </button>
                            </td>
                        <?php endif ?>
                    </tr>
                    <tr class="plugin-description relative">
                        <td class="" colspan="<?= $is_configured ? 7 : 6 ?>">
                            <?= $this->text->e($plugin->getPluginDescription()) ?>
                            <?php $installDate = date("d F Y", filemtime(PLUGINS_DIR . '/' . $pluginFolder . '/.')); ?>
                            <span class="install-date" title="<?= t('Installed') ?>"><?= $installDate ?></span>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
        <?php if ($installedCount > 10): ?>
            <a id="PluginTop" href="#main" title="<?= t('Go to the top of the page') ?>" class="btn-action"><i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Top') ?></a>
        <?php endif ?>
    </div>
<?php endif ?>
