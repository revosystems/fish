let SegmentationHandler = function() {
    return {
        init: function(){
            let product = $("#product");
            product.on("change", function () {
                Forms.clearErrors();
                SegmentationHandler.typeSegmentsDependency();
            });
            if (product.val() && product.hasClass('started')) {
                SegmentationHandler.typeSegmentsDependency();
            }
            let object = $("#xef_specific_typology");
            MultiSelect.init(object);
            object.on("changed.bs.select", function (e, clickedIndex, isSelected, previousValue) {
                MultiSelect.init(object);
                if ($(this).val().length === 0) {
                    $(this).closest(".started").removeClass("started");
                }
            });
        },

        typeSegmentsDependency: function() {
            $("div[class*=\"show-on-\"]").hide();
            $("div." + 'show-on-product').show();
            $("div." + 'show-on-' + $("#product").val()).show();
        }
    }
}();