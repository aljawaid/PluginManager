<div class="pm-page-header">
    <h2 class="">
        <span class="pm-problems-icon"></span> <?= t('Plugin Problems') ?>
    </h2>
</div>
<div class="page-margin pm-page-margin">
    <p class="">
        <?= t('Plugins are extensions to your application. They do not take over your application, they just alter the application\'s performance or output. Use this page as a quick reference to problems which may be caused by a recent plugin installation.') ?>
    </p>
    <section class="plugin-problems-section">
        <h3 class="">
            <span class="pm-overrides-icon"></span><span class=""><?= t('Check the overrides') ?></span>
        </h3>
        <div class="panel">
            <ul class="">
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Look for templates') ?>
                </li>
                <li class="">
                    <span class="pm-question-icon"></span><?= e('Look for models in %s', '<code class="code">plugin.php</code>') ?>
                </li>
            </ul>
        </div>
        <p class="">
            <?= t('Overriding templates and models are the most common way to affect the way your application functions. It can be possible that a particular template could be conflicting with another plugin overriding the same template. It is also possible that a certain model is being used by another plugin. For any plugin that is not working or causing issues, this is the area to look into first.') ?>
        </p>
    </section>
    <section class="plugin-problems-section">
        <h3 class="">
            <span class="pm-app-settings-icon"></span><span class=""><?= t('Check the application setup') ?></span>
        </h3>
        <div class="panel">
            <ul class="">
                <li class="">
                    <?php if (file_exists('plugins/KanboardSupport')): ?>
                        <span class="pm-question-icon"></span>
                        <?= $this->url->link('<span class="pm-kanboard-support-icon"></span>' . t('Check your folder permissions'), 'TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport'), false, 'plugin-problems-support', '', false, 'ServerConfig') ?>
                    <?php else: ?>
                        <span class="pm-question-icon"></span><?= t('Check your folder permissions') ?>
                    <?php endif ?>
                </li>
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Check server logs') ?>
                </li>
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Check the browser console for any blocked files') ?>
                </li>
            </ul>
        </div>
        <?php if (file_exists('plugins/KanboardSupport')): ?>
            <p class="">
                <?= e('All information related to your setup can be easily found in %s.', $this->url->link('<span class="pm-kanboard-support-icon"></span>' . t('Technical Information'), 'TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport'), false, 'plugin-problems-support', '', false, 'ServerConfig')) ?>
            </p>
        <?php endif ?>
    </section>
    <section class="plugin-problems-section">
        <h3 class="">
            <span class="pm-database-icon"></span><span class=""><?= t('Check the database') ?></span>
        </h3>
        <div class="panel">
            <ul class="">
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Check that your database contains data') ?>
                </li>
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Check the database tables') ?>
                </li>
                <li class="">
                    <span class="pm-question-icon"></span><?= t('Plugin database tables are not automatically deleted when a plugin is uninstalled') ?>
                </li>
            </ul>
        </div>
        <p class="">
            <?= t('In the Plugin Manager, all plugins are identified if they contain potential database changes. This is your indication to check for extra tables in the plugin\'s name. If you decide to remove the plugin which causes you issues, the default the tables in the database will remain. You will need to carefully delete them according to your setup.') ?>
        </p>
        <p class="mt-5">
            <?= e('Plugins which affect the database also register into the %s table. If uninstalling a plugin, you would need to delete the associated plugin entry here too besides just the specific plugin related tables.', '<code class="code">plugin_schema_versions</code>') ?>
        </p>
    </section>
    <section class="plugin-problems-section">
        <h3 class="">
            <span class="pm-fix-icon"></span><span class=""><?= t('If everything fails') ?></span>
        </h3>
        <div class="panel">
            <ul class="">
                <li class="">
                    <span class="pm-question-icon"></span>
                    <?= t('Delete the folder for the plugin. It is highly likely that the last updated folder will be the offending plugin.') ?>
                </li>
            </ul>
        </div>
        <p class="">
            <?= e('Delete the offending plugin. If you dont know which plugin is causing your issue, check the %s folder. Each folder represents each plugin in the same name.', '<code class="code">/plugins</code>') ?>
        </p>
    </section>

    <section class="plugin-problems-section">
        <h3 class="">
            <span class="pm-further-reading-icon"></span><span class=""><?= t('Further Reading') ?></span>
        </h3>
        <ul class="further-reading">
            <li class="">
                <?= $this->url->link('<span class="pm-app-settings-icon"></span>' . t('About Application'), 'ConfigController', 'index') ?>
            </li>
            <li class="">
                <a href="https://kanboard.discourse.group" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                    <span class="pm-kanboard-forum-icon"></span><?= t('Kanboard Forum') ?>
                </a>
            </li>
            <li class="">
                <a href="https://docs.kanboard.org/v1/dev/" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                    <span class="pm-contributing-icon"></span><?= t('Contributing') ?>
                </a>
            </li>
            <li class="">
                <a href="https://docs.kanboard.org/v1/plugins/" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                    <span class="pm-contributing-icon"></span><?= t('Developing Plugins') ?>
                </a>
            </li>
            <li class="">
                <a href="https://github.com/kanboard/kanboard" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                    <span class="pm-github-icon"></span><?= t('Source Code') ?>
                </a>
            </li>
            <li class="">
                <a href="https://kanboard.org/plugins.html" target="_blank" title="<?= t('Opens in a new window') ?> &#8663;" rel="noopener noreferrer">
                    <span class="pm-further-reading-icon"></span><?= t('Kanboard Plugins') ?>
                </a>
            </li>
        </ul>
    </section>
</div>
