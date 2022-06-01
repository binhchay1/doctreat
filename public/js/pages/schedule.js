function changeTime() {
    let date = document.getElementById('date').value;
    let doctor_id = document.getElementById('doctor_id').value;
    let url = '/schedule?date=' + date + '&doctor_id=' + doctor_id;

    window.location.href = url;
}