let KdsHandler = function() {
    return {
        init: function(){
            $("#xef_kds").on("change", function () {
                if ($(this).val() == 1) {
                    $("#xef_kds_quantity").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#xef_kds_quantity").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();