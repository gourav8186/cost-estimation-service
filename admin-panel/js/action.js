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
                    insertBtn.html('<img src="../assets/image/icons/loading.jpg" style="width:20px;" class="downIcon"/>').prop("disabled", true);
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
                    insertBtn.html('<img src="../assets/image/icons/loading.jpg" style="width:20px;" class="downIcon"/>').prop("disabled", true);
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


submitForm('#loginForm', "./php_files/login_file.php", "Log In", location.href);
submitForm('#registerForm', "./php_files/signup-file.php", "Register", location.href);
submitForm('#sliderInsert', "./php_files/slider-file.php", "Add Slider", "view-slider");
submitForm('#companyform', "./php_files/mobile-company-file.php", "Add Mobile Company", "view-mobile-company");
submitForm('#modelform', "./php_files/model-file.php", "Add Model", "view-model");
submitForm('#seriesform', "./php_files/series-file.php", "Add Series", "view-series");
submitForm('#spFrom', "./php_files/sparepart-file.php", "Add Sparepart", "view-sparepart");
submitForm('#centerForm', "./php_files/service-center-file.php", "Add Center", "view-center");
submitForm('#accessoriesForm', "./php_files/accessories-file.php", "Add Accessories", "view-accessories");
submitForm('#chargeFrom', "./php_files/charges-file.php", "Add Charges", "view-charges");
submitForm('#passwordForm', "./php_files/change-password.php", "Change Password", location.href);


// Log out Functionality 

$("#logout").on('click', function () {
    Toastify({
        text: "You have been logged out successfully.",
        gravity: "bottom",
        backgroundColor: "linear-gradient(to left, #095779, #095779)",
        className: "animate__animated animate__slideInUp"
    }).showToast();
    $.ajax({
        url: './php_files/logout.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            window.setTimeout(function () { window.location.href = "http://localhost/development/cost_estimation_service/admin-panel/" }, 2000);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});


// Fetch Company Models in select box 
$(document).ready(function () {
    $('#companyData').on('change', function () {
        var mbcID = $(this).val();
        if (mbcID) {
            $.ajax({
                type: 'POST',
                url: './php_files/modelfetch-file.php',
                data: 'mbc_id=' + mbcID,
                success: function (html) {
                    Toastify({
                        text: "Select Your Model as your selected Company.",
                        gravity: "bottom",
                        backgroundColor: "linear-gradient(to left, #095779, #095779)",
                        className: "animate__animated animate__slideInUp"
                    }).showToast();
                    $('#selectModel').html(html);
                }
            });
        } else {
            $('#selectModel').html('<option value="">Select Model</option>');
        }
    });
});


// Fetch Model Series in select box 
$(document).ready(function () {
    $('#selectModel').on('change', function () {
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

// Function to handle delete button click
$(document).on('click', '.deleteBtn', function () {
    var eleId = $(this).data('element-id');
    var row = $(this).closest('tr');
    // Confirm delete action
    if (confirm("Are you sure you want to delete this slider ?")) {
        $.ajax({
            url: './php_files/delete-data.php',
            type: 'POST',
            data: { eleId: eleId },
            success: function (response) {
                Toastify({
                    text: "Deleted Successfully..",
                    gravity: "bottom",
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
                row.fadeOut(2000, function () {
                    $(this).remove();
                });
                window.setTimeout(function () { window.location.reload(true); }, 2000);
            },
            error: function (xhr, status, error) {
                Toastify({
                    text: "An error occurred. Please try again later.",
                    gravity: "bottom",
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
            }
        });
    }
});

function chkStatus(selectElement, eleMentID) {
    var status = selectElement.value;
    var data = {
        statusKey: eleMentID,
        status: status
    };

    $.ajax({
        type: 'POST',
        url: './php_files/status-update.php',
        data: data,
        success: function (response) {
            if (status == '1') {
                Toastify({
                    text: "Enabled",
                    gravity: "bottom",
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
                window.setTimeout(function () { window.location.reload(true); }, 2000);
            } else {
                Toastify({
                    text: "Disabled",
                    gravity: "bottom",
                    backgroundColor: "linear-gradient(to left, #095779, #095779)",
                    className: "animate__animated animate__slideInUp"
                }).showToast();
                window.setTimeout(function () { window.location.reload(true); }, 2000);
            }
        },
        error: function (xhr, status, error) {
            Toastify({
                text: "An error occurred. Please try again later.",
                duration: 2000,
                close: true,
                gravity: "bottom",
                position: "right",
                backgroundColor: "linear-gradient(to left, #095779, #095779)",
                className: "animate__animated animate__slideInUp"
            }).showToast();
        }
    });
}

function updateNotificationCount() {
    $.ajax({
        url: './php_files/notification-server.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            var totalNotifications = response.total;
            $('.countText').text(totalNotifications);

            $('.notificationList').empty();
            response.notifications.forEach(function (notification) {
                var aName = notification.aName;
                var aIssue = notification.aIssue;
                var aTime = notification.aTime;

                var notificationItem = `
                    <div class="notificationItem border-bottom py-2">
                        <div class="font15 aName">${aName}</div>
                        <div class="font14 mb-0 aIssue">${aIssue}</div>
                        <div class="font12 pt-3 aTime">${aTime}</div>
                    </div>`;

                $('.notificationList').append(notificationItem);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error checking notifications:', error);
        }
    });
}

updateNotificationCount();
setInterval(updateNotificationCount, 5000);

$(document).ready(function () {
    $("#selectDelete").click(function () {
        var formData = $("#tableDataList").serialize();
        var selectedRows = $("#tableDataList input:checked").closest('tr');
        if (confirm("Are you sure you want to delete this slider ?")) {
            $.ajax({
                type: "POST",
                url: "./php_files/multi-delete.php",
                data: formData,
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
                        selectedRows.fadeOut(2000, function () {
                            $(this).remove();
                        });
                        window.setTimeout(function () { window.location.reload(true); }, 2000);
                    } else {
                        Toastify({
                            text: message,
                            gravity: "bottom",
                            backgroundColor: "linear-gradient(to left, #095779, #095779)",
                            className: "animate__animated animate__slideInUp"
                        }).showToast();
                    }
                }
            });
        }
    });
});