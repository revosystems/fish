let DevicesHandler = function() {
    return {
        init: function(){
            $("#devices").on("change", function () {
                if ($(this).val() == 1) {
                    $(".devices_wrapper").show().find("textarea").focus();
                } else {
                    $(".devices_wrapper").hide();
                }
            });
        }
    }
}();