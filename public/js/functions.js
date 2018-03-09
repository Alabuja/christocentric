
jQuery(function($) {
    "use strict";

    // ************ Back to Top
    var amountScrolled = 700;
    var backBtn = $("a.scrollToTop");
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > amountScrolled) {
            backBtn.fadeIn("slow");
        } else {
            backBtn.fadeOut("slow");
        }
    });
    backBtn.on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    
     // Push Menus 
    var $menuLeft = $(".pushmenu-left");
    var $menuRight = $(".pushmenu-right");
    var $toggleleft = $("#menu_bars.left");
    var $toggleright = $("#menu_bars.right");
    $toggleleft.on("click", function() {
        $(this).toggleClass("active");
        $(".pushmenu-push").toggleClass("pushmenu-push-toright");
        $menuLeft.toggleClass("pushmenu-open");
        return false;
    });
    $toggleright.on("click", function() {
        $(this).toggleClass("active");
        $(".pushmenu-push").toggleClass("pushmenu-push-toleft");
        $menuRight.toggleClass("pushmenu-open");
        return false;
    });

    //push DropDowns 
    var side_drop = $('.push_nav .dropdown');
    side_drop.on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    side_drop.on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

    // ************ tabbed content 
    $(".tab_content").hide();
    $(".tab_content:first").show();
    /* tab mode */
    $("ul.tabs li").on('click', function() {
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab_drawer_heading").removeClass("d_active");
        $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

    });
    /*drawer mode on Mobile Version*/
    $(".tab_drawer_heading").on("click", function() {
        $(".tab_content").hide();
        var d_activeTab = $(this).attr("rel");
        $("#" + d_activeTab).fadeIn(1200);
        $(".tab_drawer_heading").removeClass("d_active");
        $(this).addClass("d_active");
        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
    });


    //reset previously set border colors and hide all message on .keyup()
    $(".form-inline input, .form-inline textarea").keyup(function() {
        $("#result").slideUp();
    });

    // ************Owl Carousel
    $("#news_slider, #director_slider, #course_slider").owlCarousel({
        autoPlay: false,
        items: 3,
        pagination: false,
        stopOnHover: true,
        navigationText: ["<i class='icon-chevron-thin-left'></i>", "<i class=' icon-chevron-thin-right'></i>"],
        navigation: true,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
		  //itemsTablet: [768,2],
		  itemsMobile : [479,1],

    });

    $(".search_btn").on("click", function(event) {
            event.preventDefault();
            $("#search").addClass("open");
            $("#search > form > input[type='search']").focus();
        });

        $("#search, #search button.close").on("click keyup", function(event) {
            if (event.target == this || event.target.className == "close" || event.keyCode == 27) {
                $(this).removeClass("open");
            }
        });

    // ============= Revolution Slider =============
    var revapi;
    revapi = jQuery("#rev_slider").revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        scrollbarDrag: "true",
        delay: 9000,
        spinner: "off",
        navigation: {
            arrows: {
                enable: true
            },
            mouseScrollNavigation: "off",
            keyboardNavigation: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }

        },
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 960, 750, 480],
        gridheight: [670, 600, 500, 390],
    });
	 
	 //Full Screen
	 revapi = jQuery("#rev_slider_full").revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        delay: 9000,
        spinner: "off",
        navigation: {
            arrows: {
                enable: true
            },
            mouseScrollNavigation: "off",
            keyboardNavigation: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }

        },
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 960, 750, 480],
        gridheight: [670, 600, 500, 390],
    });
	  
    // ============= Parallax=============
    $(".page_header").parallax("50%", 0.3);
    $("#parallax").parallax("50%", 0.2);
    $("#counter").parallax("50%", 0.2);

    // ======= Cubeportfolio ======

    //Project Filter
    $("#projects").cubeportfolio({
        filters: "#project-filter",
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideDelay',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        displayTypeSpeed: 100,
    });

    var popupMeta = {
        width: 400,
        height: 400
    }
    $(document).on('click', '.social-share', function(event){
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
            hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share',
            'width='+popupMeta.width+',height='+popupMeta.height+
            ',left='+vpPsition+',top='+hPosition+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
});

    // +++++ WOW Transitions
    // if ($(window).width() > 767) {
    //     new WOW().init();
    // }

});