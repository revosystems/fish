let MultiSelect = function() {
    return {
        init: function(object) {
            object.closest(".bootstrap-select").find(".filter-option .hideHint:gt(0)").hide();
        }
    }
}();