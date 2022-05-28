(function ($, window, document) {
    'use strict';

    globalThis.diamondPetAMIN = {
        deleteUser: function (el) {
            let name = el.attr('data-name');
            let id = el.attr('data-id');
            $('#delete-user .modal-title').text('Xóa tài khoản : ' + name);
            $('#delete-user .modal-body p').text('Bạn chắc chắn muốn xóa :  ' + name);
            $('#delete-user .modal-footer #ok').off("click").text('Xóa');
            $("#delete-user").modal("show");
            $('#delete-user .modal-footer #ok').click({ id: id, el: el }, function (e) {
                let url = "/admin/users/delete/" + parseInt(e.data.id);
                window.location.href = url;
            })
        },
        editStatus: function (el) {
            let id = el.attr('data-id');
            let product_id = el.attr('data-product_id');
            let quantity = el.attr('data-quantity');
            $('#edit-status .modal-title').text('Phê duyệt phiếu');
            $('#edit-status .modal-body p').text('Chọn trạng thái : ');
            $('#edit-status .modal-footer #ok').off("click").text('Đồng ý');
            $("#edit-status").modal("show");
            $('#edit-status .modal-footer #ok').click({ id: id, el: el }, function (e) {
                let status = $('#edit-status .modal-body select').val();
                let url = "/admin/storage/edit/status?id=" + parseInt(e.data.id) + '&status=' + parseInt(status) + '&product_id=' + product_id + '&quantity=' + quantity;
                window.location.href = url;
            })
        },
        statusOrder: function (el) {
            let id = el.attr('data-id');
            $('#edit-status-order .modal-title').text('Phê duyệt đơn hàng');
            $('#edit-status-order .modal-body p').text('Chọn trạng thái : ');
            $('#edit-status-order .modal-footer #ok').off("click").text('Đồng ý');
            $("#edit-status-order").modal("show");
            $('#edit-status-order .modal-footer #ok').click({ id: id, el: el }, function (e) {
                let status = $('#edit-status-order .modal-body select').val();
                let url = "/admin/order/edit/status?id=" + parseInt(e.data.id) + '&status=' + status;
                window.location.href = url;
            })
        },
        deleteProduct: function (el) {
            let name = el.attr('data-name');
            let id = el.attr('data-id');
            $('#delete-user .modal-title').text('Xóa sản phẩm : ' + name);
            $('#delete-user .modal-body p').text('Bạn chắc chắn muốn xóa :  ' + name);
            $('#delete-user .modal-footer #ok').off("click").text('Xóa');
            $("#delete-user").modal("show");
            $('#delete-user .modal-footer #ok').click({ id: id, el: el }, function (e) {
                let url = "/admin/product/delete/" + parseInt(e.data.id);
                window.location.href = url;
            })
        },
        cancelSchedule: function () {
            $('#cancel-schedule .modal-title').text('Báo bận');
            $("#cancel-schedule").modal("show");
            $('#cancel-schedule .modal-footer #ok').click(function () {
                $('form#form-cancel').submit();
            })
        },
    }

    $('#user-table-list .delete_user').click(function () {
        return globalThis.diamondPetAMIN.deleteUser($(this));
    });
    
    $('#history-table-list .edit_status').click(function () {
        return globalThis.diamondPetAMIN.editStatus($(this));
    });

    $('#order-table-list .edit_status_order').click(function () {
        return globalThis.diamondPetAMIN.statusOrder($(this));
    });

    $('#product-table-list .delete_user').click(function () {
        return globalThis.diamondPetAMIN.deleteProduct($(this));
    });

    $('.cancel_schedule').click(function () {
        return globalThis.diamondPetAMIN.cancelSchedule($(this));
    });

})(jQuery, window, document);

