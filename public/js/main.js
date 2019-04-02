var App = function () {
  var size_point = 991; //$this.data().responsive

  return {
    mobileDetect: function mobileDetect() {
      if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)) {
        $('html').addClass('mobile');
      } else {
        $('html').addClass('no-mobile');
      }
    },
    preloader: function preloader() {
      $('body').imagesLoaded(function () {
        $('.preloader-wrap').delay(200).fadeOut(700);
      });
    },
    navigationMobileStatus: function navigationMobileStatus() {
      $('.menu-bars').click(function (event) {
        if ($('.header-menu').hasClass('active')) {
          $('.header-menu').removeClass('active');
          $(this).removeClass('active');
        } else {
          $('.header-menu').addClass('active');
          $(this).addClass('active');
        }
      });
    },
    navigationHandler: function navigationHandler() {
      $(window).resize(function (event) {
        App.navigationResize();
        App.navigationSticky();
      }).trigger('resize');
      $(window).scroll(function (event) {
        App.navigationSticky();
      });
    },
    navigationResize: function navigationResize() {
      var $headerContent = $('#header-content'),
          window_w = $(window).innerWidth();

      if (window_w <= size_point) {
        $headerContent.addClass('header_mobile').removeClass('header-content');
      } else {
        $('.menu-bars').removeClass('active');
        $headerContent.removeClass('header_mobile').addClass('header-content').find('.header-menu').css({
          'top': ''
        }).removeClass('active').find('ul').css('display', '');
      }
    },
    navigationSticky: function navigationSticky() {
      var $headerContent = $('#header-content'),
          $headerContent_h = $headerContent.innerHeight(),
          window_w = $(window).innerWidth(),
          window_scroll = $(window).scrollTop();

      if (window_scroll > 0) {
        if (!$headerContent.hasClass('header-sticky')) {
          $headerContent.addClass('header-sticky');
          $(".platform").addClass('is-sticky');

          if (window_w <= size_point) {
            $headerContent.find('.header-menu').css('top', $headerContent_h + 'px');
          }
        }
      } else {
        $headerContent.removeClass('header-sticky');
        $(".platform").removeClass('is-sticky');

        if (window_w <= size_point) {
          $headerContent.find('.header-menu').css('top', $headerContent_h + 'px');
        }
      }
    },
    backToTop: function backToTop() {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          $('#back-top').fadeIn();
        } else {
          $('#back-top').fadeOut();
        }
      });
      $('#back-top span').click(function () {
        $('body,html').animate({
          scrollTop: 0
        }, 150);
        return false;
      });
    },
    rowEqualHeightHandler: function rowEqualHeightHandler() {
      $(window).resize(function (event) {
        if ($(window).innerWidth() < 768) {
          $(".eq").children("div[class*=col-]").css('height', 'inherit');
        } else {
          App.rowEqualHeight();
        }
      }).trigger('resize');
    },
    rowEqualHeight: function rowEqualHeight() {
      $(".eq").each(function () {
        var maxHeight = 0,
            toEq = $(this);
        toEq.children("div[class*=col-]").each(function () {
          $(this).css('height', 'inherit');
          maxHeight = $(this).innerHeight() > maxHeight ? $(this).innerHeight() : maxHeight;
        });
        toEq.children("div[class*=col-]").height(maxHeight);
      });
    }
  };
}();

var Forms = function () {
  return {
    placeholders: function placeholders() {
      $('[placeholder]').animatedplaceholder({
        'placeholder_attr': 'placeholder',
        'label_class': 'animatedplaceholder',
        'label_class_focus': 'placeholder-focus',
        'label_top': '14px',
        'label_left': '12px',
        'label_focus_top': '5px',
        'label_focus_left': '12px',
        'label_focus_size': 0.8
      });
    },
    textareas: function textareas() {
      $("textarea").on("input change paste keypress", function () {
        $(this).prop("rows", 1 + ($(this).val().match(/\n/g) || []).length);
      });
    },
    checkboxes: function checkboxes() {
      $(".checkbox input").change(function () {
        if ($(this).is(":checked")) {
          $(this).closest(".checkbox").addClass("checked").find("i").show();
        } else {
          $(this).closest(".checkbox").removeClass("checked").find("i").hide();
        }
      });
    },
    selects: function selects() {
      $('.selectpicker').on('change', function () {
        $(this).closest(".bootstrap-select").addClass("started");
      });
    },
    clearErrors: function clearErrors() {
      $(".is-invalid").removeClass("is-invalid");
      $(".invalid-feedback").remove();
    }
  };
}();

