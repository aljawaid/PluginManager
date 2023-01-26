// KANBOARD PLUGIN ASSET FILE

$(document).ready(function() {
    // Click event for any anchor tag that's href starts with #
    $('a[href^="#main"], a[href^="#PluginTop"]').click(function(event) {

        // The id of the section we want to go to.
        var id = $(this).attr("href");

        // An offset to push the content down from the top. Lower the value to push down
        var offset = 100;

        // Our scroll target : the top position of the
        // section that has the id referenced by our href.
        var target = $(id).offset().top - offset;

        // The magic...smooth scrollin' goodness.
        $('html, body').animate({scrollTop:target}, 1000);

        //prevent the page from jumping down to our section.
        event.preventDefault();
    });
});
