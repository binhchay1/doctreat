var Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var currentTicket = 1;
$('#total-ticket').val(currentTicket);
var urlPrintView = '/admin/print-preview';
var parametersService = [];
var currentUrlWithUser = '';
(function ($, window, document) {
    'use strict';

    let status = $('#check_change_password').is(":checked");
    if (status) {
        $('.change_password').css('display', '');
    } else {
        $(".change_password").css('display', 'none');
    }

    $('#check_change_password').click(function () {
        let status = $(this).is(":checked");
        if (status) {
            $('.change_password').css('display', '');
        } else {
            $('.change_password').css('display', 'none');
        }
    });

    let option = '<option value="day" disabled>ngày</option>';
    let selectedDay = "day";
    for (let i = 1; i <= Days[0]; i++) {
        option += '<option value="' + i + '">' + i + '</option>';
    }
    $('#day').append(option);
    $('#day').val(selectedDay);

    let optionMonth = '<option value="month" disabled>tháng</option>';
    let selectedMon = "month";
    for (let i = 1; i <= 12; i++) {
        optionMonth = optionMonth + '<option value="' + i + '">' + i + '</option>';
    }
    $('#month').append(optionMonth);
    $('#month').val(selectedMon);

    let dn = new Date();
    let optionDay = '<option value="year" disabled>năm</option>';
    let selectedYear = "year";
    for (let i = 1930; i <= dn.getFullYear(); i++) {
        optionDay = optionDay + '<option value="' + i + '">' + i + '</option>';
    }
    $('#year').append(optionDay);
    $('#year').val(selectedYear);

    $('#add-ticket-storage').on('click', function () {
        let clone = $('#clone-add-storage').clone();
        let id = 'ticket-add-storage-' + currentTicket;
        $(clone).attr('id', id);
        $(clone).addClass('mt-4');
        clone.appendTo('#area-add-storage-second');
        currentTicket++;
        $('#total-ticket').val(currentTicket);
        $('#delete-ticket-storage').removeClass('d-none');
    });

    $('#delete-ticket-storage').on('click', function () {
        currentTicket--;
        $('#total-ticket').val(currentTicket);
        let list = document.getElementById("area-add-storage-second");
        if ($('#area-add-storage-second').children().length > 0) {
            list.removeChild(list.children[0]);
            if ($('#area-add-storage-second').children().length == 0) {
                $('#delete-ticket-storage').addClass('d-none');
            }
        }
    });

    $('#select-role-create-users').on('change', function () {
        let option = this.value;
        if (option == 3 || option == 2) {
            $('#address-selection').removeClass('d-none');
            $('#cmt-selection').removeClass('d-none');
        } else {
            let elementCMT = document.querySelector('#cmt-selection');
            let elementAddress = document.querySelector('#address-selection');
            let hasCMT = elementCMT.classList.contains('d-none');
            let hasAddress = elementAddress.classList.contains('d-none');
            if (hasCMT == false) {
                $('#cmt-selection').addClass('d-none');
            }
            if (hasAddress == false) {
                $('#address-selection').addClass('d-none');
            }
        }
    });

    if (typeof products !== 'undefined') {
        let choice = $('#select-product-export').val();
        $.each(products.data, function (index, value) {
            if (value.id == choice) {
                $('#quantity-product-export').attr('max', value.quantity.quantity);
                if (value.quantity.quantity == 0) {
                    $('#quantity-product-export').attr('disabled', true);
                    $('#create-export-storage').attr('disabled', true);
                }
                $('#stock-product').text(value.quantity.quantity);
            }
        });
    }

    $('#select-product-export').on('change', function () {
        if (typeof products !== 'undefined') {
            let choice = $('#select-product-export').val();

            $.each(products.data, function (index, value) {
                if (value.id == choice) {
                    $('#quantity-product-export').attr('max', value.quantity.quantity);
                    if (value.quantity.quantity == 0) {
                        $('#quantity-product-export').attr('disabled', true);
                        $('#create-export-storage').attr('disabled', true);
                    }
                    $('#stock-product').text(value.quantity.quantity);
                }
            });
        }
    });

    $('#orderModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let payment_code = button.data('code');
        let url = '/admin/get-detail-order';
        let modal = $(this);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            data: {
                payment_code: payment_code
            }
        }).done(function (result) {
            result = JSON.parse(result);
            modal.find('.modal-body #name-customer-detail-order').val(result['name_customer']);
            modal.find('.modal-body #phone-customer-detail-order').val(result['phone_customer']);
            modal.find('.modal-body #address-customer-detail-order').val(result['address_customer']);
            modal.find('.modal-body #total-detail-order').text(result['total']);

            for (let i = 0; i < result['order'].length; i++) {
                let content = "<tr><td>" + (i + 1) + "</td><td><img src='" + result['order'][i].image + "' class='rounded' width='150' height='100'></td><td>" + result['order'][i].name + "</td><td>" + result['order'][i].quantity + "</td><td>" + result['order'][i].price + "</td></tr>";
                modal.find('.modal-body #order-detail-table tbody').append(content);
            }
        });
    })

    $('#orderModal').on('show.bs.modal', function () {
        let modal = $(this);
        modal.find('.modal-body #name-customer-detail-order').val();
        modal.find('.modal-body #phone-customer-detail-order').val();
        modal.find('.modal-body #address-customer-detail-order').val();
        modal.find('.modal-body #total-detail-order').val();
        modal.find('.modal-body #order-detail-table tbody').empty();
    });

    if (typeof schedules !== 'undefined') {
        let choice = $('#schedule-select').val();

        $.each(schedules, function (index, value) {
            if (value.id == choice) {
                $('#name-customer-doctor-view').text(value.user.name);
                $('#phone-customer-doctor-view').text(value.user.phone);
                $('#address-customer-doctor-view').text(value.user.address);
                $('#note-doctor-view').text(value.note);
                let url = urlPrintView + '?user_id=' + value.user.id;
                currentUrlWithUser = url;
                $('#iframe-doctor-view').attr('src', url);
            }
        });
    }

    $('#schedule-select').on('focusout', function (e) {
        let choice = $('#schedule-select').val();

        $.each(schedules, function (index, value) {
            if (value.id == choice) {
                $('#name-customer-doctor-view').text(value.user.name);
                $('#phone-customer-doctor-view').text(value.user.phone);
                $('#address-customer-doctor-view').text(value.user.address);
                $('#note-doctor-view').text(value.note);
                let url = urlPrintView + '?user_id=' + value.user.id;
                currentUrlWithUser = url;
                $('#iframe-doctor-view').attr('src', url);
            }
        });
    });

    $('#print-page').click(function () {
        let url = '/admin/store-invoice-doctor';
        let services = parametersService;
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            data: {
                services: services,
            }
        }).done(function (result) {
            if (result == 'empty') {
                swal.fire({
                    text: "Vui lòng chọn dịch vụ!",
                    type: "error"
                }).then(function () {
                });
            } else {
                let newWin = window.frames["iframe-doctor-view-hidden"];
                newWin.document.write("<iframe src='" + $('#iframe-doctor-view').attr('src') + "' width='100%' height='600' onload='window.print()'></iframe>");
                newWin.document.close();
            }
        });

        return false;
    });

    if (typeof statusDate !== 'undefined') {
        if (statusDate == 1) {
            let tomorrow = moment().add(1, 'days');
            $('#date_cancel').attr('min', tomorrow.format('YYYY-MM-DD'));
            $('#date_cancel').attr('value', tomorrow.format('YYYY-MM-DD'));
        }
    }

    if (typeof allTimers !== 'undefined') {
        for (var i of allTimers) {
            if (i.status == 1) {
                let element = $('#timer_cancel option[value="' + i.hours + '"]');
                element.attr("disabled", 'disabled');
                element.attr("class", 'bg-dark');

            }
        }
    }

    $('#date_cancel').change(function () {
        let date = $('#date_cancel').val();
        let url = '/admin/schedule/cancel-schedule-change';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            data: {
                date: date,
            }
        }).done(function (result) {
            let data = JSON.parse(result);
            $('#timer_cancel').empty();
            for (var i of data) {
                let content = "<option value='" + i.hours + "'>" + i.hours + "</option>";
                $('#timer_cancel').append(content);
                if (i.status == 1) {
                    let element = $('#timer_cancel option[value="' + i.hours + '"]');
                    element.attr("disabled", 'disabled');
                    element.attr("class", 'bg-dark');
                }
            }
        });
    });

})(jQuery, window, document);

