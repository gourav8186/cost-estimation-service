// Side bar Toggle 
$(function () {
    $("#hamBurger").click(function () {
        $('.sideHam').toggleClass('navShow');
        $('.sideBg').toggleClass('sidebgShow');
    })
    $("#bgParent").click(function () {
        $('.sideHam').removeClass('navShow');
        $('.sideBg').removeClass('sidebgShow');
    })
    $(".sideHam").click(function (e) {
        e.stopPropagation();
    })
});

// Search bar Toggle 
$(function () {
    $("#search").click(function () {
        $('.searchBar').addClass('searchShow');
    })
    $("#closeIcon").click(function () {
        $('.searchBar').removeClass('searchShow');
        $('#myform').trigger('reset');
    })

    $(".searchBar").click(function (e) {
        e.stopPropagation();
    })
});

$(document).ready(function () {
    var owl = $('.offerSlider');
    owl.owlCarousel({
        margin: 0,
        items: 2,
        autoplay: true,
        autoplayTimeout: 4000,
        loop: true,
        nav: false,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    });
});

$(document).ready(function () {
    var owl = $('.testimonial');
    owl.owlCarousel({
        margin: 0,
        items: 2,
        autoplay: true,
        autoplayTimeout: 2000,
        loop: true,
        nav: false,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    });
});

$(function () {
    $(".textBar").click(function () {
        $('.modelDropdown').toggleClass('extendD');
        $('.modelContent').toggleClass('showContent');
        $('.arrIcon').toggleClass('rotateX');
    })

    $(".modelDropdown").click(function (e) {
        e.stopPropagation();
    })
});

$(document).ready(function () {
    var productNameDiv = $('.nameText');
    var maxLength = 30;
    productNameDiv.each(function () {
        var productName = $(this).text();
        if (productName.length > maxLength) {
            $(this).text(productName.slice(0, maxLength) + '...');
        }
    });
});

$(document).on('click', '#filBtn', function () {
    $('.filterPart').slideToggle()
});

// Pop-Up 
$(function () {
    $("#popup").click(function () {
        $('.bgDarkside').addClass('bgShow');
    })
    $(".bgDarkside").click(function () {
        $('.bgDarkside').removeClass('bgShow');
    })
    $(".closeI").click(function () {
        $('.bgDarkside').removeClass('bgShow');
    })
    $(".mainBox").click(function (e) {
        e.stopPropagation();
    })
});

// Name First Letter Split 
var profileName = $('#fullNameDiv').text().trim();
var initials = profileName.split(' ').map(word => word.charAt(0)).join('');
$('.profileText').text(initials);

