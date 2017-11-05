"use strict";

function include(scriptUrl) {
    document.write("<script src=\"/Home/" + scriptUrl + "\"></script>");
}

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf("msie") !== -1) ? parseInt(myNav.split("msie")[1]) : false;
}

include("js/jquery.cookie.js");
include("js/jquery.easing.1.3.js");
(function ($) {
    var o = $("html");
    if (o.hasClass("desktop")) {
        include("js/tmstickup.js");
        $(document).ready(function () {
            $("#stuck_container").TMStickUp({});
        });
    }
})(jQuery);
(function ($) {
    var o = $("html");
    if (o.hasClass("desktop")) {
        include("js/jquery.ui.totop.js");
        $(document).ready(function () {
            $().UItoTop({easingType: "easeOutQuart"});
        });
    }
})(jQuery);
(function ($) {
    var o = $("html");
    if (o.hasClass("desktop")) {
        /*include('js/jquery.mousewheel.min.js');
        include('js/jquery.simplr.smoothscroll.min.js');
        $(document).ready(function () {
            $.srSmoothscroll({step: 150, speed: 800});
        });*/
    }
})(jQuery);
(function ($) {
    var o = $("#camera");
    if (o.length > 0) {
        include("js/camera.js");
        $(document).ready(function () {
            o.camera({
                autoAdvance: true,
                height: "41%",
                minHeight: "300px",
                pagination: true,
                thumbnails: false,
                playPause: false,
                hover: false,
                loader: "none",
                navigation: false,
                navigationHover: false,
                mobileNavHover: false,
                fx: "simpleFade"
            });
        });
    }
})(jQuery);
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text(currentYear);
    });
})(jQuery);
(function ($) {
    var o = $("html");
    if ((navigator.userAgent.toLowerCase().indexOf("msie") === -1) || (isIE() && isIE() > 9)) {
        if (o.hasClass("desktop")) {
            include("js/wow.js");
            $(document).ready(function () {
                new WOW().init();
            });
        }
    }
})(jQuery);
(function ($) {
    var o = $("#contact-form");
    if (o.length > 0) {
        include("js/modal.js");
        // include('js/TMForm.js');
    }
})(jQuery);
$(function () {
    var viewportmeta                           = document.querySelector && document.querySelector("meta[name=\"viewport\"]"),
        ua = navigator.userAgent, gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        }, scaleFix                            = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };
    scaleFix();
    if (window.orientation !== undefined) {
        var regM = /ipod|ipad|iphone/gi, result = ua.match(regM);
        if (!result) {
            $(".sf-menus li").each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(function () {
                        return false;
                    }, function () {
                        window.location.href = $(this).prop("href");
                    });
                }
            });
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(), regV = /ipod|ipad|iphone/gi, result = ua.match(regV), userScale = "";
if (!result) {
    userScale = ",user-scalable=0";
}
document.write("<meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0" + userScale + "\">");
(function ($) {
    var o = $(".parallax");
    if (o.length > 0 && $("html").hasClass("desktop")) {
        include("js/jquery.rd-parallax.js");
    }
})(jQuery);