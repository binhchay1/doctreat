$(function () {
    function ini_events(ele) {
        ele.each(function () {
            var eventObject = {
                title: $.trim($(this).text())
            }
            $(this).data('eventObject', eventObject)
            $(this).draggable({
                zIndex: 1070,
                revert: true,
                revertDuration: 0
            })

        })
    }

    ini_events($('#external-events div.external-event'))

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    for (let i = 0; i < schedule.length; i++) {
        schedule[i].start = new Date(
            schedule[i].start['year'],
            schedule[i].start['month'],
            schedule[i].start['day'],
            schedule[i].start['hours'],
            schedule[i].start['minutes']);
    }

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        events: schedule,
        editable: true,
        droppable: true,
        eventClick: function (info) {
            let url = '/admin/get-info-schedule';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                data: {
                    id: info.event.id,
                    status: info.event.backgroundColor
                }
            }).done(function (result) {
                result = JSON.parse(result);
                if (result.typeStatus == 'busy') {
                    let date = $('#info-cancel-schedule #date');
                    let hours = $('#info-cancel-schedule #hours');
                    let note = $('#info-cancel-schedule #note');
                    let status = $('#info-cancel-schedule #status');
                    date.val(result.date);
                    hours.val(result.hours);
                    note.val(result.note);
                    status.val('Đã báo bận');

                    $('#info-cancel-schedule').modal('show');
                } else {
                    let name = $('#info-schedule #name');
                    let date = $('#info-schedule #date');
                    let hours = $('#info-schedule #hours');
                    let note = $('#info-schedule #note');
                    let status = $('#info-schedule #status');
                    name.val(result.name);
                    date.val(result.date);
                    hours.val(result.hours);
                    note.val(result.reason);

                    if (result.status == 1) {
                        status.val('Đã đồng ý');
                    } else if (result.status == 2) {
                        status.val('Đã hủy');
                    } else {
                        status.val('Đang chờ xét duỵêt');
                    }

                    if (result.status != null) {
                        $('#info-schedule .modal-footer').addClass('d-none');
                        $('#info-schedule select').addClass('d-none');
                    } else {
                        let elementA = document.querySelector('#info-schedule .modal-footer');
                        let elementB = document.querySelector('#info-schedule select');
                        let hasA = elementA.classList.contains('d-none');
                        let hasB = elementB.classList.contains('d-none');
                        if (hasA) {
                            $('#cmt-selection').removeClass('d-none');
                        }

                        if (hasB) {
                            $('#cmt-selection').removeClass('d-none');
                        }
                    }

                    $('#info-schedule').modal('show');
                    $('#info-schedule .modal-footer #ok').click(function () {
                        let status = $('#info-schedule .modal-body select').val();
                        let url = "/admin/schedule/edit/status?id=" + parseInt(info.event.id) + '&status=' + parseInt(status);
                        window.location.href = url;
                    })
                }
            });
        }
    });

    calendar.render();

    var currColor = '#3c8dbc'
    $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        currColor = $(this).css('color')
        $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    });
    $('#add-new-event').click(function (e) {
        e.preventDefault()
        var val = $('#new-event').val()
        if (val.length == 0) {
            return;
        }

        var event = $('<div />');
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event');
        event.text(val);
        $('#external-events').prepend(event);
        ini_events(event);
        $('#new-event').val('');
    });
})