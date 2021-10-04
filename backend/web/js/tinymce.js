$(document).ready(function(){
    $(document).on("focusin", function(event) {
        if ($(event.target).closest(".tox").length) {
            console.log("clicked");
            event.stopImmediatePropagation();
        }
    });
});