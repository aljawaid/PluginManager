// KANBOARD PLUGIN ASSET FILE

// Dynamic filtering of the plugin directory list on plugin types
$(document).ready(function() {
    "use strict";

    const target = 'table.available-plugins-table';
    const activator = 'div.plugin-type-count-section';
    const bgColor = 'LightGray';
    let filter = null;
    let mode = 0;

    function isType(type) {
        return `[data-type='${type}']`;
    }

    function isNotType(type) {
        return `[data-type!='${type}']`;
    }

    function select(cond) {
        $(`${activator}${cond}`).css('background-color', bgColor);
        $(`${target}${cond}`).show();
    }

    function deselect(cond) {
        $(`${activator}${cond}`).css('background-color', '');
        $(`${target}${cond}`).hide();
    }

    $(activator).click(function() {
        const type = $(this).data('type');

        if (filter != type) {
            mode = 1;
        }

        switch(mode){
            case 0: // Turn off
                filter = null;
                mode = 1;
                $(target).show();
                $(activator).css('background-color', '');
                break;
            case 1: // Select type
                filter = type;
                mode = 2;
                select(isType(type));
                deselect(isNotType(type));
                break;
            case 2: // Select all but type
                filter = type;
                mode = 0;
                select(isNotType(type));
                deselect(isType(type));
                break;
            default: // Ignore
        }
    });
});

// FILTER TABLES IN THE INSTALLED PLUGINS PAGE
$(document).ready(function(){
    $("#InstalledPluginsFilterInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#InstalledPluginsTable tbody").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// PREVENTS ENTER KEY FROM BEING USED FOR THIS FORM
$(document).ready(function() {
    $("#InstalledPluginsFilterInput").on("keypress", function (event) {
        //console.log("Enter key pressed on input field inside form");
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            alert("The enter key is ignored as it is not required in this filter");
            event.preventDefault();
            return false;
        }
    });
});

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("InstalledPluginsFilterInput");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});

// SELECT INPUT ON MOUSOVER
$(document).ready(function() {
    const input = document.getElementById("AvailablePluginsFilterInput");
    if (input !== null) {
        input.addEventListener('mouseover', () => {
            input.select();
        })
    }
});

// TOGGLE DATES FOR PLUGIN LAST UPDATED
$(document).ready(function() {
    $(document).on("click",".date-toggle",function(){
        $('.exact-date').toggle();
        $('.relative-date').toggle();
    });
});

// FILTER TABLES IN THE PLUGIN DIRECTORY
$(document).ready(function(){
    $("#AvailablePluginsFilterInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".available-plugins-table").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// PREVENTS ENTER KEY FROM BEING USED FOR THIS FORM
$(document).ready(function() {
    $("#AvailablePluginsFilterInput").on("keypress", function (event) {
        //console.log("Enter key pressed on input field inside form");
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            alert("The enter key is ignored as it is not required in this filter");
            event.preventDefault();
            return false;
        }
    });
});

// INSTALLED PLUGIN LIST
// COPY TO CLIPBOARD SCRIPT - INSTANTIATE SCRIPT - /// FORMATTED OUTPUT TO CLIPBOARD
$( document ).ready(function() {
    var clipboard = new ClipboardJS('.copy-installed-list-format');

    // COPY TO CLIPBOARD SCRIPT - SUCCESS/ERROR STATES
    clipboard.on('success', function(e) {
        $(e.trigger).html("<strong style='font-size:28px; line-height: 1.2;'>&#10004;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html("<svg height='30px' class='clippy-icon' fill='currentColor' viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'><path xmlns='http://www.w3.org/2000/svg' d='M128 768h256v64H128v-64z m320-384H128v64h320v-64z m128 192V448L384 640l192 192V704h320V576H576z m-288-64H128v64h160v-64zM128 704h160v-64H128v64z m576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z'/></svg>");
        }, 3500);
    });
    clipboard.on('error', function(e) {
        $(e.trigger).html("<strong style='font-size:28px; line-height: 1.2;'>&#10008;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html("<svg height='30px' class='clippy-icon' fill='currentColor' viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'><path xmlns='http://www.w3.org/2000/svg' d='M128 768h256v64H128v-64z m320-384H128v64h320v-64z m128 192V448L384 640l192 192V704h320V576H576z m-288-64H128v64h160v-64zM128 704h160v-64H128v64z m576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z'/></svg>");
        }, 3500);
    });
});

// INSTALLED PLUGIN LIST
// COPY TO CLIPBOARD SCRIPT - INSTANTIATE SCRIPT /// FORMATTED OUTPUT TO CLIPBOARD
$( document ).ready(function() {
    var clipboard = new ClipboardJS('.copy-url-link-format');

    // COPY TO CLIPBOARD SCRIPT - SUCCESS/ERROR STATES
    clipboard.on('success', function(e) {
        $(e.trigger).html("<strong style='font-size:20px; line-height: 1.1;'>&#10004;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html("<svg height='24px' class='clippy-icon' fill='currentColor' viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'><path xmlns='http://www.w3.org/2000/svg' d='M128 768h256v64H128v-64z m320-384H128v64h320v-64z m128 192V448L384 640l192 192V704h320V576H576z m-288-64H128v64h160v-64zM128 704h160v-64H128v64z m576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z'/></svg>");
        }, 3500);
    });
    clipboard.on('error', function(e) {
        $(e.trigger).html("<strong style='font-size:20px; line-height: 1.1;'>&#10008;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html("<svg height='24px' class='clippy-icon' fill='currentColor' viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'><path xmlns='http://www.w3.org/2000/svg' d='M128 768h256v64H128v-64z m320-384H128v64h320v-64z m128 192V448L384 640l192 192V704h320V576H576z m-288-64H128v64h160v-64zM128 704h160v-64H128v64z m576 64h64v128c-1 18-7 33-19 45s-27 18-45 19H64c-35 0-64-29-64-64V192c0-35 29-64 64-64h192C256 57 313 0 384 0s128 57 128 128h192c35 0 64 29 64 64v320h-64V320H64v576h640V768zM128 256h512c0-35-29-64-64-64h-64c-35 0-64-29-64-64s-29-64-64-64-64 29-64 64-29 64-64 64h-64c-35 0-64 29-64 64z'/></svg>");
        }, 3500);
    });
});

// Filter Updates in Installed Plugins
KB.onClick('.js-updates-copy-paste', function (e) {
    var update = KB.dom(e.target).data('update');
    var target = KB.dom(e.target).data('updateTarget');
    var targetField = KB.find(target);

    if (targetField) {
        targetField.build().value = update;
    }
});

// Filter Tables in the Installed Plugins Page on Mouseover
$(document).ready(function(){
    $("#InstalledPluginsFilterInput").on("mouseover", function() {
        var value = $(this).val().toLowerCase();
        $("#InstalledPluginsTable tbody").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// Add attributes to links in plugin descriptions
$(document).ready(function(){
    $('.available-plugin-description .markdown p a').attr('target', '_blank');
    $('.available-plugin-description .markdown p a').attr('rel', 'noopener noreferrer');
    $('.available-plugin-description .markdown p a').attr('title', 'Opens in a new window');
});
