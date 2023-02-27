<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="./css/style.css"> 
    <link rel="stylesheet" href="/css/media.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/message.css">
    <link rel="stylesheet" href="./css/nouislider.css">
    <link rel="stylesheet" href="./css/sliderStyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<script src="./js/nouislider.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
    <script src="./js/trainerSlider.js" defer></script>

    <title>MainPage</title>
</head>
<body>
    <script>
        var products={!! json_encode($products) !!}
        var isAuth={!! json_encode(Auth::check()) !!}
    </script>
    @include('message')

    <header class="header">
        <div class="container">
            <div class="header-nav">
                @include('layouts.menu')
                <div class="logo">
                    <a href="/"><h1 class="title">SHOP</h1></a>
                </div>
                <nav class="nav">
                    <ul class="list-nav">
                        <li class="item-nav-catalog"><a href="/catalog" class="link-item">Каталог</a></li>
                        <li class="item-nav"><a href="#about" class="link-item">О нас</a></li>
                        <li class="item-nav"><a href="#footer" class="link-item">Контакты</a></li>
                        <li class="item-nav"><a href="#" class="link-item">Главная</a></li>
                    </ul>
                </nav>
                <div class="profile-cart">
                    <a href="/profile/"><svg class="profile" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"><g fill="#fff" fill-opacity=".5" clip-path="url(#a)"><path d="M20.677 30.72s3.947-.23 5.92-2.777C28.57 25.395 22.651 19 22.651 19s-3.289 2.776-7.893 2.548C10.154 21.318 8.18 19 8.18 19s-7.235 5.095-4.604 9.172c2.631 4.076 17.101 2.547 17.101 2.547ZM15.448 17.884a8.442 8.442 0 1 0 0-16.884 8.442 8.442 0 0 0 0 16.884Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h30v30H0z"/></clipPath></defs></svg></a>
                    <a href="/cart/"><img src="/img/cart.svg" alt="" class="cart"></a>
                </div>
            </div>
            <div class="header-row">
                <div class="content">
                    <h1 class="offer">Успейте купить Samsung S22</h1>
                    <h2 class="descriptor">Только у нас!</h2>
                    <a href="/product/11">
                        <div class="btn-text">                            
                            <div class="btn">
                                Купить
                            </div>
                            <h2 class="text">Узнать больше</h2>
                        </div>
                    </a>
                </div>
                <div class="header-image">
                    <img src="/img/Телефон.png" alt="">
                </div>
            </div>
        </div>
    </header>

    @include('layouts.panel_profile')
    <main class="main">
        <section class="products">
            <div class="container">
                <div class="container-suggestions">
                    <ul class="suggestions">
                        {{-- <li class="item box-recommendations ">Рекомендации</li>
                        <li class="item box-popular">Популярные</li> --}}
                        <li class="item box-novelties active-item">Новинки</li>
                    </ul>
                </div>
                <div class="novelties-products box-novelties box-suggestions active">
                    <div id="slider" class="slider_wrapper">
                        <div class="slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($products['novelties'] as $productNovelties)
                                        <div class="swiper-slide">
                                            <div class="card-product" id={{ $productNovelties->id  }}>
                                                <img class="photo-product" src="data:image/png;base64,{{$productNovelties->photo_product}}">
                                                <div class="description">
                                                    <a class="link-product" href="product/{{ $productNovelties->id }}">
                                                        <div class="info">
                                                            <ul>
                                                                <li class="type item-list-info">{{  $productNovelties->type_name  }}</li>
                                                                <li class="name item-list-info" >{{ $productNovelties->name }}</li>
                                                                <li class="price item-list-info">{{ $productNovelties->price }} $</li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                    <div class="btns">
                                                        <div class="add-to-favorites">
                                                            @if(!$productNovelties->is_in_favorites)
                                                                <svg id="{{ $productNovelties->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                            @else
                                                                <svg id="{{ $productNovelties->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                            @endif
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-controll">
                                    <div class="swiper-buttons">
                                        
                                        <div class="swiper-button-prev"><img src="/img/btn-slider2 (1).svg" alt=""></div>
                                        <div class="swiper-button-next"><img src="/img/btn-slider1 (1).svg" alt=""></div>
                                        {{-- <div class="swiper-button-next"><img src="./img/aboutUsSliderRight.png" alt=""></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-container">
                    {{-- <button class="btn-left">
                        <img src="../img/Vector 1.svg" alt="" class="img-btn">
                    </button> --}}
                    {{-- <div class="recommendations-products box-recommendations box-suggestions ">
                        <div class="owl-carousel">
                            @foreach($products['recommendations'] as $productRecommendation)
                                <div>
                                    <div class="card-product" id={{ $productRecommendation->id  }}>
                                        <img class="photo-product" src="data:image/png;base64,{{$productRecommendation->photo_product}}">

                                        <div class="description">
                                            <a class="link-product" href="product/{{ $productRecommendation->id }}">
                                                <div class="info">
                                                    <ul>
                                                        <li class="type item-list-info">{{  $productRecommendation->type_name  }}</li>
                                                        <li class="name item-list-info" >{{ $productRecommendation->name }}</li>
                                                        <li class="price item-list-info">{{ $productRecommendation->price }} $</li>
                                                    </ul>
                                                </div>
                                            </a>
                                            <div class="btns">
                                                @if($productRecommendation->is_in_favorites==0)
                                                    <svg id="{{ $productRecommendation->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                @else
                                                    <svg id="{{ $productRecommendation->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                @endif
                                                <div class="add-to-cart">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular-products box-popular box-suggestions ">
                        <div class="owl-carousel">
                            @foreach($products['popular'] as $productPopular)
                                <div>
                                    <div class="card-product" id={{ $productPopular->id  }}>
                                        <img class="photo-product" src="data:image/png;base64,{{$productPopular->photo_product}}">

                                        <div class="description">
                                            <a class="link-product" href="product/{{ $productPopular->id }}">
                                                <div class="info">
                                                    <ul>
                                                        <li class="type item-list-info">{{  $productPopular->type_name  }}</li>
                                                        <li class="name item-list-info" >{{ $productPopular->name }}</li>
                                                        <li class="price item-list-info">{{ $productPopular->price }} $</li>
                                                    </ul>
                                                </div>
                                            </a>
                                            <div class="btns">
                                                @if($productPopular->is_in_favorites==0)
                                                    <svg id="{{ $productPopular->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                @else
                                                    <svg id="{{ $productPopular->is_in_favorites }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                                @endif
                                                <div class="add-to-cart">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
                   
                    
                    {{-- <button class="btn-right">
                        <img src="../img/Vector 2.svg" alt="" class="img-btn">
                    </button> --}}
                </div>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="about-row">
                    <div class="image">
                        <img src="/img/samsung_new.png" alt="">
                    </div>
                    <div class="information">
                        <h1>Официальный представитель  SAMSUNG</h1>
                        <p>Наш магазин предлагает все виды телефонов, наушников, плантшетов и зарядных устройств Samsung, Apple, Huawei и Xiaomi все виды аксессуаров и программного обеспечения. SHOP - это авторизованный центр техники в Витебске, куда вы можете обратиться в любое время, получить ответы на свои вопросы и получить профессиональную консультацию.</p>
                    </div>
                </div>
            </div>
        </section> 
    </main>
    @include('layouts.footer') 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/main.js"></script>
    <script src="/js/transition_animation(anchor).js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script>new WOW().init();</script>
</body>
</html>
