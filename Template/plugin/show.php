<?php $_title = '$title'; ?>

<?php
function sortPlugins(&$arr) {
  uasort($arr, fn($a, $b) => strtolower($a->getPluginName()) <=> strtolower($b->getPluginName()));
}
?>
    <div class="page-header">
        <h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                <title>Plugin Manager</title>
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
            </svg>
            <?= t('Plugin Manager') ?></h2>
    </div>

<?php if (! empty($incompatible_plugins)): ?>
    <div class="page-title">
        <h3><i class="fa fa-cubes"></i> <?= t('Incompatible Plugins') ?></h3>
    </div>
    <span class="page-margin">
        <table class="">
            <tr class="">
                <th class="column-35"><?= t('Name') ?></th>
                <th class="column-25"><?= t('Author') ?></th>
                <th class="column-10"><?= t('Version') ?></th>
                <th class="column-12"><?= t('Compatibility') ?></th>
                <?php if ($is_configured): ?>
                    <th class=""><?= t('Action') ?></th>
                <?php endif ?>
            </tr>

            <?php sortPlugins($incompatible_plugins); ?>
            <?php foreach ($incompatible_plugins as $pluginFolder => $plugin): ?>
                <tr class="">
                    <td class="">
                        <?php if ($plugin->getPluginHomepage()): ?>
                            <a href="<?= $plugin->getPluginHomepage() ?>" class="" target="_blank" rel="noopener noreferrer"><?= $this->text->e($plugin->getPluginName()) ?></a>
                        <?php else: ?>
                            <?= $this->text->e($plugin->getPluginName()) ?>
                        <?php endif ?>
                    </td>
                    <td class=""><?= $this->text->e($plugin->getPluginAuthor()) ?></td>
                    <td class=""><?= $this->text->e($plugin->getPluginVersion()) ?></td>
                    <td class=""><?= $this->text->e($plugin->getCompatibleVersion()) ?></td>
                    <?php if ($is_configured): ?>
                        <td class="">
                            <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
                        </td>
                    <?php endif ?>
                </tr>
                <tr class="">
                    <td colspan="<?= $is_configured ? 6 : 5 ?>"><?= $this->text->e($plugin->getPluginDescription()) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </span>
<?php endif ?>

    <div class="page-title">
        <h3 class="installed-title"><i class="fa fa-cubes"></i> <?= t(' Installed Plugins') ?></h3>
    </div>
<?php if (empty($plugins)): ?>
    <p class="alert page-margin"><?= t('There is no plugin loaded.') ?></p>
<?php else: ?>
    <div class="page-margin">
        <div class="plugin-installed-filter">
            <label for="InstalledPluginsFilterInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                    <title>Plugin Manager</title>
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                </svg>
                <?= t('Filter Plugins:') ?>
            </label>
            <input type="search" id="InstalledPluginsFilterInput" class="search-input" onfocus="this.value=' '" placeholder="<?= t('Search for plugin...') ?>" title="<?= t('Search installed plugins') ?>" autocomplete="off">
        </div>

        <table id="InstalledPluginsTable" class="installed-plugins">
            <thead class="">
                <tr class="">
                    <th class="column-35"><?= t('Name') ?></th>
                    <th class="column-30"><?= t('Author') ?></th>
                    <th class="column-5"><?= t('Plugin Version') ?></th>
                    <th class="column-10"><?= t('Kanboard Compatibility') ?></th>
                    <th class="column-25"><?= t('Action') ?></th>
                </tr>
            </thead>
                <?php sortPlugins($plugins); ?>
                <?php foreach ($plugins as $pluginFolder => $plugin): ?>
            <tbody class="">
                    <tr class="plugin-info">
                        <td class="plugin-name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                                <title>Installed Plugin</title>
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                            </svg>
                            <?= $this->text->e($plugin->getPluginName()) ?>
                        </td>
                        <td class="plugin-author"><?= $this->text->e($plugin->getPluginAuthor()) ?></td>
                        <td class="plugin-version"><?= $this->text->e($plugin->getPluginVersion()) ?></td>
                        <?php if ($plugin->getCompatibleVersion()): ?>
                            <td class="plugin-compatible-version"><?= $this->text->e($plugin->getCompatibleVersion()) ?></td>
                        <?php else: ?>
                            <td class="not-specified"><?= t('Not Specified') ?></td>
                        <?php endif ?>
                        <td class="">
                            <?php $schema = Kanboard\Core\Plugin\SchemaHandler::hasSchema($plugin->getPluginName()); ?>
                            <?php if ($schema): ?>
                                <span class="plugin-schema btn-action">
                                    <?= $this->app->tooltipHTML('<p><i class="fa fa-database"></i> &nbsp;'. t('This plugin contains database changes') .'</p>', $icon = 'fa-database') ?>
                                </span>
                            <?php endif ?>
                            <?php if ($plugin->getPluginHomepage()): ?>
                                <span class="plugin-homepage">
                                    <a href="<?= $plugin->getPluginHomepage() ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>"><i class="fa fa-globe"></i>
                                    </a>
                                </span>
                            <?php endif ?>
                            <?php if ($is_configured): ?>
                                <span class="btn-uninstall">
                                    <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
                                </span>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr class="plugin-description">
                        <td class="" colspan="<?= $is_configured ? 6 : 5 ?>"><?= $this->text->e($plugin->getPluginDescription()) ?></td>
                    </tr>
            </tbody>
                <?php endforeach ?>
        </table>
        <a id="PluginTop" href="#main" title="<?= t('Go to the top of the page') ?>" class="btn-action"><i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Top') ?></a>
    </div>
<?php endif ?>
