<div class="page-header">
    <h2 class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
        <?= t('Plugin Information') ?>
    </h2>
</div>
<div class="page-margin">
    <h3 id="TypesOfPlugins" class=""><?= t('Types of Plugins') ?></h3>
    <p class=""><?= t('All plugins do the same basic job of extending the features of the application. Different functions require different ways of coding which is why all plugins fall into one of the types below.') ?></p>
    <div class="info-type-section">
        <div class="info-type-wrapper">
            <div class="info-type-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                    <title><?= t('General Plugin') ?></title>
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                </svg>
            </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin of any type but with no automatic actions') ?></div>
            </div>
            <div class="info-type-title"><?= t('General Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 52 52"  fill="currentColor" enable-background="new 0 0 52 52" xml:space="preserve">
                        <title><?= t('Action Plugin') ?></title>
                        <path d="M47.6,37.6c-0.5-0.1-1.1-0.1-1.6-0.2c-0.1,0-0.2-0.1-0.2-0.2c-0.2-0.6-0.5-1.2-0.7-1.7c0-0.1,0-0.2,0-0.3
                        c0.3-0.4,0.7-0.9,1-1.3c0.2-0.3,0.2-0.6-0.1-0.9c-0.6-0.6-1.2-1.2-1.8-1.8c-0.1-0.1-0.3-0.2-0.4-0.2s-0.3,0.1-0.4,0.2
                        c-0.4,0.3-0.9,0.7-1.3,1c-0.1,0-0.1,0.1-0.1,0.1h-0.1c-0.6-0.2-1.1-0.5-1.7-0.7c-0.1,0-0.2-0.1-0.2-0.2c-0.1-0.5-0.1-1-0.2-1.5
                        c0-0.3-0.1-0.5-0.4-0.7c-0.1-0.1-0.2-0.1-0.2-0.1c-0.9,0-1.7,0-2.6,0c-0.2,0-0.3,0-0.4,0.1c-0.2,0.2-0.4,0.4-0.4,0.7
                        c0,0.5-0.1,1-0.2,1.5c0,0.1-0.1,0.2-0.2,0.2c-0.6,0.2-1.1,0.5-1.7,0.7h-0.1c-0.1,0-0.1,0-0.2-0.1c-0.4-0.3-0.8-0.7-1.3-1
                        C32,31.1,31.9,31,31.7,31s-0.3,0.1-0.5,0.2c-0.6,0.6-1.2,1.2-1.8,1.8c-0.3,0.3-0.3,0.6-0.1,0.9c0.3,0.4,0.7,0.8,1,1.3
                        c0.1,0.1,0.1,0.2,0,0.3c-0.2,0.6-0.5,1.1-0.7,1.7c0,0.1-0.1,0.2-0.2,0.2c-0.5,0.1-1,0.1-1.5,0.2c-0.3,0-0.6,0.2-0.7,0.5c0,1,0,2,0,3
                        c0.2,0.3,0.4,0.4,0.7,0.5c0.5,0,1,0.1,1.5,0.2c0.1,0,0.2,0.1,0.2,0.2c0.2,0.6,0.5,1.1,0.7,1.7c0,0.1,0.1,0.2,0,0.3
                        c-0.3,0.4-0.7,0.9-1,1.3c-0.2,0.3-0.2,0.6,0.1,0.9c0.6,0.6,1.2,1.2,1.8,1.8c0.2,0.2,0.3,0.2,0.5,0.2c0.1,0,0.3-0.1,0.4-0.2
                        c0.4-0.3,0.8-0.7,1.3-1c0.1,0,0.1-0.1,0.2-0.1h0.1c0.6,0.2,1.1,0.5,1.7,0.7c0.1,0,0.2,0.1,0.2,0.2c0.1,0.5,0.1,1.1,0.2,1.6
                        c0,0.4,0.3,0.6,0.7,0.6s0.9,0,1.3,0c0.4,0,0.8,0,1.2,0s0.6-0.2,0.7-0.6c0.1-0.5,0.1-1.1,0.2-1.6c0-0.1,0.1-0.2,0.2-0.2
                        c0.6-0.2,1.2-0.5,1.7-0.7h0.1c0,0,0.1,0,0.1,0.1c0.4,0.3,0.9,0.7,1.3,1c0.1,0.1,0.3,0.2,0.4,0.2c0.2,0,0.3-0.1,0.5-0.2
                        c0.6-0.6,1.2-1.2,1.8-1.8c0.3-0.3,0.3-0.6,0.1-0.9c-0.3-0.4-0.7-0.8-1-1.3c-0.1-0.1-0.1-0.2,0-0.3c0.2-0.6,0.5-1.1,0.7-1.7
                        c0-0.1,0.1-0.2,0.2-0.2c0.5-0.1,1.1-0.1,1.6-0.2c0.4,0,0.6-0.3,0.6-0.7c0-0.8,0-1.7,0-2.5C48.2,37.9,48,37.7,47.6,37.6z M37.8,43.6
                        C37.8,43.6,37.7,43.6,37.8,43.6c-2.3,0-4-1.8-4-4s1.8-4,4-4l0,0c2.2,0,4,1.8,4,4C41.7,41.8,39.9,43.6,37.8,43.6z"/>
                        <path d="M38.7,20.7c-0.2-0.8-0.8-1.3-1.6-1.3c-3.2,0-6.4,0-9.6,0l0,0c-1.2,0-0.6-1-0.6-1c0.2-0.4,0.4-0.7,0.5-1.1
                        c2.2-4.3,4.3-8.6,6.5-12.9c0.8-1.2,0-2.4-1.4-2.4c-6,0-11.9,0-17.9,0c-0.9,0-1.3,0.3-1.7,1.1c-3,7.6-6,15.1-8.9,22.7
                        c0,0.2-0.1,0.4-0.1,0.5c-0.1,1,0.6,1.7,1.7,1.7c3.2,0,6.5,0,9.7,0c0.7,0.1,2.1,0.4,1.4,2.2c-1.2,3.1-2.4,6.1-3.6,9.2
                        c-1.2,2.8-2.3,5.6-3.4,8.4c-0.4,1,0,1.9,1,2.2c0.7,0.2,1.2-0.1,1.7-0.6c4-4.2,8-8.4,12-12.7c0.5-0.5,0.9-1,1.4-1.5
                        c0.6-0.6,0.5-1.6,0.5-1.6l0,0c0-1,0.3-1.9,1.1-2.7c0.6-0.6,1.2-1.2,1.8-1.8c0.7-0.7,1.6-1.1,2.6-1.1c0.7,0,1.1-0.3,1.3-0.4l0.1-0.1
                        l0,0l0,0c1.7-1.8,3.5-3.7,5.2-5.5C38.7,21.7,38.9,21.2,38.7,20.7z"/>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin for automatic actions only') ?></div>
            </div>
            <div class="info-type-title"><?= t('Action Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg width="50px" height="50px" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <title><?= t('Theme Plugin') ?></title>
                        <g data-name="Layer 75" id="Layer_75">
                            <path d="M23,28H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V9A1,1,0,0,1,5,8H9.1a5,5,0,0,1,9.8,0H23a1,1,0,0,1,1,1v4.1a5,5,0,0,1,0,9.8V27A1,1,0,0,1,23,28Zm-4.1-2H22V22a1,1,0,0,1,1-1,3,3,0,0,0,0-6,1,1,0,0,1-1-1V10H18a1,1,0,0,1-1-1,3,3,0,0,0-6,0,1,1,0,0,1-1,1H6v3.1a5,5,0,0,1,0,9.8V26H9.1a5,5,0,0,1,9.8,0Z"/>
                            <path d="M26,18.15c-.46,2.16-5.94,2.36-9.46,2.36s-6.71-2.43-6.71-3.64h-1A4.17,4.17,0,0,1,9,18a4,4,0,0,1-4,4v5h5a4,4,0,0,1,8,0h5V22a4,4,0,0,0,3.1-1.5Z"/>
                        </g>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin for theming and styling of the interface') ?></div>
            </div>
            <div class="info-type-title"><?= t('Theme Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="50px"  viewBox="0 0 32 32" xml:space="preserve">
                        <title><?= t('Connector Plugin') ?></title>
                        <style type="text/css">.st0 {fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; stroke-miterlimit:10;}</style>
                        <path class="st0" d="M5.5,26.5L5.5,26.5c1.9,1.9,5.1,1.9,7,0L16,23l-7-7l-3.5,3.5C3.5,21.5,3.5,24.6,5.5,26.5z"/>
                        <line class="st0" x1="8" y1="15" x2="17" y2="24"/>
                        <line class="st0" x1="10" y1="17" x2="14" y2="13"/>
                        <line class="st0" x1="15" y1="22" x2="19" y2="18"/>
                        <line class="st0" x1="2" y1="30" x2="5" y2="27"/>
                        <path class="st0" d="M26.5,5.5L26.5,5.5c-1.9-1.9-5.1-1.9-7,0L16,9l7,7l3.5-3.5C28.5,10.5,28.5,7.4,26.5,5.5z"/>
                        <line class="st0" x1="30" y1="2" x2="27" y2="5"/>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin connecting to third party services - may contain automatic actions') ?></div>
            </div>
            <div class="info-type-title"><?= t('Connector Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <title><?= t('Multi Plugin') ?></title>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 3H21V11H13V3ZM15 5H19V9H15V5Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 21V13H11V7H3V21H17ZM9 9H5V13H9V9ZM5 19L5 15H9V19H5ZM11 19V15H15V19H11Z" fill="currentColor"/>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin containing multiple functions and automatic actions or connectors') ?></div>
            </div>
            <div class="info-type-title"><?= t('Multi Plugin') ?></div>
        </div>
        <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                        <title><?= t('Multi Plugin') ?></title>
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin which has not been set a plugin type by the developer') ?></div>
            </div>
            <div class="info-type-title"><?= t('Other Plugin') ?></div>
        </div>
    </div>
    <figure class="notice"><?= t('Plugin types are only shown in the')?> <?= $this->url->link(t('Plugin Directory'), 'PluginController', 'directory', array(), false, 'plugin-directory-item') ?> </figure>
    <h3 id="PluginStructure" class=""><?= t('Plugin Structure') ?></h3>
</div>
