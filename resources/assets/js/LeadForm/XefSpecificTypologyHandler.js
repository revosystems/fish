let XefSpecificTypologyHandler = function() {
    return {
        init: function(){ // PENDENT OPTIMITZAR
            $("#xef_specific_typology").closest(".bootstrap-select").find(".filter-option .hideHint:gt(0)").hide();
        },
    };
}();
