// KANBOARD PLUGIN ASSET FILE

$(document).ready(function(){
  $("#InstalledPluginsFilterInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#InstalledPluginsTable tbody").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

const input = document.getElementById("InstalledPluginsFilterInput")
input.addEventListener('mouseover', () => {
  input.select();
})
