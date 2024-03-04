<!DOCTYPE html>
<html lang="en">

<head>
    <title>Good4Me</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/style.css','resources/css/itc-slider.css'])
{{--    <link href="css/style.css" rel="stylesheet" />--}}
{{--    <link rel="stylesheet" href="css/itc-slider.css">--}}
</head>

<body onLoad="getSecs()">
<div class="wrapper">
    <header class="header">
        <div class="headerblack">
            <div class="container">
                <div class="header-container">
                    <div class="header-mail">

                        <p class="">Afterpay, Laybuy & Genoapay | Free Delivery New Zealand + Australia*</p>
                    </div>

                    <div  class="header-hour">
{{--                        <p class="vhode" id="openRegistrationModalBtn">Sign In / Register</p>--}}
{{--                        <form action="{{ route('logout') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit">Logout</button>--}}
{{--                        </form>--}}
{{--                        @auth('web')--}}
{{--                            {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
{{--                        @endauth--}}
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
                        <img src="{{url('storage/Flag.png')}}" alt="" />
                        <div id="registrationModal" class="modal">
                            <div class="modal-content">
                                <span id="zakrt" class="zakrt">&times;</span>
                                <h2>Регистрация</h2>
                                <form>
                                    <label for="name">Имя:</label>
                                    <input type="text" id="name" placeholder="Введите ваше имя">

                                    <label for="email">Email:</label>
                                    <input type="email" id="email" placeholder="Введите ваш email">

                                    <label for="password">Пароль:</label>
                                    <input type="password" id="password" placeholder="Введите ваш пароль">

                                    <button type="submit">Зарегистрироваться</button>
                                </form>
                                <p class="auth-link">Уже зарегистрированы? <a id="openLoginModalBtn" class="avtoriz" href="#">Авторизоваться</a></p>
                            </div>
                        </div>
                        <div id="loginModal" class="modal">
                            <div class="modal-content">
                                <span id="zakrt2" class="zakrt">&times;</span>
                                <h2>Авторизация</h2>
                                <form>
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" placeholder="Введите ваш email">

                                    <label for="password">Пароль:</label>
                                    <input type="password" id="password" placeholder="Введите ваш пароль">

                                    <button type="submit">Войти</button>
                                </form>
                            </div>



                            <p>></p>
                        </div>
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
                                    <li class="active"> <a href="">HOME</a></li>
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
                            <img src="{{url('storage/Znak.png')}}" alt="Привет">
			</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        </header>
        <main class="main">


            <section class="System">
                <div class="container">
                    <div class="cont">
                        <div class="par">
                            <h2 class="pare-text">Good4Me</h2>
                            <h2 class="pare-text1">Apple Cider Vinegar</h2>
                            <p class="text">
                                Good4Me Apple Cider Vinegar gummies are the newest addition to your morning health and well-being regime.
                            </p>
                            <a class="Shop" href="#">Shop Now</a>
                        </div>
                        <!-- <div class="lal"></div> -->
                    </div>
                </div>


            </section>
            <section class="arenda">
                <div class="container1">

                    <div class="tovars-subtitle">

                        <p class="text">GOOD4ME DEAL</p>
                        <div class="line"></div>

                        <p class="text1">Pick your beauty products today. 50% OFF on the most popular GOOD4ME. Order all classy products today!</p>


                    </div>


                </div>

                <div class="cartink">
                    <div class="podpis">
                        <img src="{{url('storage/3.png')}}" alt="">
                        <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                    </div>

                    <div class="podpis">
                        <img src="{{url('storage/1.png')}}" alt="">
                        <p>FULL RANGE VALUE PACK (SAVE 33%)</p>
                    </div>
                    <div class="podpis">
                        <img src="{{url('storage/2.png')}}" alt="">
                        <p>VITAMIN C: IMMUNITY SUPPORT </p>
                    </div>
                    <div class="podpis">
                        <img src="{{url('storage/4.png')}}" alt="">
                        <p>IRON: ENERGY SUPPORT</p>
                    </div>


                </div>
                <div class="garantia">
                    <div class="garantia-img">
                        <div class="lol1"><img src="{{url('storage/world.svg')}}" alt=""></div>
                        <div class="textgl-img">
                            <p>WORLDWIDE SHIPPING</p>
                        </div>
                        <div class="textpod-img">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean</p>
                        </div>

                    </div>
                    <div class="garantia-img">
                        <div class="lol1"><img src="{{url('storage/world1.svg')}}" alt=""></div>
                        <div class="textgl-img">
                            <p>30 DAYS GUARANTEE</p>
                        </div>
                        <div class="textpod-img">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean</p>
                        </div>

                    </div>
                    <div class="garantia-img">
                        <div class="lol1"><img src="{{url('storage/world3.svg')}}" alt=""></div>
                        <div class="textgl-img">
                            <p>SECURED PAYMENTS</p>
                        </div>
                        <div class="textpod-img">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean</p>
                        </div>

                    </div>
                </div>
                <div class="okno">
                    <div class="okno-text">
                        <div class="okno-text-h">
                            <p>TAKE CONTROL OF YOUR HEALTH</p>
                        </div>
                        <div class="okno-text-p">
                            <p>The Good4Me range has been formulated based on scientific & traditional evidence.</p>
                        </div>
                        <div class="okno-text-p">
                            <p>Our vitamins are here and ready to boost your mood, immunity and overall well-being! </p>
                        </div>
                        <div class="okno-text-p">
                            <p>Made in New Zealand from local and imported ingredients. </p>
                        </div>
                        <div class="okno-buth">
                            <a href="{{route('katalog')}}">VIEW ALL PRODUCTS</a>
                        </div>

                    </div>
                    <div class="okno-img">
                        <div class="okno-img-podh">
                            <img class="okno1" src="{{url('storage/okno11.png')}}" alt="">
                            <img class="okno1" src="{{url('storage/okno22.png')}}" alt="">
                        </div>
                        <div class="okno-img-glav">
                            <img class="okno3" src="{{url('storage/okno3.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="kartink1">
                    <div class="kartink1-text">OUR PRODUCTS ARE</div>
                    <div class="cartink">
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>28.99$</p>
                            </a>
                        </div>

                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>32.99$</p>
                            </a>
                        </div>
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>13.49$</p>
                            </a>
                        </div>
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>14.99$</p>
                            </a>
                        </div>


                    </div>

                </div>
                <div class="buth">
                    <a href="{{route('katalog')}}">VIEW ALL PRODUCTS</a>
                </div>


            </section>
            <section class="Otzeve">
                <div class="glazv-ot">
                    <div class="text-otz">
                        <p class="text-otz-text1">REAL REVIEWS</p>
                        <p class="text-otz-text2">REAL RESULTS</p>
                        <div class="star-rating">
                            <input type="radio" name="stars" id="star-a" value="5" />
                            <label for="star-a"></label>

                            <input type="radio" name="stars" id="star-b" value="4" />
                            <label for="star-b"></label>

                            <input type="radio" name="stars" id="star-c" value="3" />
                            <label for="star-c"></label>

                            <input type="radio" name="stars" id="star-d" value="2" />
                            <label for="star-d"></label>

                            <input type="radio" name="stars" id="star-e" value="1" />
                            <label for="star-e"></label>
                        </div>
                        <p class="text-otz-text3">“We have perfected our formulas over time, based on your feedback. Check out hundreds of reviews on our website.We can't wait until you are a part of our Good4Me Family.”</p>
                        <p class="text-otz-text4">_Chloe H.</p>
                        <div class="otzeve-knopki">
                            <a id="bthsum" href="#pap">
                                <img src="{{url('storage/knopkaleft.svg')}}" alt=""></a>
                            <a id="bthmin" href="#pap">
                                <img src="{{url('storage/knopkaright.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="img-otz">
                        <img class="img-otz1" src="{{url('storage/MaskGroup.png')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="product">
                <div class="kartink1">
                    <div class="kartink1-text">SHOP ALL</div>
                    <div class="cartink">
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                            <img src="{{url('storage/1.png')}}" alt="">
                            <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                            <p>28.99$</p>
                            </a>
                        </div>

                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>32.99$</p>
                            </a>
                        </div>
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>13.49$</p>
                            </a>
                        </div>
                        <div class="podpis">
                            <a href="{{route('katalog')}}">
                                <img src="{{url('storage/1.png')}}" alt="">
                                <p>MULTI-VITAMIN: EVERYDAY WELLNESS</p>
                                <p>14.99$</p>
                            </a>
                        </div>


                    </div>

                </div>
                <div class="buth">
                    <a href="{{route('katalog')}}">VIEW ALL PRODUCTS</a>
                </div>
            </section>
            <section class="LATEST">
                <div class="garantia2">

                    <div class="garantia-img2">
                        <div class="lol2">
                            <img class="maskgroup" src="{{url('storage/MaskGroup1.png')}}" alt="Привет">
                        </div>
                        <div class="textpdh-img">
                            <p>August 26, 2020</p>
                        </div>
                        <div class="textgl-img2">
                            <p>WORLDWIDE SHIPPING</p>
                        </div>
                        <div class="textpod-img2">
                            <p>We care about New Zealand children, and we want to support our community by providing our children in need with necessary vitamins to improve....</p>
                        </div>
                        <button class="singkapvo-gesionalem">
                        <span>Read more</span>
                    </button>
                    </div>
                    <div class="garantia-img2">
                        <div class="lol2"><img class="maskgroup" src="{{url('storage/MaskGroup2.png')}}" alt="Привет"></div>
                        <div class="textpdh-img">
                            <p>August 26, 2020</p>
                        </div>
                        <div class="textgl-img2">
                            <p>WORLDWIDE SHIPPING</p>
                        </div>
                        <div class="textpod-img2">
                            <p>We care about New Zealand children, and we want to support our community by providing our children in need with necessary vitamins to improve....</p>
                        </div>
                        <button class="singkapvo-gesionalem">
                        <span>Read more</span>
                    </button>
                    </div>
                    <div class="garantia-img2">

                        <div class="lol2"><img class="maskgroup" src="{{url('storage/MaskGroup3.png')}}" alt="Привет"></div>
                        <div class="textpdh-img">
                            <p>August 26, 2020</p>
                        </div>

                        <div class="textgl-img2">
                            <p>WORLDWIDE SHIPPING</p>
                        </div>

                        <div class="textpod-img2">
                            <p>We care about New Zealand children, and we want to support our community by providing our children in need with necessary vitamins to improve....</p>
                        </div>
                        <button class="singkapvo-gesionalem">
                        <span>Read more</span>
                    </button>
                    </div>
                </div>
            </section>
            <section class="maaap">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Dnipro&t=&z=4&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 400px;
                                width: 100%;
                            }
                        </style>
                        <a href="https://www.embedgooglemap.net"></a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 400px;
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>
            </section>
            <section class="slader">
                <div class="slader-text">
                    <p>#GOOD4ME</p>


                </div>

                <div class="carousel">
                    <div class="carousel__body">
                        <div class="carousel__prev"><i class="far fa-angle-left"></i></div>
                        <div class="carousel__next"><i class="far fa-angle-right"></i></div>
                        <div class="carousel__slider">
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask2.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask3.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask4.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask5.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>
                            <div class="carousel__slider__item">
                                <div class="item__3d-frame">
                                    <div class="item__3d-frame__box item__3d-frame__box--front">
                                        <img src="{{url('storage/Mask6.png')}}" alt="">
                                    </div>
                                    <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                    <div class="item__3d-frame__box item__3d-frame__box--right"> </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </section>
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
                <div id="id_clock" class="hassi"></div>
                <script>
                    digitalClock();
                </script>

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
    <button id="scrollToTop" class="btns btn--to-top" title="Go to top" type="button">
      Top
    </button>
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>

@vite(['resources/js/zagruz.js','resources/js/itc-slider.js','resources/js/code.js'])
{{--    <script src="js/zagruz.js"></script>--}}
{{--    <script src="js/itc-slider.js"></script>--}}
{{--    <script src="js/code.js"></script>--}}


    <script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

</body>

</html>