var Lead = function () {
  return {
    typeHandler: function typeHandler() {
      $('#type').on('change', function () {
        Forms.clearErrors();
        Lead.typeSegmentsFetch($(this));
        Lead.typeSegmentsDependancy($(this), true);
      });
      $('#type_segment').on('change', function () {
        Lead.typeSegmentsDependancy($(this), false);
        Lead.posRetailHandler();
      });
    },
    typeSegmentRestore: function typeSegmentRestore() {
      if ($('#type').length > 0) {
        if ($('#type option:selected').val() != '') {
          Lead.typeSegmentsFetch($('#type option:selected'));
        }
      }
    },
    typeSegmentsFetch: function typeSegmentsFetch(input) {
      var $typeSegmentOld = $("#type_segment_old"),
          value = input.val();
      $.ajax({
        url: '/lead/typeSegmentsFetch',
        method: "POST",
        data: {
          value: value,
          _token: $('input[name="_token"]').val()
        },
        success: function success(result) {
          $('#type_segment').html(result).selectpicker('refresh').closest(".bootstrap-select").removeClass("started");

          if ($typeSegmentOld.val() !== "") {
            $('select[name=type_segment]').val($typeSegmentOld.val()).selectpicker('refresh').closest(".bootstrap-select").addClass("started");
          }

          Lead.typeSegmentsDependancy($('select[name=type_segment]'), false);
          Lead.posRetailHandler();
        }
      });
    },
    typeSegmentsDependancy: function typeSegmentsDependancy(input, isType) {
      if (isType == true) {
        $('div[class*="dep_"]').hide();
      } else {
        if ($('#' + input.attr("id") + ' option:selected').length > 0) {
          var dependancy = $('#' + input.attr("id") + ' option:selected').attr("class"),
              dependancyType = dependancy.split('_')[0] + "_" + dependancy.split('_')[1];
          $('div[class*="' + dependancyType + '"]').hide();
          $('div.' + dependancy).show(); //$('div[class*="dep_"]').not('div[class*="'+dependancyType+'"]').hide();
        } else {
          $('#type_segment').closest(".bootstrap-select").removeClass("started");
        }
      }
    },
    devicesHandler: function devicesHandler() {
      $('#devices').on('change', function () {
        if ($(this).val() == 1) {
          $('.devices_wrapper').show().find('textarea').focus();
        } else {
          $('.devices_wrapper').hide();
        }
      });
    },
    kdsHandler: function kdsHandler() {
      $('#xef_kds').on('change', function () {
        if ($(this).val() == 1) {
          $('#xef_kds_quantity').prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
        } else {
          $('#xef_kds_quantity').prop("disabled", true).closest(".form-group").addClass("disabled");
        }
      });
    },
    pmsHandler: function pmsHandler() {
      $('#xef_typology_general').on('change', function () {
        if ($(this).val() == 7) {
          $('#xef_pms').prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");

          if ($('#xef_pms_other').val() != "") {
            $('#xef_pms_other').prop("disabled", false).closest(".form-group").removeClass("disabled");
          }
        } else {
          $('#xef_pms').prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
          $('#xef_pms_other').prop("disabled", true).closest(".form-group").addClass("disabled");
        }
      });
      $('#xef_pms').on('change', function () {
        if ($(this).val() == -1) {
          $('#xef_pms_other').prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
        } else {
          $('#xef_pms_other').prop("disabled", true).closest(".form-group").addClass("disabled");
        }
      });
    },
    posHandler: function posHandler() {
      $('#xef_property_franchise').on('change', function () {
        if ($(this).val() != 2) {
          $('#franchise_pos_external').prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
        } else {
          $('#franchise_pos_external').prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
        }
      });
    },
    posRetailHandler: function posRetailHandler() {
      if ($("#type").val() == 1 && $("#xef_property_franchise").val() == 1 || $("#type").val() == 2 && $("#type_segment").val() == 5) {
        $('#franchise_pos_external').prop("disabled", false).selectpicker("refresh").closest(".form-group").removeClass("disabled");
      } else {
        $('#franchise_pos_external').prop("disabled", true).selectpicker("refresh").closest(".form-group").addClass("disabled");
      }
    },
    erpHandler: function erpHandler() {
      $('#erp,#xef_erp,#retail_erp').on('change', function () {
        if ($(this).val() == -1) {
          $('#' + $(this).attr("id") + '_other').prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
        } else {
          $('#' + $(this).attr("id") + '_other').prop("disabled", true).closest(".form-group").addClass("disabled");
        }
      });
    },
    multiselectHandler: function multiselectHandler() {
      // PENDENT OPTIMITZAR
      Lead.multiselectChained($('#xef_soft'));
      Lead.multiselectChained($('#retail_soft'));
      Lead.multiselectSetNone($('#xef_property_spaces'));
      Lead.multiselectSetNone($('#retail_property_spaces'));
      Lead.multiselectFilterHandler();
      $('#xef_soft,#retail_soft').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        Lead.multiselectChained($(this), clickedIndex);
        Lead.multiselectFilterHandler();

        if ($(this).val().length == 0) {
          $(this).closest(".bootstrap-select").removeClass("started");
        }
      });
      $('#xef_property_spaces,#retail_property_spaces').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        Lead.multiselectSetNone($(this), clickedIndex);
        Lead.multiselectFilterHandler();

        if ($(this).val().length == 0) {
          $(this).closest(".bootstrap-select").removeClass("started");
        }
      });
    },
    multiselectFilterHandler: function multiselectFilterHandler() {
      $('#xef_soft,#retail_soft,#xef_property_spaces,#retail_property_spaces').closest(".bootstrap-select").find(".filter-option .hideHint:gt(0)").hide();
    },
    multiselectChained: function multiselectChained(dropdown, lastSelected) {
      if (dropdown.length > 0) {
        var $select = dropdown,
            values = $select.val();

        if (values.indexOf("other") != -1) {
          $('#' + $select.attr("id") + '_other').prop("disabled", false).focus().closest(".form-group").removeClass("disabled");
        } else {
          $('#' + $select.attr("id") + '_other').prop("disabled", true).closest(".form-group").addClass("disabled");
        }

        if (lastSelected !== undefined) {
          var lastValue = $select.find("option").eq(lastSelected).val();

          if (lastValue != "none") {
            $select.find("[value=none]").prop("selected", false);
            $select.selectpicker("refresh");
          } else if (lastValue == "none") {
            $select.find("option:not([value=none])").prop('selected', false);
            $select.selectpicker("refresh");
            $('#' + $select.attr("id") + '_other').prop("disabled", true).closest(".form-group").addClass("disabled");
          }
        }
      }
    },
    multiselectSetNone: function multiselectSetNone(dropdown, lastSelected) {
      if (dropdown.length > 0) {
        var $select = dropdown,
            values = $select.val();

        if (lastSelected !== undefined) {
          var lastValue = $select.find("option").eq(lastSelected).val();

          if (lastValue != 1 && $("#type").val() == 1 || lastValue != 4 && $("#type").val() == 2) {
            if ($("#type").val() == 1) {
              $select.find("[value=1]").prop("selected", false);
            }

            if ($("#type").val() == 2) {
              $select.find("[value=4]").prop("selected", false);
            }

            $select.selectpicker("refresh");
          } else if (lastValue == 1 && $("#type").val() == 1 || lastValue == 4 && $("#type").val() == 2) {
            if ($("#type").val() == 1) {
              $select.find("option:not([value=1])").prop('selected', false);
            }

            if ($("#type").val() == 2) {
              $select.find("option:not([value=4])").prop('selected', false);
            }

            $select.selectpicker("refresh");
          }
        }

        if (values.length < 2) {
          $select.closest(".bootstrap-select").removeClass("started");
        }
      }
    },
    mobileTabs: function mobileTabs() {
      $(".mobileTab a").not(".customSelect a").click(function () {
        $(".mobileTab .customSelect .dropdown-toggle .txt").text($(this).text());
        $(".mobileTab .customSelect ul li.active").removeClass("active");
      });
      $(".mobileTab .customSelect ul a").click(function () {
        $(".mobileTab .customSelect .dropdown-toggle .txt").text($(this).text());
        $(".mobileTab .customSelect ul li.active").removeClass("active"); //var id = $(".tab-pane.active").attr("id");
        //$(".mobileTab a[href*='#"+id+"']").closest("li").addClass("active");
      });
    }
  };
}();
/* -- DOCUMENT.READY ------------------------ */


$(document).ready(function () {
  App.mobileDetect();
  App.preloader();
  Lead.typeHandler();
  Lead.typeSegmentRestore();
  Lead.devicesHandler();
  Lead.kdsHandler();
  Lead.pmsHandler();
  Lead.posHandler();
  Lead.erpHandler();
  Lead.multiselectHandler();
  Lead.mobileTabs();
  App.navigationHandler();
  App.navigationMobileStatus();
  Forms.placeholders();
  Forms.textareas();
  Forms.checkboxes();
  Forms.selects();
  App.rowEqualHeightHandler();
  App.backToTop();
  $('.gridder').gridderExpander({
    scroll: true,
    scrollOffset: 100,
    scrollTo: "panel",
    // panel or listitem
    animationSpeed: 400,
    animationEasing: "easeInOutExpo",
    showNav: false
  });
});