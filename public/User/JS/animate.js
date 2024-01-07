$("document").ready(function () {
    // index hero section fade left and right
    $(".welcome-text").addClass("animate__animated animate__fadeInLeft");
    $(".hero-img-wrapper").addClass("animate__animated animate__fadeInRight");
    $(".welcome-text").removeClass("animate__fadeOutLeft");
    $(".hero-img-wrapper").removeClass("animate__fadeOutRight");
    $(".role-card").addClass("animate__animated animate__fadeInUp");
    $(".container").addClass("animate__animated animate__fadeInUp");
});

// Remove nav active class
$("nav ul li a").click(function () {
    $("nav ul li a").removeClass("active");
    $(this).addClass("active");
});

// memastikan animasi scroll pada .title hanya pekerja pada index
var currentPage = window.location.pathname;
console.log(currentPage);
const baseURL = "/";

if (currentPage == baseURL) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll > 0) {
            $("header nav").css("scale", ".8");
            $("header").css("padding", "20px 100px");
            $("header").css("box-shadow", "0px 0px 10px 0px #c5d1ef");
            $("#logo").css("font-size", "30px");
        } else {
            $("header").css("box-shadow", "0px 0px 10px 0px transparent");
            $("header").css("padding", "30px 200px");
            $("#logo").css("font-size", "40px");
            $("header nav").css("scale", "1");
        }

        // index about section fade left and right when scroll down
        if (scroll > 300) {
            $(".about-img-wrapper").addClass(
                "animate__animated animate__fadeInLeft"
            );
            $(".about-text-wrapper").addClass(
                "animate__animated animate__fadeInRight"
            );
            $(".about-img-wrapper").removeClass("animate__fadeOutLeft");
            $(".about-text-wrapper").removeClass("animate__fadeOutRight");
        } else {
            $(".about-img-wrapper").removeClass("animate__fadeInLeft");
            $(".about-text-wrapper").removeClass("animate__fadeInRight");
            $(".about-img-wrapper").addClass(
                "animate__animated animate__fadeOutLeft"
            );
            $(".about-text-wrapper").addClass(
                "animate__animated animate__fadeOutRight"
            );
        }

        // index contact section fade up and down when scroll down
        if (scroll > 1200) {
            $(".title").removeClass("animate__fadeOutUp");
            $(".title").addClass("animate__animated animate__fadeInDown");
            $(".contact-wrapper").removeClass("animate__fadeOutDown");
            $(".contact-wrapper").addClass(
                "animate__animated animate__fadeInUp"
            );
        } else {
            $(".title").removeClass("animate__fadeInDown");
            $(".title").addClass("animate__animated animate__fadeOutUp");
            $(".contact-wrapper").removeClass("animate__fadeInUp");
            $(".contact-wrapper").addClass(
                "animate__animated animate__fadeOutDown"
            );
        }

        // index header nav active class when scrolling
        if (scroll >= $("#contact").offset().top - 1000) {
            $("nav ul li a").removeClass("active");
            $('nav ul li a[href="#contact"]').addClass("active");
        } else if (scroll >= $("#about").offset().top - 200) {
            $("nav ul li a").removeClass("active");
            $('nav ul li a[href="#about"]').addClass("active");
        } else {
            $("nav ul li a").removeClass("active");
            $('nav ul li a[href="#"]').addClass("active");
        }
    });
}

// rolecard animation
$(".role-card").click(function () {
    $(".signup-wrapper").css("transform", "translateX(-100vw)");
});

$(".back-toRole").click(function () {
    $(".signup-wrapper").css("transform", "translateX(0)");
});

// search bar scroll animation
if (!$(".container").hasClass("detail")) {
    $(".container").scroll(function () {
        var element = $(".search-bar");
        var parentOffset = element.parent().offset().top;
        if ($(".container").scrollTop() > parentOffset) {
            element.css("box-shadow", "0px 3px 5px 0px #c4c4c49c");
        } else {
            element.css("box-shadow", "none");
        }
    });
}

// sideNavigation hover and animation
$(function () {
    var isAnimationDone = false;

    $(".container").animate({ width: "90%" }, 1500, function () {
        $(this).animate({ width: "97.1%" }, 300, function () {
            isAnimationDone = true;
        });
    });

    $(".nav-wrapper").hover(
        function () {
            if (isAnimationDone) {
                $(".container").animate({ width: "90%" }, 300);
            }
        },
        function () {
            if (isAnimationDone) {
                $(".container").animate({ width: "97.1%" }, 300);
            }
        }
    );

    // input handle focus and blue events
    function handleFocus() {
        var $label = $(this).siblings("label");
        $label.css({
            top: "-12px",
            left: "5px",
            "font-size": "14px",
            color: "var(--secondaryColor)",
            "background-color": "#fff",
        });
        $(this)
            .parent(".input-wrapper")
            .css("border-color", "var(--secondaryColor)");
        $(this)
            .siblings(".input-wrapper button")
            .css("background-color", "var(--secondaryColor)");
    }

    function handleBlur() {
        var $label = $(this).siblings("label");
        var inputValue = $(this).val(); // Mendapatkan nilai input

        if (inputValue !== "") {
            // Memeriksa apakah input memiliki nilai
            $label.css({
                top: "-12px",
                left: "5px",
                "font-size": "14px",
                color: "gray",
                "background-color": "#fff",
            });
        } else {
            $label.css({
                top: "5px",
                left: "5px",
                color: "gray",
                "font-size": "16px",
                "background-color": "transparent",
            });
        }
        $(this).parent(".input-wrapper").css("border-color", "gray");
        $(this)
            .siblings(".input-wrapper button")
            .css("background-color", "gray");
    }

    $(".myForm input").focus(handleFocus).blur(handleBlur);

    $(".search-bar-wrapper .input-wrapper input, .input-wrapper textarea")
        .focus(handleFocus)
        .blur(handleBlur);
});

// Memastikan carousel hanya berjalan di homepage
var currentPage = window.location.pathname;
console.log(currentPage);

if (currentPage == "/home") {
    // owl carousel hanya berjalan di homepage
    $(".card-wrapper.owl-carousel").owlCarousel({
        loop: true,
        margin: -230,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dots: false,
    });
}
