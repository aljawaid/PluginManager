// KANBOARD PLUGIN ASSET FILE

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


// TOGGLE DATES FOR PLUGIN LAST UPDATED
$(document).ready(function() {
    $(document).on("click",".date-toggle",function(){
        $('.exact-date').toggle();
        $('.relative-date').toggle();
    });
});
