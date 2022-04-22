<!DOCTYPE html>
<html>
<head>
    <title>Diamond Pet.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>Cám ơn quý khách đã tin dùng và mua sản phẩm của Diamond Pet. Bạn có thể kiểm tra lại hóa đơn qua đường dẫn bên dưới đây : </p>
    
    <a href="{{ $mailData['url'] }}"></a>

    <p>Cám ơn!</p>
</body>
</html>