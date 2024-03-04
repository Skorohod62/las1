<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog</title>
    @vite(['resources/css/katalog.css','resources/css/kartohka.css'])
{{--    <link rel="stylesheet" href="css/katalog.css">--}}
{{--    <link rel="stylesheet" href="css/kartohka.css">--}}
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
                                    <li> <a href="">FAQ'S</a></li>
                                    <li> <a href="">STOCKISTS</a></li>
                                    <li> <a href="">WHOLESALE</a></li>
                                    <li class="nav-list-item"> <a href="">CONTACT</a></li>
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
                        <a href="{{route('korzina')}}">
                            <img src="{{url('storage/Znak.png')}}" alt="Привет"></a>
                    </p>
                </div>
            </div>
        </div>
        </header>
    <main>
        <div class="container">
            <div class="block">
                <div class="left">
                    <div class="img-glav">
                        <img id="glav" src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="">
                        <div class="block-img">
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="line-container">
                        <div class="line">
                            <div class="txt-line">Детали</div>
                        </div>
                    </div>
                    <form action="{{route('makeOrder')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                    <div class="container-detali">
                        <div class="det">
                            <div class="det-txt">Артикул</div>
                            <div class="det-line"></div>
                            <div class="det-name">{{$product->id}}</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Название</div>
                            <div class="det-line"></div>
                            <div class="det-name">{{$product->name}}</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Цена</div>
                            <div class="det-line"></div>
                            <div id="price" class="det-name">{{$product->price}}</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Дозировка</div>
                            <div class="det-line"></div>
                            <div class="det-name">{{$product->weight}}г</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Характеристика</div>
                            <div class="det-line"></div>
                            <div class="det-name">{{$product->description}}</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Количество на складе</div>
                            <div class="det-line"></div>
                            <div id="kolvo-sklad" class="det-name">{{$product->stock}}</div>
                        </div>
                        <div class="det">
                            <div class="det-txt">Количество</div>
                            <div class="det-line"></div>
                            <div class="det-name">
                                <input value="1" type="number" name="quantity" id="kolvo" placeholder="1" >

                            </div>
                        </div>
                        <div class="add-price">
                            <button id="add" type="submit" class="add-to-cart-btn">Добавить в корзину</button>
                            <div id="ob-summa" class="price"></div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="detali">


            </div>
            <div class="predloh">
                <div class="txt-predloh">Интересные предложения</div>
                <div class="container-predloh">
                    <div class="lines">
                        <div class="container-produkt">
                            <img src="{{url('storage/2.png')}}" alt="">
                            <div class="name-produkt">VITAMIN C: IMMUNITY SUPPORT</div>
                            <div class="opisania">Витамины для волос</div>
                            <div class="price-button">
                                <div class="price">324$</div>
                                <div class="buthon">BUY</div>
                            </div>
                        </div>
                        <div class="container-produkt">
                            <img src="{{url('storage/2.png')}}" alt="">
                            <div class="name-produkt">VITAMIN C: IMMUNITY SUPPORT</div>
                            <div class="opisania">Витамины для волос</div>
                            <div class="price-button">
                                <div class="price">324$</div>
                                <div class="buthon">BUY</div>
                            </div>
                        </div>
                        <div class="container-produkt">
                            <img src="{{url('storage/2.png')}}" alt="">
                            <div class="name-produkt">VITAMIN C: IMMUNITY SUPPORT</div>
                            <div class="opisania">Витамины для волос</div>
                            <div class="price-button">
                                <div class="price">324$</div>
                                <div class="buthon">BUY</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@vite(['resources/js/kartohka.js'])
{{--<script src="js/kartohka.js"></script>--}}
</body>
</html>
