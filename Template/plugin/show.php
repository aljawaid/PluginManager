<?php
function sortPlugins(&$arr) {
  usort($arr, fn($a, $b) => strtolower($a->getPluginName()) <=> strtolower($b->getPluginName()));
}
?>
<?php if (! empty($incompatible_plugins)): ?>
    <div class="page-header">
        <h2><i class="fa fa-cubes"></i> <?= t('Incompatible Plugins') ?></h2>
    </div>
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
<?php endif ?>

    <div class="page-header">
        <h2><i class="fa fa-cubes"></i> <?= t('Installed Plugins') ?></h2>
    </div>
<?php if (empty($plugins)): ?>
    <p class="alert"><?= t('There is no plugin loaded.') ?></p>
<?php else: ?>
    <input type="search" id="InstalledPluginsFilterInput" class="search-input" onfocus="this.value=' '" placeholder="Search for plugin.." title="Search input for plugin filter" autofocus="on" autocomplete="off">

    <table id="InstalledPluginsTable" class="installed-plugins">
        <thead class="">
            <tr class="">
                <th class="column-35"><?= t('Name') ?></th>
                <th class="column-30"><?= t('Author') ?></th>
                <th class="column-5"><?= t('Plugin Version') ?></th>
                <th class="column-10"><?= t('Kanboard Compatibility') ?></th>
                <th class="" colspan="2"><?= t('Action') ?></th>
            </tr>
        </thead>
        <tbody class="">
    <?php sortPlugins($plugins); ?>
    <?php foreach ($plugins as $pluginFolder => $plugin): ?>
        <tr class="plugin-info">
            <td class="plugin-name">
                <i class="fa fa-cube pp-grey"></i> <?= $this->text->e($plugin->getPluginName()) ?>
            </td>
            <td class="plugin-author"><?= $this->text->e($plugin->getPluginAuthor()) ?></td>
            <td class="plugin-version"><?= $this->text->e($plugin->getPluginVersion()) ?></td>
            <?php if ($plugin->getCompatibleVersion()): ?>
                <td class="plugin-compatible-version"><?= $this->text->e($plugin->getCompatibleVersion()) ?></td>
            <?php else: ?>
                <td class="not-specified"><?= t('Not Specified') ?></td>
            <?php endif ?>
            <?php if ($plugin->getPluginHomepage()): ?>
                <td class="plugin-homepage">
                    <a href="<?= $plugin->getPluginHomepage() ?>" class="" target="_blank" rel="noopener noreferrer">
                        <i class="fa fa-globe"></i> <?= t('Homepage') ?> <i class="fa fa-external-link"></i>
                    </a>
                </td>
            <?php endif ?>
            <?php if ($is_configured): ?>
            <td class="btn-uninstall">
                <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
            </td>
            <?php endif ?>
        </tr>
        <tr class="plugin-description">
            <td class="" colspan="<?= $is_configured ? 6 : 5 ?>"><?= $this->text->e($plugin->getPluginDescription()) ?></td>
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
