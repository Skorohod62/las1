<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog</title>
    @vite(['resources/css/katalog.css','resources/css/korzina.css'])
{{--    <link rel="stylesheet" href="css/katalog.css">--}}
{{--    <link rel="stylesheet" href="css/korzina.css">--}}

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="headerblack">
            <div class="container">
                <div class="header-container">
                    <div class="header-mail">

                        <p class="">Afterpay, Laybuy & Genoapay | Free Delivery New Zealand + Australia*</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            @guest
                                Login
                            @else
                                Logout
                                {{ auth()->user()->name }}
                            @endguest
                        </button>
                    </form>

                </div>
            </div>

            <div class="header-white">
                <div class="header-white-fhoto">
                    <img src="{{url('storage/Logo.png')}}" alt="" />
                </div>
                <div class="containerrr">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>


                <div class="container">
                    <div class="header-container-two">

                        <div class="header-container-item">
                            <div class="lines"></div>
                        </div>
                        <div class="header-container-item">
                            <nav class="nav">

                                <ul class="nav-list" id="menu">
                                    <li class="active"> <a href="{{route('home')}}">HOME</a></li>
                                    <li><a href="{{route('katalog')}}">SHOPE</a></li>
                                    <li> <a href="katalog.blade.php">FAQ'S</a></li>
                                    <li> <a href="katalog.blade.php">STOCKISTS</a></li>
                                    <li> <a href="katalog.blade.php">WHOLESALE</a></li>
                                    <li class="nav-list-item"> <a href="katalog.blade.php">CONTACT</a></li>
                                    <li>
                                        <img class="item-image" src="{{url('storage/Group301.svg')}}" alt="" />
                                    </li>

                                </ul>

                            </nav>


                        </div>

                    </div>
                </div>
                <div class="header-button">
                    <p>
                        <a href="#zav">
                            <img src="{{url('storage/Znak.png')}}" alt="Привет"></a>
                    </p>
                </div>
            </div>
    </header>
    <main>


        <div class="container">
            <div class="block">
                @guest
                    <div class="galv-txt">нужно войти в учётную запись</div>
                @else
                <div class="galv-txt">Корзина товаров - {{ auth()->user()->name }}</div>

{{--                    {{$existingOrder = auth()->user()->orders()->where('status', '1')->first()}}--}}
{{--                    {{$anyOrder = auth()->user()->orders->isNotEmpty()}}--}}
                    @if(!auth()->user()->orders()->where('status', '1')->first() || !auth()->user()->orders->isNotEmpty())
                            <div class="galv-txt">Корзина пуста</div>
                    @else
                        <div class="galv-txt">Связь с вашим администратором - {{\App\Models\User::find(auth()->user()->orders()->where('status', '1')->first()->administrator_id)->email}}</div>
                        <div class="glav-block">
                            @section('content')
                        @php
                            $newTotalPrice = auth()->user()->orders()->where('status','1')->first()->order_products()->sum('subtotal_price');
                            if (auth()->user()->orders()->where('status','1')->first()->order_products->isEmpty())
                            {
                                $newTotalPrice = 0;
                            }
                            auth()->user()->orders()->where('status','1')->first()->update(['total_price' => $newTotalPrice]);
                        @endphp
                    @endsection
                    @foreach(auth()->user()->orders()->where('status','1')->first()->order_products as $orderProduct)
                        @foreach($products as $product)
                            @if($orderProduct->product_id == $product->id)
                                <a href="{{route('kartochka',$product->id)}}">
                                    <div class="container-produkt">
                                        <img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="">
                                        <div class="name-produkt">{{$product->name}}</div>
                                        <div class="opisania">{{$product->description}}</div>
                                        <div class="price-button">
                                            <div class="price">{{$orderProduct->subtotal_price}}$</div>
                                            <div class="price">{{$orderProduct->quantity}}</div>
                                                <form action="{{route('del', $orderProduct->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <button class="buthon" type="submit">DEL</button>
                                                </form>
                                        </div>
                                    </div>
                                </a>
                            @endif
                      @endforeach
                    @endforeach
                    <div class="block-img"><img src="{{url('storage/karzina/Group 369.svg')}}" alt=""></div>
{{--                    <div class="block-gtxt">Ваша корзина на данный момент пуста.</div>--}}
{{--                    <div class="block-ptxt">Прежде чем приступить к оформлению заказа, вы должны добавить некоторые товары в корзину. На странице "Каталог" вы найдете много интересных товаров.</div>--}}
                    <div class="button-vhode">
                        <div class="katalog">
{{--                            <a id="zakaz" href="{{route('katalog')}}">Вернуться в каталог ></a>--}}
                        </div>




