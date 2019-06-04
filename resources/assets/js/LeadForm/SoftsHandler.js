var SoftsHandler = function() {
    function otherFieldSelected(dropdown) {
        let dropDownOtherField = $("#" + dropdown.attr("id") + "_other");
        if (dropdown.val().indexOf("-1") === 0) {
            return dropDownOtherField.prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
        }
        dropDownOtherField.prop("disabled", true).closest(".form-group").addClass("disabled");
    }

    function noneFieldSelected(lastSelected, dropdown) {
        console.log(lastSelected);
        if (lastSelected === undefined) {
            return;
        }
        if (dropdown.find("option").eq(lastSelected).val() === "-2") {
            dropdown.find("option:not([value=-2])").prop("selected", false);
            dropdown.selectpicker("refresh");
            return $("#" + dropdown.attr("id") + "_other").prop("disabled", true).closest(".form-group").addClass("disabled");
        }
        dropdown.find("[value=-2]").prop("selected", false);
        dropdown.selectpicker("refresh");
    }

    return {
        init: function(){
            SoftsHandler.initProductSoft($("#xef_soft"));
            SoftsHandler.initProductSoft($("#retail_soft"));
        },

        initProductSoft: function(object){
            SoftsHandler.multiSelectChained(object);
            MultiSelect.init(object);

            object.on("changed.bs.select", function (e, clickedIndex, isSelected, previousValue) {
                SoftsHandler.multiSelectChained($(this),clickedIndex);
                MultiSelect.init(object);
                if ($(this).val().length === 0) {
                    $(this).closest(".started").removeClass("started");
                }
            });
        },

        multiSelectChained: function(dropdown, lastSelected){
            if (dropdown.length == 0) {
                return;
            }
            otherFieldSelected(dropdown);
            noneFieldSelected(lastSelected, dropdown);
        }
    };
}();
