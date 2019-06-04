let MobileTabs = function() {
    return {
        init: function(){
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
    }
}();