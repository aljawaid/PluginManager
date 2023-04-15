<fieldset class="manual-install">
    <legend><?= t('Manually Install Plugin') ?></legend>
    <form method="post" class="file-url-form" action="<?=$this->url->href('PluginManagerController', 'installPlugin', array('plugin' => 'PluginManager'))?>" enctype="multipart/form-data" autocomplete="on" >
        <?= $this->form->csrf() ?>
        <?= $this->form->label(t('From File'), 'pluginfile') ?>
        <input type="file" accept="application/zip" name="pluginfile" id="form-pluginfile">
        <?= $this->form->label(t('From URL'), 'pluginfile') ?>
        <input type="url" id="plugin_url" name="plugin_url" placeholder="https://whatever/plugin.zip"/>
        <section class="install-section">
        </section>
        <section class="install-section">
        </section>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Install') ?></button>
        </div>
    </form>
</fieldset>
