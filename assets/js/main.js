$(document).ready(function() {
    $("nav [href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });
});

$(document).ready(function(){
    $('select').formSelect();
  });
        