function previewFile(input) {
    const file = $("input[type=file]").get(0).files[0];
    const extension = $(input).val().split('.').pop().toLowerCase();
    var validFileExtensions = ['jpeg', 'jpg', 'png', 'bmp'];
    if ($.inArray(extension, validFileExtensions) == -1) {
        $('#spnMessage').text("JPG, JPEG, PNG, BMP file only!").show();
        $(input).replaceWith($(input).val('').clone(true));
        return;
    }

    if (file.size > 3072000) {
        $('#spnMessage').text("Please choose an image less than 3MB!").show();
        $(input).replaceWith($(input).val('').clone(true));
        return;
    }
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}

function isLeapYear(year) {
    year = parseInt(year);
    if (year % 4 != 0) {
        return false;
    } else if (year % 400 == 0) {
        return true;
    } else if (year % 100 == 0) {
        return false;
    } else {
        return true;
    }
}

function change_year(select) {
    if (isLeapYear($(select).val())) {
        Days[1] = 29;

    }
    else {
        Days[1] = 28;
    }
    if ($("#month").val() == 2) {
        let day = $('#day');
        let val = $(day).val();
        let getTime = new Date();
        let current_year = getTime.getFullYear();
        let current_day = getTime.getDate();
        let e = document.getElementById("year");
        let year_get = e.value;
        $(day).empty();
        let option = '<option value="day" disabled>ngày</option>';
        for (let i = 1; i <= Days[1]; i++) {
            if (year_get == current_year) {
                changeCurrentMonth();
                if (i <= current_day) {
                    option += '<option value="' + i + '">' + i + '</option>';
                }
            } else {
                option += '<option value="' + i + '">' + i + '</option>';
            }
        }
        $(day).append(option);
        if (val > Days[month]) {
            val = 1;
        }
        $(day).val(val);
    } else {
        let day = $('#day');
        let val = $(day).val();
        let getTime = new Date();
        let current_year = getTime.getFullYear();
        let current_day = getTime.getDate();
        let e = document.getElementById("year");
        let year_get = e.value;
        $(day).empty();
        let option = '<option value="day" disabled>ngày</option>';
        for (let i = 1; i <= 31; i++) {
            if (year_get == current_year) {
                changeCurrentMonth();
                if (i <= current_day) {
                    option += '<option value="' + i + '">' + i + '</option>';
                }
            } else {
                option += '<option value="' + i + '">' + i + '</option>';
            }
        }
        $(day).append(option);
        if (val > Days[month]) {
            val = 1;
        }
        $(day).val(val);
    }
}

