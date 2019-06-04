let PosExternalHandler = function() {
    return {
        init: function(){
            $("#property_franchise").on("change", function () {
                if($(this).val() == 1){
                    $("#can_use_another_pos").prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
                } else {
                    $("#can_use_another_pos").prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();