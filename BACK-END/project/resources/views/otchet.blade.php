<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog</title>
{{--    @vite(['resources/css/katalog.css','resources/css/korzina.css'])--}}
{{--    <link rel="stylesheet" href="css/katalog.css">--}}
{{--    <link rel="stylesheet" href="css/korzina.css">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />--}}

{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;400&display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />--}}
</head>
<body>

                        <div class="popup-container">
                            <div class="popup">

                                <div class="content">
                                    <div class="cont"> <h2>Чек покупки</h2>
                                        <span class="close-btn">&times;</span>
                                    </div>


                                    <p><strong>Имя покупателя:</strong> {{auth()->user()->name}}</p>
                                    <p><strong>Адрес доставки:</strong> {{$order->address}}</p>
                                    <p><strong>Названия товаров:</strong>
                                        @foreach($order->order_products as $order_product)
                                            <br>{{$order_product->product->name}} {{$order_product->quantity}}
                                        @endforeach</p>
                                    <p><strong>Цена заказа:</strong> {{$order->total_price}} </p>
                                </div>
                            </div>
                        </div>

{{--<script src="js/korzina.js"></script>--}}
{{--                        ->first()->product->name--}}
</body>
</html>