{{--                        <div class="popup-container">--}}
{{--                            <div class="popup">--}}

{{--                                <div class="content">--}}
{{--                                    <div class="cont"> <h2>Чек покупки</h2>--}}
{{--                                        <span class="close-btn">&times;</span>--}}
{{--                                    </div>--}}


{{--                                    <p><strong>Имя покупателя:</strong> Иван Иванов</p>--}}
{{--                                    <p><strong>Адрес доставки:</strong> ул. Пушкина, д. 10, кв. 5</p>--}}
{{--                                    <p><strong>Название товара:</strong> Nike Fors</p>--}}
{{--                                    <p><strong>Цена товара:</strong> 120RUB</p>--}}
{{--                                    <p><strong>Количество:</strong>2</p>--}}
{{--                                    <button  id="pehat">Печать</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div> <p class="summ-zak">Сумма текущего заказа: {{auth()->user()->orders()->where('status', '1')->first()->total_price}}$</p>
            <div class="katalog">
                <form action="{{route('pdf')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" id="zakaz">Заказать</button>
                </form>
            </div>

            @endif
            @foreach(auth()->user()->orders->Where('status', 2) as $order)
                <br>{{$order->date}} {{$order->total_price}}
            @endforeach
        </div>
        @endguest

    </main>

    <footer class="podval">
        <div class="foter-img">
            <div class="foter-menu">
                <div class="foter-glmenu">
                    <h1 class="h-menu">GOOD4ME</h1>
                    <p class="p-menu">Good health is important, so all of our products have been carefully designed to bring out the best in you.</p>


                </div>
                <div class="foter-poisc">
                    <h1 class="h-menu">Keep In Touch</h1>
                    <p class="p-menu">Subscribe to receive new product updates, be the first to know about sales, and more.</p>
                    <input type="text" value="" class="some-input" placeholder="Enter your email address">

                </div>

                <div class="foter-podhmenu">
                    <h1 class="h-menu">MORE INFO</h1>
                    <p class="p-menu">Shipping & Delivery Refund Policy Partner Program Wholesale Portal You Buy, We Donate Privacy Policy Terms & Conditions</p>

                </div>


            </div>


            <div class="foter-polosa"></div>
            <div class="bloci">
                <div class="bloci-sslc">
                    <a href="#"> <img src="{{url('storage/febok.svg')}}" alt="#"></a>
                    <a href="#"><img src="{{url('storage/Insta.svg')}}" alt="#zav"></a>
                    <a href=""><img src="{{url('storage/Tviter.svg')}}" alt="#zav"></a>
                    <a href=""><img src="{{url('storage/Phka.svg')}}" alt="#zav"></a>
                    <a href=""><img src="{{url('storage/youtube.svg')}}" alt="#zav"></a>
                </div>
                <div class="bloci-nadpis">© 2021, GOOD4ME. Powered by Shopify</div>
                <div class="bloci-kartohki">
                    <a href="#"><img src="{{url('storage/kartohki.svg')}}" alt="#zav"></a>
                </div>

            </div>


        </div>

    </footer>

</div>
@vite(['resources/js/korzina.js'])
{{--<script src="js/korzina.js"></script>--}}
</body>
</html>
