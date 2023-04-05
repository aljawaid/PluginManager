<fieldset >
    <legend><?= t('Install plugin') ?></legend>
    <form method='post'
        action='<?=$this->url->href('PluginManagerController', 'installPlugin',
            array('plugin' => 'PluginManager'))?> ' enctype='multipart/form-data' autocomplete='off' >
        <?= $this->form->csrf() ?>
        <?= $this->form->label(t('From File'), 'pluginfile') ?>
        <?= $this->form->file('pluginfile') ?>
        <?= $this->form->label(t('From URL'), 'pluginfile') ?>
        <input type='url' id='plugin_url' name='plugin_url' placeholder='https://whatever/plugin.zip'/>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Install') ?></button>
        </div>
    </form>
</fieldset>
