let ErpHandler = function() {
    return {
        init: function(){
            $("#erp").on("change", function () {
                if ($(this).val() == -1) {
                    $("#erp_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#erp_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();