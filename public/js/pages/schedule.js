function changeDate() {
    let date = document.getElementById('date').value;
    let url = '/schedule?date=' + date;
  
    window.location.href = url;
}