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
