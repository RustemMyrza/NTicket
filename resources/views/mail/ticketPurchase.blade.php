<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спасибо за вашу покупку</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #4CAF50;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .content a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #e4e4e4;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NTicket</h1>
        </div>
        <div class="content">
            <h2>Спасибо за вашу покупку!</h2>
            <p>Уважаемый {{ $data['fullname'] }}</p>
            <p>Мы благодарим вас за покупку и рады сообщить вам, что ваш билет успешно оформлен. Ваши данные билета:</p>
            @foreach($data['routes'] as $item)
                <br>
                <ul>
                    <li><strong>Маршрут:</strong> {{ $item->from_place }} - {{ $item->to_place }}</li>
                    <li><strong>Время:</strong> {{ $item->departure_time }} - {{ $item->arrival_time }}</li>
                    <li><strong>Цена:</strong> {{ $item->price }}</li>
                    <li><strong>Организация:</strong> {{ $item->getOrganization->name }}</li>
                    <li>
                        <strong>Тип транспорта:</strong> 
                        @if($item->getOrganization->transport_type == 1)
                            Самолет
                        @endif
                        @if($item->getOrganization->transport_type == 2)
                            Автобус
                        @endif
                        @if($item->getOrganization->transport_type == 3)
                            Поезд
                        @endif
                    </li>
                </ul>
                <a href="#" style="text-align: center;">Билет</a>
                <br>
                <hr>
                <br>
            @endforeach
            <p>Мы с нетерпением ждем вашего путешествия с нами!</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 NTicket. Все права защищены.</p>
        </div>
    </div>
</body>
</html>
