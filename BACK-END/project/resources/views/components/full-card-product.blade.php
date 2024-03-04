<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/components/zero.css','resources/css/full-card-product.css','resources/css/header-footer.css'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <title>full-card-product</title>
</head>

<body>
<header class="header">
    <div class="header-container-up">
        <div class="header-logo-container">
            <h1 class="header-logo-name">Sport<span class="header-logo-name-step">Rens</span></h1>
        </div>
        <div class="header-menu-one">
            <a href="#" class="header-number">+375-(29)-222-22-22</a>
            <a href="#" class="haeder-phone-link">Заказать звонок</a>
            <div class="header-enter-container">
                <a href="">Войти</a>
                <img src="{{url('storage/main-images/components/enter-img.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="header-conteiner-middle">
        <div class="block-search-header">
            <a href="#" class="header-catalog-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g clip-path="url(#clip0_10_236)">
                        <path
                            d="M3.33333 0H0.666667C0.298667 0 0 0.298667 0 0.666667V3.33333C0 3.70133 0.298667 4 0.666667 4H3.33333C3.70133 4 4 3.70133 4 3.33333V0.666667C4 0.298667 3.70133 0 3.33333 0Z"
                            fill="white" />
                        <path
                            d="M3.33333 6H0.666667C0.298667 6 0 6.29867 0 6.66667V9.33333C0 9.70133 0.298667 10 0.666667 10H3.33333C3.70133 10 4 9.70133 4 9.33333V6.66667C4 6.29867 3.70133 6 3.33333 6Z"
                            fill="white" />
                        <path
                            d="M3.33333 12H0.666667C0.298667 12 0 12.2987 0 12.6667V15.3333C0 15.7013 0.298667 16 0.666667 16H3.33333C3.70133 16 4 15.7013 4 15.3333V12.6667C4 12.2987 3.70133 12 3.33333 12Z"
                            fill="white" />
                        <path
                            d="M9.33333 0H6.66667C6.29867 0 6 0.298667 6 0.666667V3.33333C6 3.70133 6.29867 4 6.66667 4H9.33333C9.70133 4 10 3.70133 10 3.33333V0.666667C10 0.298667 9.70133 0 9.33333 0Z"
                            fill="white" />
                        <path
                            d="M9.33333 6H6.66667C6.29867 6 6 6.29867 6 6.66667V9.33333C6 9.70133 6.29867 10 6.66667 10H9.33333C9.70133 10 10 9.70133 10 9.33333V6.66667C10 6.29867 9.70133 6 9.33333 6Z"
                            fill="white" />
                        <path
                            d="M9.33333 12H6.66667C6.29867 12 6 12.2987 6 12.6667V15.3333C6 15.7013 6.29867 16 6.66667 16H9.33333C9.70133 16 10 15.7013 10 15.3333V12.6667C10 12.2987 9.70133 12 9.33333 12Z"
                            fill="white" />
                        <path
                            d="M15.3333 0H12.6667C12.2987 0 12 0.298667 12 0.666667V3.33333C12 3.70133 12.2987 4 12.6667 4H15.3333C15.7013 4 16 3.70133 16 3.33333V0.666667C16 0.298667 15.7013 0 15.3333 0Z"
                            fill="white" />
                        <path
                            d="M15.3333 6H12.6667C12.2987 6 12 6.29867 12 6.66667V9.33333C12 9.70133 12.2987 10 12.6667 10H15.3333C15.7013 10 16 9.70133 16 9.33333V6.66667C16 6.29867 15.7013 6 15.3333 6Z"
                            fill="white" />
                        <path
                            d="M15.3333 12H12.6667C12.2987 12 12 12.2987 12 12.6667V15.3333C12 15.7013 12.2987 16 12.6667 16H15.3333C15.7013 16 16 15.7013 16 15.3333V12.6667C16 12.2987 15.7013 12 15.3333 12Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_10_236">
                            <rect width="16" height="16" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                Каталог
            </a>

        </div>
        <div class="header-nav-menu-list-container">
            <ul class="header-nav-menu-list">
                <li><a href="#">Бренды</a></li>
                <li><a href="#">Сервис</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Поддержка</a></li>
                <li><a href="#">О магазине</a></li>
                <li><a href="#">Контакты</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
        <div class="haeder-nav-shop-container">
            <div class="header-favourites">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                        <g opacity="0.7">
                            <path
                                d="M22.0718 1.96128C19.4616 -0.6482 15.2154 -0.6482 12.6059 1.96128L11.9998 2.56703L11.394 1.96128C8.78455 -0.648553 4.53795 -0.648553 1.92847 1.96128C-0.628032 4.51779 -0.644633 8.57012 1.88997 11.3876C4.2017 13.9565 11.0196 19.5064 11.3089 19.7413C11.5053 19.901 11.7416 19.9787 11.9765 19.9787C11.9842 19.9787 11.992 19.9787 11.9994 19.9783C12.2424 19.9896 12.4872 19.9063 12.6899 19.7413C12.9792 19.5064 19.7979 13.9565 22.1103 11.3873C24.6445 8.57012 24.6279 4.51779 22.0718 1.96128ZM20.535 9.96987C18.7326 11.9722 13.7782 16.1019 11.9994 17.5673C10.2207 16.1022 5.26732 11.9729 3.46527 9.97022C1.69712 8.00499 1.68052 5.20618 3.42677 3.45994C4.31861 2.56844 5.48984 2.12235 6.66107 2.12235C7.8323 2.12235 9.00354 2.56809 9.89538 3.45994L11.2277 4.79223C11.3863 4.95082 11.5862 5.04548 11.796 5.07868C12.1365 5.15179 12.5059 5.05678 12.7708 4.79258L14.1038 3.45994C15.8879 1.6766 18.7898 1.67695 20.5728 3.45994C22.319 5.20618 22.3024 8.00499 20.535 9.96987Z"
                                fill="white" />
                        </g>
                    </svg>
                    <div class="header-favourites-count-container">
                        <span>99</span>
                    </div>
                </a>
            </div>
            <div class="header-basket">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26" fill="none">
                        <g opacity="0.7">
                            <path
                                d="M0.9 7.73398H20.1V21.5007C20.1 23.2127 18.7121 24.6007 17 24.6007H4C2.28792 24.6007 0.9 23.2127 0.9 21.5007V7.73398Z"
                                stroke="white" stroke-width="1.8" />
                            <path
                                d="M5.83464 12.666L5.83464 4.99935C5.83464 2.79021 7.6255 0.999349 9.83464 0.999349H11.168C13.3771 0.999349 15.168 2.79021 15.168 4.99935L15.168 12.666"
                                stroke="white" stroke-width="1.8" />
                        </g>
                    </svg>
                    <div class="header-basket-count-container">
                        <span>99</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="main-content">
    <div class="main-content-container">
      <div class="full-product">
          <div class="full-product-header">
              <h1>{{$product->title}}</h1>
          </div>
          <div class="full-product-body">
              <div class="full-product-photo-container">
                  <div class="main-photo-product">
                      <img src="{{url(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="">
                  </div>
                  <div class="step-photo-product">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                      <img src="{{url('storage/main-images/full-products-images/step-photo-product.png')}}" alt="">
                  </div>
              </div>
              <div class="price-block-product">
                  <div class="price-block-header">
                      <div class="price-block-header-name-pro">
                          <h1>{{$product->brand}}</h1>
                      </div>
                      <div class="slogans-block">
                          <div class="slogan">
                              <img src="{{url('storage/main-images/full-products-images/slogan-1.svg')}}" alt="">
                              <p>Выгодно</p>
                          </div>
                          <div class="slogan">
                              <img src="{{url('storage/main-images/full-products-images/slogan-2.svg')}}" alt="">
                              <p>Рекомендуем</p>
                          </div>
                          <div class="slogan">
                              <img src="{{url('storage/main-images/full-products-images/slogan-3.svg')}}" alt="">
                              <p>Новинка</p>
                          </div>
                      </div>
                  </div>
                  <div class="price-block-body">
                    <div class="about-product-short">
                        {!! $product->description !!}
                    </div>
                      <div class="block-info-product">
                          <div class="block-info-product-header">
                              <p>В наличии 	&#10004;</p>
                          </div>
                          <div class="block-info-product-price">
                              <span>Цена:</span><p> 1 199 900 ₽</p>
                          </div>
                          <div class="main-buy-block">
                              <div class="buy-block">
                                  <img id="minus-btn" src="{{url('storage/main-images/full-products-images/minus.svg')}}" alt="">
                                  <p id="counter">1</p>
                                  <img id="plus-btn" src="{{url('storage/main-images/full-products-images/plus.svg')}}" alt="">
                              </div>
                              <button class="buy-button">Положить в корзину</button>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

</div>

<footer class="footer">

    <div class="footer-container">

        <div class="footer-info-block">

            <div class="footer-conteiner-info">
                <div class="footer-conteiner-info-header">
                    <h1>Каталог</h1>
                </div>
                <div class="footer-conteiner-info-body">
                    <a href="#">Для дома</a>
                    <a href="#">Путешествие</a>
                    <a href="#">Новинки</a>
                    <a href="#">Бренды</a>
                    <a href="#">Детям</a>
                </div>
            </div>

            <div class="footer-conteiner-info">
                <div class="footer-conteiner-info-header">
                    <h1>Поддержка</h1>
                </div>
                <div class="footer-conteiner-info-body">
                    <a href="#">Доставка и оплата</a>
                    <a href="#">Условия возврата</a>
                    <a href="#">FAQ</a>
                    <a href="#">Гарантия</a>

                </div>
            </div>

            <div class="footer-conteiner-info">
                <div class="footer-conteiner-info-header">
                    <h1>Услуги</h1>
                </div>
                <div class="footer-conteiner-info-body">
                    <a href="#">Продажа</a>
                    <a href="#">Аренда</a>
                    <a href="#">Рассрочка</a>
                    <a href="#">Партнёрство</a>
                    <a href="#">Оптовая закупка</a>
                    <a href="#">Лизинг</a>
                </div>
            </div>

            <div class="footer-conteiner-info">
                <div class="footer-conteiner-info-header">
                    <h1>О нас</h1>
                </div>
                <div class="footer-conteiner-info-body">
                    <a href="#">О магазине</a>
                    <a href="#">Контакты</a>
                    <a href="#">Обратная связь</a>
                    <a href="#">Политика конфиденциальности</a>
                    <a href="#">Заказать звонок</a>
                </div>
            </div>

        </div>

        <div class="footer-block-connection">
            <div class="footer-block-connection-header">
                <a href="#">
                    <h1>Sport<span>Rens</span></h1>
                </a>
            </div>
            <div class="footer-block-connection-content">
                <div class="footer-block-connection-content-number">
                    <p>+375-(33)-333-33-33 </p><span>- Минск</span>
                </div>
                <div class="footer-block-connection-content-number">
                    <p>+375-(33)-333-33-33</p><span>- Беларусь</span>
                </div>
                <div class="email-block-footer">
                    <span>Email:</span><a href="#">sportrens@gmail.com</a>
                </div>
                <div class="routs">
                    <p>© SportRens. 2023 Все права защищены</p>
                </div>

            </div>
        </div>


    </div>
    <script>
        @verbatim
        let counterElement = document.getElementById('counter');
        let plusBtn = document.getElementById('plus-btn');
        let minusBtn = document.getElementById('minus-btn');

        plusBtn.addEventListener('click', function() {

            let value = parseInt(counterElement.innerText);
            value += 1;

            counterElement.innerText = value;
        });

        minusBtn.addEventListener('click', function() {

            let value = parseInt(counterElement.innerText);
            if (value > 1) {
                value -= 1;
                counterElement.innerText = value;
            }
        });
        @endverbatim
    </script>
</footer>

</body>

</html>
