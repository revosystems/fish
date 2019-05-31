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


$(document).ready(function() {
    Layouts.toggleSidebar();
    Forms.selects();
    Forms.placeholders();
    Forms.textareas();
});