let PropertySpacesHandler = function() {
    return {
        init: function(){
            $("#retail_property_space, #xef_property_space").on("change", function () {
                if ($(this).val() == "-1") {
                    $("#"+$(this).attr("id")+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#"+$(this).attr("id")+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        }
    }
}();