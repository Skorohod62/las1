<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog</title>
    @vite(['resources/css/katalog.css'])
    @vite(['resources/js/app.js','resources/css/styles.css','resources/css/app.css','resources/js/scripts.js'])
{{--    <link rel="stylesheet" href="css/katalog.css">--}}
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
                                    <input type="email" id="eemail" placeholder="Введите ваш email">

                                    <label for="password">Пароль:</label>
                                    <input type="password" id="ppassword" placeholder="Введите ваш пароль">

                                    <button type="submit">Войти</button>
                                </form>
                            </div>



                        <p>></p>
                    </div>
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
                                <li class="active"> <a href="{{route('home')}}">HOME</a></li>
                                <li><a href="">SHOPE</a></li>
                                <li> <a href="">FAQ'S</a></li>
                                <li> <a href="">STOCKISTS</a>   </li>
                                <li> <a href="">WHOLESALE</a></li>
                                <li class="nav-list-item"> <a href="">CONTACT</a></li>
{{--                                <li>--}}
{{--                                    <img class="item-image" src="{{url('storage/Group301.svg')}}" alt="" />--}}
{{--                                </li>--}}

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
    <section>

        <div class="filtr">
            <div class="search-container">
                <!-- Поле ввода для поиска -->
                <form class="poisk" action="{{route('products.search')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="name" class="search-input" name="name" placeholder="Поиск...">
                    <button type="submit" class="muu ">Поиск товара по коталогу</button>
                </form>
            </div>
{{--            <div class="button-filtr" id="openFilterModal" >Фильтрация</div>--}}
            <div class="catalog-content-header-filter-sort"  >
                <span>Сортировать по: </span>
                <form action="{{route('products.SortByASC')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">А..Я</button>
                </form>
                <form action="{{route('products.SortByDESC')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Я..А</button>
                </form>
                <form action="{{route('products.sortByPriceAscending')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Цена ↑ вверх</button>
                </form>
                <form action="{{route('products.sortByPriceDescending')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Цена ↓ вниз</button>
                </form>
            </div>

        </div>
        <div class="line"></div>
        <div id="filterModal">
            <div id="filterModal-content">
                <span id="filterModal-close">&times;</span>
                <!-- Здесь разместите настройки фильтров -->
                <h2>Настраиваемые фильтры</h2>
                <!-- Пример настроек -->
                <div class="ccontainer">
                    <div class="filter">
                        <div class="ttxt">
                            <div class="glav-txt">Фильтр по цене</div>
                            <div class="podh-txt" id="clossi">^</div>
                        </div>



                        <div id="menu-prace" class="ob-container">
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" value="0">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" value="100">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="100" value="0" step="1">
                                <input type="range" class="range-max" min="0" max="100" value="100" step="1">
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <label for="category">Категория:</label>
                <select id="category" name="category">
                    <option value="clothing">A</option>
                    <option value="electronics">B</option>
                    <option value="electronics">C</option>
                    <option value="electronics">D</option>
                    <!-- Добавьте другие варианты по вашему усмотрению -->
                </select>
                <br>

                <!-- Другие настройки фильтров -->

            </div>
        </div>
{{--        <div class="filter">--}}
{{--            <label>Граммовка витаминов:</label>--}}
{{--            <div class="btn-group" id="vitaminWeight">--}}
{{--                <button  data-max="50">50 г</button>--}}
{{--                <button  data-max="100">100 г</button>--}}
{{--                <button  data-max="150">150 г</button>--}}
{{--                <button data-max="200">200 г</button>--}}
{{--                <button data-max="250">250 г</button>--}}
{{--                <button data-max="300">300 г</button>--}}
{{--                <button  data-max="350">350 г</button>--}}
{{--            </div>--}}
{{--        </div>--}}
        <form action="{{ route('products.sortByWeight') }}" method="GET">
            <input type="text" name="query" placeholder="Поиск товара...">

            <select name="grams">
                <option value="50">50 г</option>
                <option value="100">100 г</option>
                <option value="150">150 г</option>
                <option value="200">200 г</option>
                <option value="250">250 г</option>
                <option value="300">300 г</option>
                <option value="350">350 г</option>
            </select>

            <button type="submit">Применить фильтр</button>
        </form>
    </section>

    <section class="tovar">
        <div class="block">
            @foreach($products as $product)
                <a href="{{route('kartochka',$product->id)}}">
                    <div class="container-produkt">
                        <img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="">
                        <div class="name-produkt">{{$product->name}}</div>
                        <div class="opisania">{{$product->description}}</div>
                        <div class="price-button">
                            <div class="price">{{$product->price}}$</div>
                            <div class="buthon">BUY</div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

    </section>

</div>
{{--        {{$products->links()}}--}}
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
@vite(['resources/js/script.js'])
{{--<script src="js/script.js"></script>--}}
</body>
</html>
