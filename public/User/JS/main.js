$("document").ready(function () {
    console.log("ready!");
    // get year
    var year = new Date().getFullYear();
    $("#year").html(year);
});

$(function () {
    // cek active page
    var currentPage = window.location.pathname;
    console.log(currentPage);

    if (currentPage == "/home") {
        $("#home").addClass("active");
        $(".container").css("width", "90%");
    } else if (currentPage == "/books") {
        $("#books").addClass("active");
        $(".container").css("width", "90%");
    } else if (currentPage == "/article") {
        $("#jurnal").addClass("active");
        $(".container").css("width", "90%");
    } else if (currentPage == "/collection") {
        $("#koleksi").addClass("active");
        $(".container").css("width", "90%");
    } else if (currentPage == "/account") {
        $("#account").addClass("active");
        $(".container").css("width", "90%");
    }
});

// dropdown type
$("#type").click(function () {
    $(this)
        .siblings(".option-wrapper")
        .toggleClass("active")
        .css({
            height: $(this).siblings(".option-wrapper").hasClass("active")
                ? 44 * 2 + "px"
                : "",
            "border-color": $(this)
                .siblings(".option-wrapper")
                .hasClass("active")
                ? "gray"
                : "",
            "box-shadow": $(this).siblings(".option-wrapper").hasClass("active")
                ? "0px 3px 3px 0px #c4c4c46c"
                : "",
        });
    $(this).find("i").toggleClass("active");
    $(this).toggleClass("active");
});

// dropdown category
$(
    "#categoryFull, #category, #category-book, #category-article, #duration-time, #library-destination"
).click(function () {
    $(this)
        .siblings(".option-wrapper")
        .toggleClass("active")
        .css({
            height: $(this).siblings(".option-wrapper").hasClass("active")
                ? 44 * 4 + "px"
                : "",
            "border-color": $(this)
                .siblings(".option-wrapper")
                .hasClass("active")
                ? "gray"
                : "",
            "box-shadow": $(this).siblings(".option-wrapper").hasClass("active")
                ? "0px 3px 3px 0px #c4c4c46c"
                : "",
            "z-index": $(this).siblings(".option-wrapper").hasClass("active")
                ? 1
                : 1,
        });
    $(this).find("i").toggleClass("active");
    $(this).toggleClass("active");
});

// dropdown sort
$("#sort").click(function () {
    $(this)
        .siblings(".option-wrapper")
        .toggleClass("active")
        .css({
            height: $(this).siblings(".option-wrapper").hasClass("active")
                ? 44 * 3 + "px"
                : "",
            "border-color": $(this)
                .siblings(".option-wrapper")
                .hasClass("active")
                ? "gray"
                : "",
            "box-shadow": $(this).siblings(".option-wrapper").hasClass("active")
                ? "0px 3px 3px 0px #c4c4c46c"
                : "",
        });
    $(this).find("i").toggleClass("active");
    $(this).toggleClass("active");
});

// open article
$(".list-product.list-journal").click(function () {
    $(this).toggleClass("active");
});

// set ukuran myform yang ada di account wrapper agar sama lebarnya
$("#account-wrapper .myForm:last-child").css(
    "min-width",
    $("#account-wrapper .myForm:first-child").width()
);

//sett ukuran tinggi upload container agar sama dengan account form wrapper
$(".upload-container").css("min-height", $(".account-form-wrapper").height());

// memperpendek nama file upload
$("#bookUpload").on("change", function () {
    var fileName = $(this).prop("files")[0].name;

    if (fileName.length > 30) {
        var start = Math.floor((30 - 5) / 2);
        var end = start + 3;
        fileName =
            fileName.substring(0, start) +
            " ... " +
            fileName.substring(fileName.length - end);
    }

    $("#fileName-book").text(fileName);
});

$("#bookUpload-img").on("change", function () {
    var fileName = $(this).prop("files")[0].name;

    if (fileName.length > 30) {
        var start = Math.floor((30 - 5) / 2);
        var end = start + 3;
        fileName =
            fileName.substring(0, start) +
            " ... " +
            fileName.substring(fileName.length - end);
    }

    $("#fileName-book-img").text(fileName);
});

