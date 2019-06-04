$.fn.selectpicker.Constructor.DEFAULTS.style = "btn";
let PRODUCT_XEF = 1;
let PRODUCT_RETAIL = 2;
let GENERAL_TYPOLOGY_HOTEL = 7;

let App = function() {
    let size_point = 991;//$this.data().responsive
    return {
        mobileDetect: function () {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)) {
                $("html").addClass("mobile");
            } else {
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
                    return $(this).closest(".checkbox").addClass("checked").find("i").show();
                }
                $(this).closest(".checkbox").removeClass("checked").find("i").hide();
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


/* -- DOCUMENT.READY ------------------------ */

$(document).ready(function(){
    App.mobileDetect();
    App.preloader();
    LeadForm.init();
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