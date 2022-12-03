<div class="pm-page-header">
    <h2 class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
        <?= t('Plugin Information') ?>
    </h2>
</div>
<div class="page-margin pm-page-margin">
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
                        <g data-name="Layer 75">
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
        <?php $countTypes = $this->helper->pluginManagerHelper->countTypes($available_plugins); ?>
        <?php $totalOthers = isset($countTypes) ? ((count($available_plugins)) - (array_sum($countTypes)) ) : '0' ?>
        <?php if ($totalOthers > 0): ?>
            <div class="info-type-wrapper">
                <div class="info-type-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                        <title><?= t('Other Plugin') ?></title>
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                    </svg>
                </div>
            <div class="info-type-box">
                <div class="info-type-text"><?= t('A plugin which has not been set a plugin type by the developer') ?></div>
                </div>
                <div class="info-type-title"><?= t('Other Plugin') ?></div>
            </div>
        <?php endif ?>
    </div>
    <figure class="notice"><?= t('Plugin types are only shown in the')?> <?= $this->url->link(t('Plugin Directory'), 'PluginController', 'directory', array(), false, 'plugin-directory-item') ?> </figure>
    <h3 id="PluginStructure" class=""><?= t('Plugin Structure') ?></h3>
    <p class="structure-p">
        <?= t('The official Plugins Directory has been updated to include extra information for each plugin. This information is set by the developer to indicate the code breakdown of the plugin.') ?>
    </p>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Documentation') ?></div>
        <div class="structure-info-section">
            <div class="structure-info-icon icon-normal pp-grey">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-book-half" fill="currentColor" viewBox="0 0 16 16">
                    <title><?= t('Readme') ?></title>
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('All plugins should have a readme file in the root of their plugin folder. This icons should show against all plugins.') ?></div>
        </div>
        <div class="structure-info-section">
            <div class="structure-info-icon icon-normal pp-grey">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="" fill="currentColor" viewBox="0 0 24 24">
                    <title><?= t('Plugin Homepage') ?></title>
                    <path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                    <path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('When links go wrong you should always be able to fallback to the plugin or developer homepage. This icon will show against all plugins which have a homepage set by the developer.') ?></div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Database Changes') ?></div>
        <div class="structure-info-unknown icon-unknown pp-grey">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-database" fill="currentColor" viewBox="0 0 16 16">
                <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313ZM13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 5.698ZM14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13V4Zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 8.698Zm0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525Z"/>
            </svg>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-true pp-orange">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-database-add" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
            </svg>
            </div>
            <div class="structure-info-text"><?= t('If a plugin is known to alter your database, this icon will show. Altering your database usually includes adding or modifying existing database tables.') ?></div>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-false pp-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-database-check" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                    <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('No database changes are detected when this icon shows.') ?></div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Overrides') ?></div>
        <div class="structure-info-unknown icon-unknown pp-grey">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-file-earmark-diff" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
            </svg>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-true pp-orange">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-file-earmark-plus" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('Overrides include template files and models. Both types of files affect how your data is presented to you. This icon will show when core templates or models are replaced with specific versions.') ?></div>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-false pp-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-file-earmark-check" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('No overrides are detected when this icon shows.') ?></div>
        </div>
    </div>
    <div class="structure-info-wrapper">
        <div class="structure-info-heading"><?= t('Hooks') ?></div>
        <div class="structure-info-unknown icon-unknown pp-grey">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-git" fill="currentColor" viewBox="0 0 16 16">
                <path d="M15.698 7.287 8.712.302a1.03 1.03 0 0 0-1.457 0l-1.45 1.45 1.84 1.84a1.223 1.223 0 0 1 1.55 1.56l1.773 1.774a1.224 1.224 0 0 1 1.267 2.025 1.226 1.226 0 0 1-2.002-1.334L8.58 5.963v4.353a1.226 1.226 0 1 1-1.008-.036V5.887a1.226 1.226 0 0 1-.666-1.608L5.093 2.465l-4.79 4.79a1.03 1.03 0 0 0 0 1.457l6.986 6.986a1.03 1.03 0 0 0 1.457 0l6.953-6.953a1.031 1.031 0 0 0 0-1.457"/>
            </svg>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-true pp-orange">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.5 4.25a2.25 2.25 0 014.5 0 .75.75 0 001.5 0 3.75 3.75 0 10-6.14 2.889l-2.272 4.258a.75.75 0 001.324.706L7 7.25a.75.75 0 00-.309-1.015A2.25 2.25 0 015.5 4.25z"></path>
                    <path d="M7.364 3.607a.75.75 0 011.03.257l2.608 4.349a3.75 3.75 0 11-.628 6.785.75.75 0 01.752-1.299 2.25 2.25 0 10-.033-3.88.75.75 0 01-1.03-.256L7.107 4.636a.75.75 0 01.257-1.03z"></path>
                    <path d="M2.9 8.776A.75.75 0 012.625 9.8 2.25 2.25 0 106 11.75a.75.75 0 01.75-.751h5.5a.75.75 0 010 1.5H7.425a3.751 3.751 0 11-5.55-3.998.75.75 0 011.024.274z"></path>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('Hooks are files which attach to existing templates or core functions. Hooks do not alter any core structure but add to it.') ?></div>
        </div>
        <div class="structure-info-3-section">
            <div class="structure-info-icon icon-false pp-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-bezier2" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                </svg>
            </div>
            <div class="structure-info-text"><?= t('No hooks are detected when this icon shows.') ?></div>
        </div>
    </div>
</div>