// Fetch Model Series in select box 
$('#sModel').on('change', function () {
    var sID = $(this).val();
    if (sID) {
        $.ajax({
            type: 'POST',
            url: './php_files/seriesfetch-file.php',
            data: 's_id=' + sID,
            success: function (html) {
                Toastify({
                    text: "Select Your Series as your selected Model.",
                    gravity: "bottom",
                    duration: 2000,
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
                $('#sp_series').html(html);

            }
        });
    } else {
        $('#sp_series').html('<option value="">Select Series</option>');
    }
});

$('#sp_series').on('change', function () {
    var seriesID = $(this).val();
    $.ajax({
        type: 'POST',
        url: './php_files/fetch-spareparts.php',
        data: 'series_id=' + seriesID,
        success: function (html) {
            $('#listItems').html('<div class="loadingBox d-flex justify-content-center align-items-center"><span class="loader"></span></div>');
            window.setTimeout(function () {
                $('#listItems').html(html);
            }, 2000);
        }
    });
});

// Fetch all Cities in select box 
$(document).ready(function () {
    $('#selectState').on('change', function () {
        var cityID = $(this).val();
        if (cityID) {
            $.ajax({
                type: 'POST',
                url: './php_files/cities-file.php',
                data: 'city_id=' + cityID,
                success: function (html) {
                    Toastify({
                        text: "All Cities are listed as your selected state.",
                        gravity: "bottom",
                        backgroundColor: "linear-gradient(to left, #095779, #095779)",
                        className: "animate__animated animate__slideInUp"
                    }).showToast();
                    $('#cities').html(html);
                }
            });
        } else {
            $('#sp_series').html('<option value="">Select City</option>');
        }
    });
});

$('#centerForm').on('submit', function (e) {
    e.preventDefault();
    var mCompany = $('#mCompany').val();
    var selectState = $('#selectState').val();
    var centerID = $('#cities').val();
    if (centerID == '' || mCompany == '' || selectState == '') {
        Toastify({
            text: "Please Select Your Company , State , City",
            gravity: "bottom",
            backgroundColor: "linear-gradient(to left, #095779, #095779)",
            className: "animate__animated animate__slideInUp"
        }).showToast();
    }
    $('#serviceCenters').html('<div class="loadingBox d-flex justify-content-center align-items-center"><span class="loader"></span></div>');
    $.ajax({
        type: 'POST',
        url: './php_files/find-center.php',
        data: 'cities=' + centerID,
        success: function (html) {
            window.setTimeout(function () {
                $('#serviceCenters').html(html);
            }, 2000);
        }
    });
});

$("#serach").on("input", function () {
    var srch_term = $(this).val();
    if (srch_term === '') {
        $('.searchContent').empty();
    } else {
        $('.searchContent').html('<div class="loadingBox d-flex justify-content-center align-items-center"><span class="loader"></span></div>');
        $.ajax({
            type: 'POST',
            url: './php_files/search-data.php',
            data: { search: srch_term },
            success: function (html) {
                window.setTimeout(function () {
                    $('.searchContent').html(html);
                }, 1000);
            }
        });
    }
});

function submitForm(formId, phpFile, buttonText, redirectUrl) {
    $(formId).on('submit', function (e) {
        e.preventDefault();
        var insertBtn = $(".insertBtn");
        $.ajax({
            url: phpFile,
            type: "post",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                var response = JSON.parse(res);
                var message = response.message;
                if (response.status === "success") {
                    Toastify({
                        text: message,
                        gravity: "bottom",
                        backgroundColor: "linear-gradient(to left, #095779, #095779)",
                        className: "animate__animated animate__slideInUp"
                    }).showToast();
                    insertBtn.html('<img src="assets/image/icons/loading.jpg" style="width:20px;" class="downIcon"/>').prop("disabled", true);
                    setTimeout(function () {
                        insertBtn.html(buttonText).prop("disabled", false);
                    }, 2000);
                    setTimeout(function () {
                        window.location.href = redirectUrl;
                    }, 2000);
                } else {
                    Toastify({
                        text: message,
                        gravity: "bottom",
                        backgroundColor: "linear-gradient(to left, #095779, #095779)",
                        className: "animate__animated animate__slideInUp"
                    }).showToast();
                    insertBtn.html('<img src="assets/image/icons/loading.jpg" style="width:20px;" class="downIcon"/>').prop("disabled", true);
                    setTimeout(function () {
                        insertBtn.html(buttonText).prop("disabled", false);
                    }, 2000);
                }
            },
            error: function (xhr, status, error) {
                Toastify({
                    text: "An error occurred. Please try again later.",
                    gravity: "bottom",
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
            },
        });
    });
}

submitForm('#assistance', "./php_files/assistant-file.php", "Submit", location.href);
submitForm('#feedbackForm', "./php_files/feedback-file.php", "Submit", location.href);

$(document).ready(function () {
    $("#estimate").on('submit', function (e) {
        e.preventDefault();
        var selectedRows = $("#tableDataList input:checked").serialize();
        $.ajax({
            type: "POST",
            url: "./php_files/get-estimate.php",
            data: selectedRows,
            success: function (res) {
                var response = JSON.parse(res);
                var company = response.spareParts[0].mbc_name;
                var model = response.spareParts[0].m_model;
                var series = response.spareParts[0].s_seriesname;
                var totalPrice = response.totalPrice;
                var charges = response.charges;
                var repairCost = response.repairCost;
                $(".company").text(company);
                $(".model").text(model);
                $(".series").text(series);
                $(".totalPrice").text(totalPrice);
                $(".charges").text(charges);
                $(".repairCost").text(repairCost);
            }
        });
    });
});

$(document).on('change', 'input[type="checkbox"]', function () {
    var selectedRows = $("#estimate").serializeArray();
    $.ajax({
        type: 'POST',
        url: './php_files/get-estimate.php',
        data: selectedRows,
        success: function (html) {
            $('#estimateCal').html('<div class="loadingBox d-flex justify-content-center align-items-center"><span class="loader"></span></div>');
            window.setTimeout(function () {
                $('#estimateCal').html(html);
            }, 1000);
        }
    });
});
$(document).ready(function () {
    $(document).on('click', '#feedback', function () {
        $('.bgDarksidefeed').addClass('bgShow');
    });
    $(document).on('click', '.bgDarksidefeed', function () {
        $('.bgDarksidefeed').removeClass('bgShow');
    });
    $(document).on('click', '.closeI', function () {
        $('.bgDarksidefeed').removeClass('bgShow');
    });
    $(document).on('click', '.mainBoxfeed', function (e) {
        e.stopPropagation();
    });
});
