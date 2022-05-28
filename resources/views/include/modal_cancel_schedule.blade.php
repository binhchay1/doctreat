<div id="cancel-schedule" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-cancel" method="POST" action="{{ route('admin.cancel.schedule') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="date_cancel">Ngày báo bận :</label>
                        <input type="date" id="date_cancel" name="date_cancel" class="form-control" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_cancel">Giờ báo bận :</label>
                        <select class="form-control" id="timer_cancel" name="timer_cancel" required>
                            @foreach($allTimers as $hour)
                                <option value="{{ $hour['timer']->format('H:i') }}">{{ $hour['timer']->format('H:i')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lý do</label>
                        <textarea class="form-control" style="resize: none; border-color: #ced4da !important;" name="reason" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="ok" type="button" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>