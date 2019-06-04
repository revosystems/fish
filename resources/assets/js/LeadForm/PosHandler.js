let PosHandler = function() {
    return {
        init: function(){
            $("#pos").on("change", function () {
                if ($(this).val() == -1) {
                    $("#pos_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#pos_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();