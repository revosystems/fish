$.fn.selectpicker.Constructor.DEFAULTS.style = "btn";
let PRODUCT_XEF = 1;
let PRODUCT_RETAIL = 2;

var App = function() {
    var size_point = 991;//$this.data().responsive
    return {
        mobileDetect: function () {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)) {
                $("html").addClass("mobile");
            }
            else {
                $("html").addClass("no-mobile");
            }
        },

        preloader: function(){
            $("body").imagesLoaded(function(){
                $(".preloader-wrap").delay(200).fadeOut(700);
            });
        },

        navigationMobileStatus: function (){
            $(".menu-bars").click(function() {
                if($(".header-menu").hasClass("active")) {
                    $(".header-menu").removeClass("active");
                    $(this).removeClass("active");
                } else {
                    $(".header-menu").addClass("active");
                    $(this).addClass("active");
                }
            });
        },

        navigationHandler: function(){
            $(window).resize(function() {
                App.navigationResize();
                App.navigationSticky();
            }).trigger("resize");

            $(window).scroll(function() {
                App.navigationSticky();
            });
        },

        navigationResize: function(){
            var $headerContent = $("#header-content"),
                window_w = $(window).innerWidth();

            if(window_w <= size_point) {
                $headerContent.addClass("header_mobile").removeClass("header-content");
            }
            else {
                $(".menu-bars").removeClass("active");
                $headerContent
                    .removeClass("header_mobile").addClass("header-content")
                    .find(".header-menu").css({"top":""}).removeClass("active")
                    .find("ul").css("display", "");
            }
        },

        navigationSticky: function(){
            var $headerContent = $("#header-content"),
                $headerContent_h = $headerContent.innerHeight(),
                window_w = $(window).innerWidth(),
                window_scroll = $(window).scrollTop();

            if(window_scroll>0) {
                if(!($headerContent).hasClass("header-sticky")) {
                    $headerContent.addClass("header-sticky");
                    $(".platform").addClass("is-sticky");

                    if(window_w <= size_point) {
                        $headerContent.find(".header-menu").css("top", $headerContent_h + "px");
                    }
                }
            }
            else {
                $headerContent.removeClass("header-sticky");
                $(".platform").removeClass("is-sticky");

                if(window_w <= size_point) {
                    $headerContent.find(".header-menu").css("top", $headerContent_h + "px");
                }
            }
        },

        backToTop: function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $("#back-top").fadeIn();
                } else {
                    $("#back-top").fadeOut();
                }
            });

            $("#back-top span").click(function () {
                $("body,html").animate({
                    scrollTop: 0
                }, 150);
                return false;
            });
        },

        rowEqualHeightHandler: function(){
            $(window).resize(function(event) {
                if($(window).innerWidth()<768){
                    $(".eq").children("div[class*=col-]").css("height","inherit");
                }
                else{
                    App.rowEqualHeight();
                }
            }).trigger("resize");
        },

        rowEqualHeight: function(){
            $(".eq").each(function(){
                var maxHeight = 0,
                    toEq = $(this);

                toEq.children("div[class*=col-]").each(function(){
                    $(this).css("height","inherit");
                    maxHeight = ($(this).innerHeight()>maxHeight) ? $(this).innerHeight():maxHeight;
                });

                toEq.children("div[class*=col-]").height(maxHeight);
            });
        }
    };
}();

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

        checkboxes: function () {
            $(".checkbox input").change(function(){
                if($(this).is(":checked")){
                    $(this)
                        .closest(".checkbox").addClass("checked")
                        .find("i").show();
                }
                else{
                    $(this)
                        .closest(".checkbox").removeClass("checked")
                        .find("i").hide();
                }
            });
        },

        selects: function () {
            $(".selectpicker").on("change", function () {
                $(this).closest(".bootstrap-select").addClass("started");
            });
        },

        clearErrors: function(){
            $(".is-invalid").removeClass("is-invalid");
            $(".invalid-feedback").remove();
        }
    };
}();

