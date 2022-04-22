<div id="orderModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" cellspacing="0" id="order-detail-table">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Số lượng</th>
                            <th>Gía</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="d-flex flex-row-reverse">
                <span class="ml-2" id="total-detail-order"></span> Total:
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">Tên khác hàng</label>
                        <input type="text" name="name" class="form-control" id="name-customer-detail-order" disabled>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="phone-customer-detail-order" disabled>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Địa chỉ nhận hàng</label>
                        <input type="text" name="address" class="form-control" id="address-customer-detail-order" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>