<div class="sidebar">
    <ul class="plugin-menu">
        <li <?= $this->app->checkMenuSelection('PluginController', 'show') ?>>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                <title>Plugin Manager</title>
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
            </svg>
            <?= $this->url->link(t('Plugin Manager'), 'PluginController', 'show') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginController', 'directory') ?>>
            <i class="fa fa-cubes"></i> <?= $this->url->link(t('Plugin Directory'), 'PluginController', 'directory') ?>
        </li>
        <li <?= $this->app->checkMenuSelection('PluginManagerController', 'show') ?>>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cone-striped" viewBox="0 0 16 16">
                <title>Plugin Problems</title>
                <path d="m9.97 4.88.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.158-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z"/>
            </svg>
            <?= $this->url->link(t('Plugin Problems'), 'PluginManagerController', 'show', array('plugin' => 'PluginManager')) ?>
        </li>
    </ul>
</div>