var Lead = function() {

    return {
        typeHandler: function(){
            $("#product").on("change", function () {
                Forms.clearErrors();
                Lead.segmentTypes($(this));
                Lead.typeSegmentsDependency($(this),true);
            });

            $("#type_segment").on("change", function () {
                Lead.typeSegmentsDependency($(this),false);
            });
        },

        typeSegmentRestore: function(){
            if($("#product").length>0) {
                if ($("#product option:selected").val()!="") {
                    Lead.segmentTypes($("#product option:selected"));
                }
            }
        },

        segmentTypes: function (input) {
            var $typeSegmentOld = $("#type_segment_old"),
            value = input.val();

            $.ajax({
                url: "/lead/segments/types",
                method: "POST",
                data:{
                    value: value,
                    _token: $("input[name=\"_token\"]").val(),
                },
                success:function(result){
                    $("#type_segment")
                        .html(result)
                        .selectpicker("refresh")
                        .closest(".bootstrap-select").removeClass("started");

                    if($typeSegmentOld.val()!==""){
                        $("select[name=type_segment]")
                            .val($typeSegmentOld.val())
                            .selectpicker("refresh")
                            .closest(".bootstrap-select").addClass("started");
                    }
                    Lead.typeSegmentsDependency($("select[name=type_segment]"),false);
                }
            });
        },

        typeSegmentsDependency: function(input, productChanged) {
            if (productChanged) {
                return $("div[class*=\"dep_\"]").hide();
            }
            if (! $("#"+input.attr("id")+" option:selected").length) {
                $("#type_segment").closest(".bootstrap-select").removeClass("started");
            }

            let dependency = $("#" + input.attr("id") + " option:selected").attr("class");
            let dependencyType = dependency.split("_")[0] + "_" + dependency.split("_")[1];

            $("div[class*=\"" + dependencyType + "\"]").hide();
            $("div." + dependency).show();
            //$('div[class*="dep_"]').not('div[class*="'+dependencyType+'"]').hide();
        },

        devicesHandler: function(){
            $("#devices").on("change", function () {
                if ($(this).val() == 1) {
                    $(".devices_wrapper").show().find("textarea").focus();
                } else {
                    $(".devices_wrapper").hide();
                }
            });
        },

        kdsHandler: function(){
            $("#xef_kds").on("change", function () {
                if($(this).val() == 1){
                    $("#xef_kds_quantity").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                }
                else{
                    $("#xef_kds_quantity").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        pmsHandler: function(){
            $("#general_typology").on("change", function () {
                if ($("#product").val() != PRODUCT_XEF) {
                    return;
                }
                if ($(this).val() == 7) { // TYPOLOGY HOTEL
                    $("#xef_pms").prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
                    // if($('#xef_pms').val() == -1) {
                    //     $('#xef_pms_other').prop("disabled", false).closest(".form-group").removeClass("disabled");
                    // }
                } else {
                    $("#xef_pms").prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
                    $("#xef_pms_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });

            if ($("#xef_pms").val() == -1) {
                $("#xef_pms_other").prop("disabled", false).closest(".form-group").removeClass("disabled");
            }

            $("#xef_pms").on("change", function () {
                if ($(this).val() == -1) {
                    $("#xef_pms_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#xef_pms_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        posExternalHandler: function(){
            $("#property_franchise").on("change", function () {
                console.log($(this).val());
                if($(this).val() == 1){
                    $("#can_use_another_pos").prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
                } else {
                    $("#can_use_another_pos").prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
                }
            });
        },

        erpHandler: function(){
            $("#erp,#xef_erp,#retail_erp").on("change", function () {
                var base_id = $(this).attr("id").replace("_id", "");
                if ($(this).val() == -1) {
                    $("#"+base_id+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#"+base_id+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        posHandler: function(){
            $("#pos").on("change", function () {
                var base_id = $(this).attr("id").replace("_id", "");
                if ($(this).val() == "-1") {
                    $("#"+base_id+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#"+base_id+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        softHandler: function(){
            $("#retail_soft,#xef_soft").on("change", function () {
                var base_id = $(this).attr("id").replace("_id", "");
                if ($(this).val() == "-1") {
                    $("#"+base_id+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#"+base_id+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        propertySpacesHandler: function(){
            $("#retail_property_spaces, #xef_property_spaces").on("change", function () {
                var base_id = $(this).attr("id").replace("_id", "");
                if ($(this).val() == "-1") {
                    $("#"+base_id+"_other").prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
                } else {
                    $("#"+base_id+"_other").prop("disabled", true).closest(".form-group").addClass("disabled");
                }
            });
        },

        mobileTabs: function(){
            $(".mobileTab a").not(".customSelect a").click(function(){
                $(".mobileTab .customSelect .dropdown-toggle .txt").text($(this).text());
                $(".mobileTab .customSelect ul li a.active").removeClass("active");
            });

            $(".mobileTab .customSelect ul a").click(function(){
                $(".mobileTab .customSelect .dropdown-toggle .txt").text($(this).text());
                $(".mobileTab .customSelect ul li.active").removeClass("active");
                $(this).closest("li").addClass("active");

                var id = $(".tab-pane.active").attr("id");
                $(".mobileTab .nav-item a.active").removeClass("active").closest(".mobileTab").find("#"+id+"_tab").addClass("active");
            });
        }
    };
}();

/* -- DOCUMENT.READY ------------------------ */

$(document).ready(function(){
    App.mobileDetect();
    App.preloader();
    Lead.typeHandler();
    Lead.typeSegmentRestore();
    Lead.devicesHandler();
    Lead.kdsHandler();
    Lead.pmsHandler();
    Lead.posExternalHandler();
    Lead.posHandler();
    Lead.softHandler();
    Lead.erpHandler();
    Lead.propertySpacesHandler();
    Lead.mobileTabs();
    App.navigationHandler();
    App.navigationMobileStatus();
    Forms.placeholders();
    Forms.textareas();
    Forms.checkboxes();
    Forms.selects();
    App.rowEqualHeightHandler();
    App.backToTop();

    $(".gridder").gridderExpander({
        scroll: true,
        scrollOffset: 100,
        scrollTo: "panel", // panel or listitem
        animationSpeed: 400,
        animationEasing: "easeInOutExpo",
        showNav: false,
    });
});