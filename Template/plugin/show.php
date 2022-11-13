<?php
function sortPlugins(&$arr) {
  uasort($arr, fn($a, $b) => strtolower($a->getPluginName()) <=> strtolower($b->getPluginName()));
}
?>
    <div class="page-header">
        <h2 class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                <title>Plugin Manager</title>
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
            </svg>
            <?= t('Plugin Manager') ?></h2>
    </div>

<?php if (! empty($incompatible_plugins)): ?>
    <div class="page-title">
        <h3 class=""><i class="fa fa-cubes"></i> <?= t('Incompatible Plugins') ?></h3>
    </div>
    <span class="page-margin">
        <table class="">
            <tr class="">
                <th class="column-35"><?= t('Name') ?></th>
                <th class="column-25"><?= t('Author') ?></th>
                <th class="column-10"><?= t('Version') ?></th>
                <th class="column-12"><?= t('Compatibility') ?></th>
                <?php if ($is_configured): ?>
                    <th class=""><?= t('Actions') ?></th>
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

<?php if (empty($plugins)): ?>
    <p class="alert page-margin"><?= t('There is no plugin loaded.') ?></p>
<?php else: ?>
    <div class="page-margin">
        <?php $installedCount = count($plugins) ?>
        <div class="plugin-count"><?= t('You have %s plugins installed', $installedCount) ?></div>
        <form class="plugin-installed-filter">
            <label for="InstalledPluginsFilterInput">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-filter-square" viewBox="0 0 16 16">
                    <title>Filter Installed Plugins</title>
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </label>
            <input type="search" id="InstalledPluginsFilterInput" class="search-input" placeholder="<?= t('Search for plugin...') ?>" title="<?= t('Search installed plugins') ?>" autocomplete="off">
        </form>
        <a id="PluginBottom" href="#PluginTop" title="<?= t('Go to the bottom of the page') ?>" class="btn-action"><i class="fa fa-level-down" aria-hidden="true"></i> <?= t('Bottom') ?></a>
        <table id="InstalledPluginsTable" class="installed-plugins">
            <thead class="">
                <tr class="">
                    <th class="column-35"><?= t('Name') ?></th>
                    <th class="column-30"><?= t('Author') ?></th>
                    <th class="column-5"><?= t('Plugin Version') ?></th>
                    <th class="column-10"><?= t('Kanboard Compatibility') ?></th>
                    <th class="column-25" colspan="2"><?= t('Actions') ?></th>
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
                        <td class="plugin-action">
                            <?php $schema = Kanboard\Core\Plugin\SchemaHandler::hasSchema($plugin->getPluginName()); ?>
                            <?php if ($schema): ?>
                                <span class="plugin-schema btn-action">
                                    <span class="tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                                            <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                                        </svg>
                                        <script type="text/template">
                                            <div class="markdown"><?= $this->render('pluginManager:info/db-info') ?></div>
                                        </script>
                                    </span>
                                </span>
                            <?php endif ?>
                            <?php if ($plugin->getPluginHomepage()): ?>
                                <span class="plugin-homepage">
                                    <a href="<?= $plugin->getPluginHomepage() ?>" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                                            <title>Plugin Homepage</title>
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                                        </svg>
                                    </a>
                                </span>
                            <?php endif ?>
                            <span class="plugin-readme">
                                <a href="<?= $plugin->getPluginHomepage() ?>/blob/master/README.md" class="btn-action" target="_blank" rel="noopener noreferrer" title="<?= t('Plugin Homepage') ?> &#8663; <?= t('Opens in a new window') ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                        <title>Readme</title>
                                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                </a>
                            </span>
                        </td>
                        <td class="plugin-uninstall">
                            <?php if ($is_configured): ?>
                                <button class="btn-uninstall">
                                    <?= $this->modal->confirm('trash-o', t('Uninstall'), 'PluginController', 'confirm', array('pluginId' => $pluginFolder)) ?>
                                </button>
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