function change_month(select) {
    let day = $('#day');
    let val = $(day).val();
    $(day).empty();
    let option = '<option value="day">ngày</option>';
    let month = parseInt($(select).val()) - 1;
    for (let i = 1; i <= Days[month]; i++) {
        option += '<option value="' + i + '">' + i + '</option>';
    }
    $(day).append(option);
    if (val > Days[month]) {
        val = 1;
    }
    $(day).val(val);
}

function changeCurrentMonth() {
    let month = $('#month');
    let getTime = new Date();
    let current_month = getTime.getMonth() + 1;
    $(month).empty();
    let optionMonth = '<option value="month" disabled>tháng</option>';
    for (let i = 1; i <= 12; i++) {
        if (i <= current_month) {
            optionMonth = optionMonth + '<option value="' + i + '" >' + i + '</option>';
        }
    };
    $(month).append(optionMonth);
}

function handleChange(service_id, checkbox) {
    if (checkbox.checked == true) {
        parametersService.push(service_id);
        let url = currentUrlWithUser + '&service=' + parametersService;
        $('#iframe-doctor-view').attr('src', url);
    } else {
        parametersService = jQuery.grep(parametersService, function (value) {
            return value != service_id;
        });
        let url = currentUrlWithUser + '&service=' + parametersService;
        $('#iframe-doctor-view').attr('src', url);
    }
}

function setTimers() {

}

jQuery.validator.addMethod('greaterThan', function (value, element, params) {
    if (value && $(params).val()) {
        return new Date(value) >= new Date($(params).val());
    }
    return true;
}, '');

jQuery.validator.addMethod('smallerThan', function (value, element, params) {
    if (value && $(params).val()) {
        return new Date(value) <= new Date($(params).val());
    }
    return true;
}, '');


