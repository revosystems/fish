let PmsHandler = function() {
    return {
        init: function(){
            $("#general_typology").on("change", function () {
                if ($("#product").val() != PRODUCT_XEF) {
                    return;
                }
                if ($(this).val() == GENERAL_TYPOLOGY_HOTEL) {
                    $("#xef_pms").prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
                } else {
                    $("#xef_pms").prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
                    $("#xef_pms_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });

            $("#xef_pms").on("change", function () {
                if ($(this).val() == -1) {
                    $("#xef_pms_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#xef_pms_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();