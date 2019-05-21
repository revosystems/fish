$.fn.selectpicker.Constructor.BootstrapVersion = '4';
$.fn.selectpicker.Constructor.DEFAULTS.style = "btn";

var Forms = function() {
    return {
        placeholders: function () {
            $("[placeholder]").animatedplaceholder({
                "placeholder_attr": "placeholder",
                "label_class": "animatedplaceholder",
                "label_class_focus": "placeholder-focus",
                "label_top": "14px",
                "label_left": "12px",
                "label_focus_top": "5px",
                "label_focus_left": "12px",
                "label_focus_size": 0.8
            });
        },
        textareas: function () {
            $("textarea").on("input change paste keypress", function () {
                $(this).prop("rows", 1 + ($(this).val().match(/\n/g) || []).length);
            });
        },
        selects: function () {
            $(".selectpicker").on("change", function () {
                $(this).closest(".bootstrap-select").addClass("started");
            });
        }
    }
}();

var Layouts = function() {
    return {
        toggleSidebar: function () {
            $('.toggle-sidebar').click(function (e) {
                $('.main-sidebar').toggleClass('open');
            });
        }
    }
}();

var Lead = function(){
    return {
        multiselectHandler: function(){ // PENDENT OPTIMITZAR
            Lead.multiselectChained($("#xef_soft"));
            Lead.multiselectChained($("#retail_soft"));
            Lead.multiselectSetNone($("#xef_property_spaces"));
            Lead.multiselectSetNone($("#retail_property_spaces"));
            Lead.multiselectFilterHandler();

            $("select#xef_soft,select#retail_soft").on("changed.bs.select", function (e, clickedIndex, isSelected, previousValue) {
                Lead.multiselectChained($(this),clickedIndex);
                Lead.multiselectFilterHandler();

                var id = $(this).attr("id"); //test (O_O)?
                if($("#"+id).val().length===0){
                    $("#"+id).closest(".started").removeClass("started");
                }
            });

            $("#xef_property_spaces,#retail_property_spaces").on("changed.bs.select", function (e, clickedIndex, isSelected, previousValue) {
                Lead.multiselectSetNone($(this), clickedIndex);
                Lead.multiselectFilterHandler();

                if($(this).val().length==0){
                    $(this).closest(".form-group").find(".started").removeClass("started");
                }
            });
        },

        multiselectFilterHandler: function(){
            $("#xef_soft,#retail_soft,#xef_property_spaces,#retail_property_spaces").closest(".bootstrap-select").find(".filter-option .hideHint:gt(0)").hide();
        },

        multiselectChained: function(dropdown,lastSelected){
            if(dropdown.length>0){
                var $select =  dropdown,
                    values = $select.val();

                if(values.indexOf("other")!=-1){
                    $("#"+$select.attr("id")+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                }
                else{
                    $("#"+$select.attr("id")+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }

                if (lastSelected !== undefined){
                    var lastValue = $select.find("option").eq(lastSelected).val();

                    if(lastValue!="none"){
                        $select.find("[value=none]").prop("selected",false);
                        $select.selectpicker("refresh");
                    }
                    else if(lastValue=="none"){
                        $select.find("option:not([value=none])").prop("selected", false);
                        $select.selectpicker("refresh");
                        $("#"+$select.attr("id")+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                    }
                }
            }
        },

        multiselectSetNone: function(dropdown,lastSelected){
            if(dropdown.length>0){
                var $select =  dropdown,
                    values = $select.val();

                if (lastSelected !== undefined){
                    var lastValue = $select.find("option").eq(lastSelected).val();

                    if((lastValue!=1 && $("#product").val()==1) || (lastValue!=4 && $("#product").val()==2) ){

                        if($("#product").val()==1){
                            $select.find("[value=1]").prop("selected",false);
                        }
                        if($("#product").val()==2){
                            $select.find("[value=4]").prop("selected",false);
                        }

                        $select.selectpicker("refresh");
                    }
                    else if((lastValue==1 && $("#product").val()==1) || (lastValue==4 && $("#product").val()==2) ){
                        if($("#product").val()==1) {
                            $select.find("option:not([value=1])").prop("selected", false);
                        }
                        if($("#product").val()==2) {
                            $select.find("option:not([value=4])").prop("selected", false);
                        }
                        $select.selectpicker("refresh");
                    }
                }

                if(values.length<2){
                    //$select.closest(".bootstrap-select").removeClass("started");
                }
            }
        }
    }
}();


$(document).ready(function() {
    Layouts.toggleSidebar();
    Forms.selects();
    Forms.placeholders();
    Forms.textareas();
    Lead.multiselectHandler();
});