<fieldset class="manual-install">
    <legend><?= t('Manually Install Plugin') ?></legend>
    <form method="post" class="file-url-form" action="<?=$this->url->href('PluginManagerController', 'installPlugin', array('plugin' => 'PluginManager'))?>" enctype="multipart/form-data" autocomplete="on" >
        <?= $this->form->csrf() ?>
        <p class=""><?= t('Choose to install from a local archive (.zip) file or a remote location') ?></p>
        <section class="install-section">
            <?= $this->form->label(t('From File'), 'pluginfile') ?>
            <input type="file" accept="application/zip" class="plugin-file" name="pluginfile" id="form-pluginfile">
        </section>
        <section class="install-section">
            <?= $this->form->label(t('From URL'), 'plugin_url') ?>
            <?= $this->form->input('url', 'plugin_url', $values, array(), array('id="plugin_url" placeholder="https://mydomain.com/plugin.zip"'), 'plugin-url') ?>
        </section>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Install') ?></button>
        </div>
    </form>
</fieldset>
