// KANBOARD PLUGIN ASSET FILE

// FILTER TABLES IN THE INSTALLED PLUGINS PAGE
$(document).ready(function(){
    $("#InstalledPluginsFilterInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#InstalledPluginsTable tbody").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
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