$("#articleUpload").on("change", function () {
    var fileName = $(this).prop("files")[0].name;

    if (fileName.length > 30) {
        var start = Math.floor((30 - 5) / 2);
        var end = start + 3;
        fileName =
            fileName.substring(0, start) +
            " ... " +
            fileName.substring(fileName.length - end);
    }

    $("#fileName-article").text(fileName);
});

// mengaktifkan form upload
$(".upload-btn-wrapper button:eq(0)").click(function () {
    $("#uploadBookForm").addClass("active");
    $(".upload-btn-wrapper button:eq(0)").addClass("active");
    $("#uploadArticleForm").removeClass("active");
    $(".upload-btn-wrapper button:eq(1)").removeClass("active");
});

$(".upload-btn-wrapper button:eq(1)").click(function () {
    $("#uploadArticleForm").addClass("active");
    $(".upload-btn-wrapper button:eq(1)").addClass("active");
    $("#uploadBookForm").removeClass("active");
    $(".upload-btn-wrapper button:eq(0)").removeClass("active");
});

// dropdown button pada form memindahkan text yang ada pada span kedalam input value
$("#book-option .option").click(function () {
    $("#category-book span").text($(this).text());
    $("#cate-value-book").val($("#category-book span").text());
});

$("#article-option .option").click(function () {
    $("#category-article span").text($(this).text());
    $("#cate-value-article").val($("#category-article span").text());
});

$("#duration-option .option").click(function () {
    $("#duration-time span").text($(this).text());
    $("#duration-value").val($("#duration-time span").text());
});

$("#library-option .option").click(function () {
    $("#library-destination span").text($(this).text());
    $("#library-value").val($("#library-destination span").text());
});

//memindahkan value kedalam input hidden pada searchBar
$("#type-option .option").click(function () {
    var optionValue = $(this).text();
    $("#type-value").val(optionValue);
});

$("#category-option .option").click(function () {
    var optionValue = $(this).text();
    $("#category-value").val(optionValue);
});

$("#sort-option .option").click(function () {
    var optionValue = $(this).text();
    $("#sort-value").val(optionValue);
});

// function untuk tutup dropdown
function closeDropdown() {
    $(".option-wrapper").removeClass("active").css({
        height: "",
        "border-color": "",
        "box-shadow": "",
    });

    $(".dropdown").find("i").removeClass("active");
    $(".dropdown").removeClass("active");
    $(".input-wrapper").removeClass("active");
}

// reset isi dari dropdown
function resetDropdown() {
    $("#library-destination span").text("Choose Library");
    $("#duration-time span").text("Reservation Duration");
}

// function menampilkan modal
function showModal(id) {
    $("#" + id).css("display", "block");
    $(".bg-dark-modal").css("display", "block");
}

// function clear form yang ada di modal
function clearModalFormFields() {
    $(".modalForm :input").val("");
}

// function menutup modal
function closeModal(id) {
    $("#" + id).css("display", "none");
    $(".bg-dark-modal").css("display", "none");
    clearModalFormFields();
    resetDropdown();
    closeDropdown();
}

// isi role kedalam sign up
$("#teacher").click(function () {
    $("#role-value").val("teacher");
});

$("#student").click(function () {
    $("#role-value").val("student");
});

// menyimpan tieout
var msgTimeout;

// function menampilkan msg
function showMsg(id) {
    $("#" + id).addClass("active");
    animateMsg(id);
    msgTimeout = setTimeout(function () {
        $("#" + id).removeClass("active");
        $("#" + id + " .duration").css("left", "0");
    }, 5000);
}

// function menutup msg
function closeMsg(id) {
    clearTimeout(msgTimeout);
    $("#" + id).removeClass("active");
    $("#" + id + " .duration")
        .stop()
        .delay(300)
        .queue(function (next) {
            $(this).css("left", "0");
            next();
        });
}

// animasi di msgBox
function animateMsg(id) {
    $("#" + id + " .duration").animate({ left: "-100%" }, 5300, function () {
        $("#" + id + " .duration").css("left", "0");
        if ($("#" + id).hasClass("active")) {
            animateMsg(id);
        }
    });
}

// show message failed
showMsg("failed");
// show message warning
showMsg("warning");
// show message sukses
showMsg("sukses");

// Mendapatkan tanggal hari ini
var today = new Date().toISOString().split("T")[0];

// Mengatur atribut min pada elemen input tanggal
$("#start-reserve-time").attr("min", today);
