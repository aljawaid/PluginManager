<div class="pm-page-header">
    <h2 class="">
        <span class="pm-info-circle-icon"></span> <?= t('Plugin Information') ?>
    </h2>
</div>
<div class="page-margin pm-page-margin">
    <h3 id="TypesOfPlugins" class=""><?= t('Types of Plugins') ?></h3>
    <p class="">
        <?= t('All plugins do the same basic job of extending the features of the application. Different functions require different ways of coding which is why all plugins fall into one of the types below.') ?>
    </p>
    <div class="info-type-section">
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <span class="pm-plugin-icon"></span>
            </div>
            <div class="info-type-box">
                <div class="info-type-text">
                    <?= t('A plugin of any type but with no automatic actions') ?>
                </div>
            </div>
            <div class="info-type-title"><?= t('General Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <span class="pm-action-icon"></span>
            </div>
            <div class="info-type-box">
                <div class="info-type-text">
                    <?= t('A plugin for automatic actions only') ?>
                </div>
            </div>
            <div class="info-type-title"><?= t('Action Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <span class="pm-theme-icon"></span>
            </div>
            <div class="info-type-box">
                <div class="info-type-text">
                    <?= t('A plugin for theming and styling of the interface') ?>
                </div>
            </div>
            <div class="info-type-title"><?= t('Theme Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <span class="pm-connector-icon"></span>
            </div>
            <div class="info-type-box">
                <div class="info-type-text">
                    <?= t('A plugin connecting to third party services - may contain automatic actions') ?>
                </div>
            </div>
            <div class="info-type-title"><?= t('Connector Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <span class="pm-multi-icon"></span>
            </div>
            <div class="info-type-box">
                <div class="info-type-text">
                    <?= t('A plugin containing multiple functions and automatic actions or connectors') ?>
                </div>
            </div>
            <div class="info-type-title"><?= t('Multi Plugin') ?></div>
        </div>
        <?php $countTypes = $this->helper->pluginManagerHelper->countTypes($available_plugins); ?>
        <?php $totalOthers = isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes))) : '0' ?>
        <?php if ($totalOthers > 0): ?>
            <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <span class="pm-other-icon"></span>
                </div>
                <div class="info-type-box">
                    <div class="info-type-text">
                        <?= t('A plugin which has not been set a plugin type by the developer') ?>
                    </div>
                </div>
                <div class="info-type-title"><?= t('Other Plugin') ?></div>
            </div>
        <?php endif ?>
    </div>
    <figure class="notice">
        <?= e('Plugin types are only shown in the %s', $this->url->link(t('Plugin Directory'), 'PluginController', 'directory', array(), false, 'plugin-directory-item')) ?>
    </figure>
    <h3 id="PluginStructure" class=""><?= t('Plugin Structure') ?></h3>
    <p class="structure-p">
        <?= t('The official Plugins Directory has been updated to include extra information for each plugin. This information is set by the developer to indicate the code breakdown of the plugin.') ?>
    </p>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Documentation') ?></div>
        <div class="structure-info-section">
            <div class="structure-info-icon icon-normal">
                <span class="pm-readme-icon"></span>
            </div>
            <div class="structure-info-text">
                <?= t('All plugins should have a readme file in the root of their plugin folder. This icons should show against all plugins.') ?>
            </div>
        </div>
        <div class="structure-info-section">
            <div class="structure-info-icon icon-normal">
                <span class="pm-homepage-icon"></span>
            </div>
            <div class="structure-info-text">
                <?= t('When links go wrong you should always be able to fallback to the plugin or developer homepage. This icon will show against all plugins which have a homepage set by the developer.') ?>
            </div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Database Changes') ?></div>
        <div class="structure-icon-wrapper">
            <div class="structure-info-unknown icon-unknown">
                <span class="pm-database-icon"></span>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-true">
                    <span class="pm-database-add-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('If a plugin is known to alter your database, this icon will show. Altering your database usually includes adding or modifying existing database tables.') ?>
                </div>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-false">
                    <span class="pm-database-check-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('No database changes are detected when this icon shows.') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Overrides') ?></div>
        <div class="structure-icon-wrapper">
            <div class="structure-info-unknown icon-unknown">
                <span class="pm-overrides-icon"></span>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-true">
                    <span class="pm-overrides-add-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('Overrides include template files and models. Both types of files affect how your data is presented to you. This icon will show when core templates or models are replaced with specific versions.') ?>
                </div>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-false">
                    <span class="pm-overrides-check-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('No overrides are detected when this icon shows.') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Hooks') ?></div>
        <div class="structure-icon-wrapper">
            <div class="structure-info-unknown icon-unknown">
                <span class="pm-hooks-icon"></span>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-true">
                    <span class="pm-hooks-add-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('Hooks are files which attach to existing templates or core functions. Hooks do not alter any core structure but add to it.') ?>
                </div>
            </div>
            <div class="structure-info-3-section">
                <div class="structure-info-icon icon-false">
                    <span class="pm-hooks-check-icon"></span>
                </div>
                <div class="structure-info-text">
                    <?= t('No hooks are detected when this icon shows.') ?>
                </div>
            </div>
        </div>
    </div>
</div>
