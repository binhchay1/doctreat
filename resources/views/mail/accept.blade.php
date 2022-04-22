<!DOCTYPE html>
<html>
<head>
    <title>Diamond Pet.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <p>Cám ơn đã sử dụng dịch vụ của chúng tôi. Lịch hẹn của bạn đã được bác sĩ đồng ý. Vui lòng để ý lịch hẹn và tên bác sĩ bạn đã đăng ký</p><br><br>
    <p>Thông tin lịch hẹn</p><br>
    <p>- Thời gian : {{ $mailData['hours'] }} ngày {{ $mailData['date'] }}</p><br>
    <p>- Địa điểm : Diamond Pet, Hòa Lạc Campus, Sơn Tây, Hà Nội</p><br>
    <p>- Bác sĩ : {{ $mailData['doctor'] }}</p><br>
    <p>Cám ơn!</p>
</body>
</html>