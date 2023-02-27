<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="stylesheet" href="/css/message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Profile</title>
</head>
<body>
    <script>
        var purchasedProducts={!! json_encode($purchasedProducts) !!}
        var deliveredProducts={!! json_encode($deliveredProducts) !!}
        var bankCards={!! json_encode($bankCards) !!}
        var isAuth={!! json_encode(Auth::check()) !!}

        console.log(bankCards);
    </script>
    @include('message')
    
    <header class="header">
        <div class="container">
            <div class="header-nav">
                @include('layouts.menu')
                <div class="logo">
                    <h1 class="title">SHOP</h1>
                </div>
                <nav class="nav">
                    <ul class="list-nav">
                        <li class="item-nav"><a href="/catalog" class="link-item">Каталог</a></li>
                        <li class="item-nav"><a href="/#about" class="link-item">О нас</a></li>
                        <li class="item-nav"><a href="/#footer" class="link-item">Контакты</a></li>
                        <li class="item-nav"><a href="/" class="link-item">Главная</a></li>
                    </ul>
                </nav>
                <div class="profile-cart">
                    <a href="/cart/"><img src="/img/cart.svg" alt="" class="cart"></a>
                    {{-- <a href="/profile/"><svg class="profile" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"><g fill="#fff" fill-opacity=".5" clip-path="url(#a)"><path d="M20.677 30.72s3.947-.23 5.92-2.777C28.57 25.395 22.651 19 22.651 19s-3.289 2.776-7.893 2.548C10.154 21.318 8.18 19 8.18 19s-7.235 5.095-4.604 9.172c2.631 4.076 17.101 2.547 17.101 2.547ZM15.448 17.884a8.442 8.442 0 1 0 0-16.884 8.442 8.442 0 0 0 0 16.884Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h30v30H0z"/></clipPath></defs></svg></a> --}}

                </div>
            </div>
        </div>
    </header>
    {{-- @include('layouts.panel_profile') --}}

    <img src="/img/Line 2.svg" alt="" class="line">


    <main>
        <section class="section-nav-profile">
            <div class="container">
                <div class="box">
                    <div class="box-nav-profile">
                        <ul class="list-nav-profile">
                            <li class="item-list-profile main-box active"><span>Главная</span> </li>
                            <li class="item-list-profile favorites-box "><span>Избранное</span> </li>
                            <li class="item-list-profile delivery-box "><span>Доставки</span> </li>
                            <li class="item-list-profile purchases-box "><span>Покупки</span> </li>
                            <li class="item-list-profile personal-data-box"><span>Личные данные</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="section-profile main-box active-section">
                    <div class="boxs-profile">
                        <div class="box-profile personal-data-box personal-data">
                            <div class="container-box-profile">
                                <div class="row-box">
                                    <div class="circle">
                                        {{$user->name[0] }} 
                                    </div>
                                    <div class="data">
                                        <h1 class="name">{{ $user->name }}</h1>
                                        <h2 class="email">{{ $user->email }}</h2>
                                    </div>
                                </div>
                                {{-- <h1 class="exit">Выйти</h1> --}}
                            </div>
                        </div>
                        <div class="box-profile favorites-box">
                            <div class="container-box-profile">
                                <div class="row-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="52" fill="none"><path stroke="#fff" stroke-width="3" d="M43.237 2C50.842 2 57 8.157 57 15.746c0 13.509-13.291 20.484-26.795 33.767a1.02 1.02 0 0 1-1.425 0C15.275 36.23 2 29.255 2 15.746 2 8.156 8.158 2 15.746 2c6.873 0 10.31 3.437 13.746 10.31C32.928 5.436 36.365 2 43.237 2Z"/></svg>
                                    <div class="data">
                                        <h1 class="title-item">Избранное</h1>
                                        <p class="info">Избранные вами товары можно увидеть здесь</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-profile delivery-box delivery">
                            <div class="container-box-profile">
                                <div class="row-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="36" fill="none"><mask id="a" fill="#fff"><path d="M30.96 12c-.26.008-.51.116-.694.304l-5.276 5.26-3.25-3.24c-.91-.948-2.38.516-1.43 1.424l3.966 3.956a1.013 1.013 0 0 0 1.43 0l5.99-5.974c.66-.64.174-1.73-.734-1.73h-.002ZM1 20h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm0-8h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm0-8h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm48 22c-2.75 0-5 2.25-5 5s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5Zm0 2c1.668 0 3 1.332 3 3s-1.332 3-3 3-3-1.332-3-3 1.332-3 3-3Zm-26-2c-2.75 0-5 2.25-5 5s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5Zm0 2c1.668 0 3 1.332 3 3s-1.332 3-3 3-3-1.332-3-3 1.332-3 3-3ZM13 0c-1.644 0-3 1.356-3 3v22c0 1.644 1.356 3 3 3h4c1.352.02 1.352-2.02 0-2h-4c-.572 0-1-.428-1-1V3c0-.572.428-1 1-1h26c.572 0 1 .428 1 1v23H29c-1.32 0-1.296 2.02 0 2h14c1.32 0 1.308-2 0-2h-1V8h8.454L58 19.792V25c0 .572-.428 1-1 1h-2c-1.308 0-1.308 2 0 2h2c1.644 0 3-1.356 3-3v-5.5c0-.19-.054-.38-.156-.54l-8-12.5C51.66 6.174 51.344 6 51 6h-9V3c0-1.644-1.356-3-3-3H13Z"/></mask><path fill="#fff" d="M30.96 12c-.26.008-.51.116-.694.304l-5.276 5.26-3.25-3.24c-.91-.948-2.38.516-1.43 1.424l3.966 3.956a1.013 1.013 0 0 0 1.43 0l5.99-5.974c.66-.64.174-1.73-.734-1.73h-.002ZM1 20h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm0-8h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm0-8h6c.554 0 1 .446 1 1s-.446 1-1 1H1c-.554 0-1-.446-1-1s.446-1 1-1Zm48 22c-2.75 0-5 2.25-5 5s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5Zm0 2c1.668 0 3 1.332 3 3s-1.332 3-3 3-3-1.332-3-3 1.332-3 3-3Zm-26-2c-2.75 0-5 2.25-5 5s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5Zm0 2c1.668 0 3 1.332 3 3s-1.332 3-3 3-3-1.332-3-3 1.332-3 3-3ZM13 0c-1.644 0-3 1.356-3 3v22c0 1.644 1.356 3 3 3h4c1.352.02 1.352-2.02 0-2h-4c-.572 0-1-.428-1-1V3c0-.572.428-1 1-1h26c.572 0 1 .428 1 1v23H29c-1.32 0-1.296 2.02 0 2h14c1.32 0 1.308-2 0-2h-1V8h8.454L58 19.792V25c0 .572-.428 1-1 1h-2c-1.308 0-1.308 2 0 2h2c1.644 0 3-1.356 3-3v-5.5c0-.19-.054-.38-.156-.54l-8-12.5C51.66 6.174 51.344 6 51 6h-9V3c0-1.644-1.356-3-3-3H13Z"/><path fill="#fff" d="M30.96 12v-2h-.062l.062 2Zm-.694.304 1.412 1.416.009-.008.008-.01-1.429-1.398Zm-5.276 5.26-1.412 1.416 1.412 1.408 1.412-1.408-1.412-1.416Zm-3.25-3.24-1.443 1.385.015.016.016.015 1.412-1.416Zm-1.43 1.424 1.412-1.416-.015-.015-.015-.015-1.382 1.446Zm3.966 3.956 1.414-1.414-.002-.002-1.412 1.416Zm1.43 0 1.41 1.418.002-.002-1.412-1.416Zm5.99-5.974-1.392-1.436-.01.01-.01.01 1.412 1.416ZM17 28l.03-2H17v2Zm0-2v2h.03L17 26Zm23 0v2h2v-2h-2Zm-11 2v-2h-.031L29 28Zm13-2h-2v2h2v-2Zm0-18V6h-2v2h2Zm8.454 0 1.685-1.078-.59-.922h-1.095v2ZM58 19.792h2v-.585l-.315-.493L58 19.792Zm1.844-.832 1.687-1.075-.002-.003-1.685 1.078Zm-8-12.5 1.684-1.078-.002-.004-1.682 1.082ZM42 6h-2v2h2V6Zm-11.102 4a3.016 3.016 0 0 0-2.061.905l2.858 2.798a.984.984 0 0 1-.674.296l-.123-3.998Zm-2.044.888-5.276 5.26 2.824 2.832 5.276-5.26-2.824-2.832Zm-2.452 5.26-3.25-3.24-2.824 2.832 3.25 3.24 2.824-2.832Zm-3.22-3.209a2.914 2.914 0 0 0-2.327-.915 3.078 3.078 0 0 0-1.939.899 3.071 3.071 0 0 0-.906 1.94c-.064.862.261 1.703.918 2.33l2.764-2.89c.182.173.334.49.307.853a.931.931 0 0 1-.26.601.925.925 0 0 1-.596.257 1.09 1.09 0 0 1-.846-.305l2.886-2.77Zm-4.284 4.225 3.966 3.956 2.824-2.832-3.966-3.956-2.824 2.832Zm3.964 3.954a3.013 3.013 0 0 0 4.255.004l-2.822-2.836a.987.987 0 0 1 1.395.004l-2.828 2.828Zm4.256.002 5.99-5.974-2.824-2.832-5.99 5.974 2.824 2.832Zm5.97-5.954C35.156 13.16 33.501 10 30.962 10v4a.971.971 0 0 1-.88-.58 1.03 1.03 0 0 1 .222-1.126l2.784 2.872ZM30.962 10h-.002v4h.002v-4ZM1 22h6v-4H1v4Zm6 0c-.55 0-1-.45-1-1h4c0-1.659-1.341-3-3-3v4Zm-1-1c0-.55.45-1 1-1v4c1.659 0 3-1.341 3-3H6Zm1-1H1v4h6v-4Zm-6 0c.55 0 1 .45 1 1h-4c0 1.659 1.341 3 3 3v-4Zm1 1c0 .55-.45 1-1 1v-4c-1.659 0-3 1.341-3 3h4Zm-1-7h6v-4H1v4Zm6 0c-.55 0-1-.45-1-1h4c0-1.659-1.341-3-3-3v4Zm-1-1c0-.55.45-1 1-1v4c1.659 0 3-1.341 3-3H6Zm1-1H1v4h6v-4Zm-6 0c.55 0 1 .45 1 1h-4c0 1.659 1.341 3 3 3v-4Zm1 1c0 .55-.45 1-1 1v-4c-1.659 0-3 1.341-3 3h4ZM1 6h6V2H1v4Zm6 0c-.55 0-1-.45-1-1h4c0-1.659-1.341-3-3-3v4ZM6 5c0-.55.45-1 1-1v4c1.659 0 3-1.341 3-3H6Zm1-1H1v4h6V4ZM1 4c.55 0 1 .45 1 1h-4c0 1.659 1.341 3 3 3V4Zm1 1c0 .55-.45 1-1 1V2C-.659 2-2 3.341-2 5h4Zm47 19c-3.855 0-7 3.145-7 7h4c0-1.645 1.355-3 3-3v-4Zm-7 7c0 3.855 3.145 7 7 7v-4c-1.645 0-3-1.355-3-3h-4Zm7 7c3.855 0 7-3.145 7-7h-4c0 1.645-1.355 3-3 3v4Zm7-7c0-3.855-3.145-7-7-7v4c1.645 0 3 1.355 3 3h4Zm-7-1c.563 0 1 .437 1 1h4c0-2.773-2.227-5-5-5v4Zm1 1c0 .563-.437 1-1 1v4c2.773 0 5-2.227 5-5h-4Zm-1 1c-.563 0-1-.437-1-1h-4c0 2.773 2.227 5 5 5v-4Zm-1-1c0-.563.437-1 1-1v-4c-2.773 0-5 2.227-5 5h4Zm-25-7c-3.855 0-7 3.145-7 7h4c0-1.645 1.355-3 3-3v-4Zm-7 7c0 3.855 3.145 7 7 7v-4c-1.645 0-3-1.355-3-3h-4Zm7 7c3.855 0 7-3.145 7-7h-4c0 1.645-1.355 3-3 3v4Zm7-7c0-3.855-3.145-7-7-7v4c1.645 0 3 1.355 3 3h4Zm-7-1c.563 0 1 .437 1 1h4c0-2.773-2.227-5-5-5v4Zm1 1c0 .563-.437 1-1 1v4c2.773 0 5-2.227 5-5h-4Zm-1 1c-.563 0-1-.437-1-1h-4c0 2.773 2.227 5 5 5v-4Zm-1-1c0-.563.437-1 1-1v-4c-2.773 0-5 2.227-5 5h4ZM13-2C10.251-2 8 .251 8 3h4c0-.54.46-1 1-1v-4ZM8 3v22h4V3H8Zm0 22c0 2.749 2.251 5 5 5v-4c-.54 0-1-.46-1-1H8Zm5 5h4v-4h-4v4Zm3.97 0c.885.013 1.703-.33 2.278-.97.541-.602.766-1.35.766-2.03 0-.68-.225-1.428-.766-2.03-.575-.64-1.393-.983-2.278-.97l.06 4a1.043 1.043 0 0 1-.757-.357.964.964 0 0 1-.259-.643c0-.174.056-.418.259-.643.237-.265.548-.36.757-.357l-.06 4Zm.03-6h-4v4h4v-4Zm-4 0c.226 0 .49.091.7.3.209.21.3.474.3.7h-4c0 1.677 1.323 3 3 3v-4Zm1 1V3h-4v22h4Zm0-22c0 .226-.091.49-.3.7-.21.209-.474.3-.7.3V0c-1.677 0-3 1.323-3 3h4Zm-1 1h26V0H13v4Zm26 0c-.226 0-.49-.091-.7-.3-.209-.21-.3-.474-.3-.7h4c0-1.677-1.323-3-3-3v4Zm-1-1v23h4V3h-4Zm2 21H29v4h11v-4Zm-11 0c-.888 0-1.695.362-2.253 1.009a3.05 3.05 0 0 0-.728 2.01c.004.664.221 1.4.746 1.997.561.64 1.372.998 2.266.984l-.062-4c.246-.004.567.11.801.376a.949.949 0 0 1 .249.62.952.952 0 0 1-.244.626c-.232.269-.547.378-.775.378v-4Zm0 6h14v-4H29v4Zm14 0c.88 0 1.685-.354 2.246-.995a3.04 3.04 0 0 0 .74-2.011 3.048 3.048 0 0 0-.745-2A2.944 2.944 0 0 0 43 24v4a1.06 1.06 0 0 1-.766-.369.953.953 0 0 1-.248-.625c-.001-.168.051-.409.25-.636A1.06 1.06 0 0 1 43 26v4Zm0-6h-1v4h1v-4Zm1 2V8h-4v18h4Zm-2-16h8.454V6H42v4Zm6.77-.922 7.545 11.792 3.37-2.156-7.546-11.792-3.37 2.156ZM56 19.792V25h4v-5.208h-4ZM56 25c0-.226.091-.49.3-.7.21-.209.474-.3.7-.3v4c1.677 0 3-1.323 3-3h-4Zm1-1h-2v4h2v-4Zm-2 0c-.883 0-1.686.359-2.243.998A3.046 3.046 0 0 0 52.019 27c0 .666.215 1.402.738 2.002.557.64 1.36.998 2.243.998v-4c.23 0 .541.109.772.373a.955.955 0 0 1 .247.627.955.955 0 0 1-.247.627c-.23.264-.543.373-.772.373v-4Zm0 6h2v-4h-2v4Zm2 0c2.749 0 5-2.251 5-5h-4c0 .54-.46 1-1 1v4Zm5-5v-5.5h-4V25h4Zm0-5.5a3.01 3.01 0 0 0-.47-1.615l-3.373 2.15A.99.99 0 0 1 58 19.5h4Zm-.471-1.618-8-12.5-3.37 2.156 8 12.5 3.37-2.156ZM53.526 5.378A3.001 3.001 0 0 0 51 4v4a.999.999 0 0 1-.838-.458l3.364-2.164ZM51 4h-9v4h9V4Zm-7 2V3h-4v3h4Zm0-3c0-2.749-2.251-5-5-5v4c.54 0 1 .46 1 1h4Zm-5-5H13v4h26v-4Z" mask="url(#a)"/></svg>
                                    <div class="data">
                                        <h1 class="title-item">Доставки</h1>
                                        <p class="info">Товары, которые скоро будут у вас</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-profile purchases-box purchases">
                            <div class="container-box-profile">
                                <div class="row-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="62" fill="none"><path fill="#fff" d="M60 28.82a3.86 3.86 0 0 0-3.849-3.848H3.849A3.86 3.86 0 0 0 0 28.821c0 1.799 1.255 3.308 2.93 3.724L8.238 57.65a4.24 4.24 0 0 0 4.228 4.228h35.762a4.24 4.24 0 0 0 4.228-4.228l5.364-25.378c1.284-.625 2.181-1.933 2.181-3.45ZM17.286 52.744c0 .727-.595 1.32-1.322 1.32H15.6a1.325 1.325 0 0 1-1.322-1.32V37.278c0-.727.595-1.32 1.322-1.32h.364c.727 0 1.322.593 1.322 1.32v15.465Zm9.673 0c0 .727-.594 1.32-1.321 1.32h-.364a1.325 1.325 0 0 1-1.322-1.32V37.278c0-.727.595-1.32 1.322-1.32h.364c.727 0 1.321.593 1.321 1.32v15.465Zm9.674 0c0 .727-.594 1.32-1.322 1.32h-.363a1.325 1.325 0 0 1-1.321-1.32V37.278c0-.727.594-1.32 1.32-1.32h.365c.727 0 1.321.593 1.321 1.32v15.465Zm9.674 0c0 .727-.595 1.32-1.321 1.32h-.364a1.325 1.325 0 0 1-1.322-1.32V37.278c0-.727.595-1.32 1.322-1.32h.364c.727 0 1.32.593 1.32 1.32v15.465ZM13.055 18.565c1.198-8.342 8.354-14.76 17.028-14.76s15.83 6.418 17.028 14.76c.175 2.849 3.844 2.393 3.844 0C49.733 8.115 40.862 0 30.083 0 19.303 0 10.432 8.114 9.21 18.565c0 2.963 3.891 3.077 3.845 0Z"/></svg>
                                    <div class="data">
                                        <h1 class="title-item">Покупки</h1>
                                        <p class="info">Товары, которые были доставленны</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-profile personal-data-box card">
                            <div class="container-box-profile">
                                <div class="row-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="42" fill="none"><path fill="#fff" d="M51 0H9a9 9 0 0 0-9 9v24a9 9 0 0 0 9 9h42a9 9 0 0 0 9-9V9a9 9 0 0 0-9-9ZM27 30H15a3 3 0 0 1 0-6h12a3 3 0 0 1 0 6Zm18 0h-6a3 3 0 0 1 0-6h6a3 3 0 0 1 0 6Zm9-18H6V9a3 3 0 0 1 3-3h42a3 3 0 0 1 3 3v3Z"/></svg>
                                    <div class="data">
                                        <h1 class="title-item">Мои карты</h1>
                                        <p class="info">Здесь находятся ваши карты</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-profile favorites-box">
                    <img src="/img/back.svg" alt="" class="back">

                    @forelse ($favoriteProducts as $favoriteProduct)
                        <div class="card-product" id="{{ $favoriteProduct->product_id }}">
                            <div class="container-card">
                                <a href="/product/{{ $favoriteProduct->product_id }}">
                                    <div class="title-and-image">
                                        <img class="photo-product" src="data:image/png;base64,{{$favoriteProduct->photo_product}}">
                                        <h1 class="title-product">{{ $favoriteProduct->name }}</h1>
                                    </div>
                                </a>
                                <div>
                                    <span class="price">{{ $favoriteProduct->price }}$</span>
                                    <div class="add-to-cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>
                                    </div>
                                    <div class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" fill="none"><path fill="#fff" fill-rule="evenodd" d="M16.8 14.25h2.4c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-2.4c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0-9.5h6c.66 0 1.2 1.188 1.2 1.188s-.54 1.187-1.2 1.187h-6c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0 4.75h4.8c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-4.8c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187ZM1.2 16.625C1.2 17.931 2.28 19 3.6 19h7.2c1.32 0 2.4-1.069 2.4-2.375V4.75h-12v11.875Zm12-15.438h-2.4L9.948.345A1.217 1.217 0 0 0 9.108 0H5.292c-.312 0-.624.13-.84.344l-.852.844H1.2c-.66 0-1.2.534-1.2 1.187s.54 1.188 1.2 1.188h12c.66 0 1.2-.535 1.2-1.188 0-.653-.54-1.188-1.2-1.188Z" clip-rule="evenodd"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1>У вас нет избранных товаров</h1>
                    @endforelse
                </div>

                <div class="section-profile delivery-box ">
                    <img src="/img/back.svg" alt="" class="back">
                    {{-- <h1 class="date">Доставка 10 февраля</h1> --}}
                </div>
                <div class="section-profile purchases-box ">
                    <img src="/img/back.svg" alt="" class="back">
                    {{-- <h1 class="date">Дата покупки 10 февраля</h1> --}}
                </div>
                <div class="section-profile personal-data-box">
                    <img src="/img/back.svg" alt="" class="back">
                    <div class="personal-data-form">
                        <div class="container-personal-data">
                            <div class="input-personal-data name_user">
                                <input type="text" class="input-profile" name="" id="name" placeholder=" " value="{{ $user->name_user }}">
                                <label class="label-for-input-profile" for="name">Имя</label>
                            </div>
                           <div class="input-personal-data surname">
                                <input type="text" class="input-profile" name="" id="surname" placeholder=" " value="{{ $user->surname_user }}">
                                <label class="label-for-input-profile" for="surname">Фамилия</label>
                            </div>
                            <div class="input-personal-data login">
                                <input type="text" class="input-profile" name="" id="login" placeholder=" " value="{{ $user->name }}">
                                <label class="label-for-input-profile" for="login">Логин</label>
                            </div>
                            <div class="input-personal-data mail">
                                <input type="text" class="input-profile" name="" id="mail" placeholder=" " value="{{ $user->email }}">
                                <label class="label-for-input-profile" for="mail">Почта</label>
                            </div>
                            <button class="save-change">Сохранить</button>
                        </div>
                    </div>
                    <div class="bank-cards">
                        <div class="container-bank-cards">
                            @if(count($bankCards['cards']))
                                @for ($i=0; $i<count( $bankCards['cards']); $i++)
                                    <div class="bank-card" id="bank-card{{ $bankCards['cards'][$i]->id }}">
                                        <div class="container-bank-card">
                                            <div class="row-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="42" fill="none"><path fill="#fff" d="M51 0H9a9 9 0 0 0-9 9v24a9 9 0 0 0 9 9h42a9 9 0 0 0 9-9V9a9 9 0 0 0-9-9ZM27 30H15a3 3 0 0 1 0-6h12a3 3 0 0 1 0 6Zm18 0h-6a3 3 0 0 1 0-6h6a3 3 0 0 1 0 6Zm9-18H6V9a3 3 0 0 1 3-3h42a3 3 0 0 1 3 3v3Z"/></svg>
                                                <div class="data">
                                                    <h1 class="title-item">Карта №{{ $i+1 }}</h1>
                                                    <p class="info"></p>
                                                </div>
                                            </div>
                                            <svg class="delete-bank-card" xmlns="http://www.w3.org/2000/svg" width="24" height="19" fill="none"><path fill="#fff" fill-rule="evenodd" d="M16.8 14.25h2.4c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-2.4c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0-9.5h6c.66 0 1.2 1.188 1.2 1.188s-.54 1.187-1.2 1.187h-6c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0 4.75h4.8c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-4.8c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187ZM1.2 16.625C1.2 17.931 2.28 19 3.6 19h7.2c1.32 0 2.4-1.069 2.4-2.375V4.75h-12v11.875Zm12-15.438h-2.4L9.948.345A1.217 1.217 0 0 0 9.108 0H5.292c-.312 0-.624.13-.84.344l-.852.844H1.2c-.66 0-1.2.534-1.2 1.187s.54 1.188 1.2 1.188h12c.66 0 1.2-.535 1.2-1.188 0-.653-.54-1.188-1.2-1.188Z" clip-rule="evenodd"/></svg>
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                    <div class="add-bank-card">
                        <div class="caption-add-card">
                            <h1 class="caption">Добавить карту</h1>
                            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="none"><path stroke="#FEFEFE" stroke-linecap="round" stroke-width="2" d="m1 1 6.11 9.663a1 1 0 0 0 1.691 0L14.911 1"/></svg>
                        </div>
                        <div class="add-bank-card-form">
                            <div class="container-add-bank-card">
                                <div class="input-data-card number">
                                    <input type="text" class="input-card"  name="" id="number-card" placeholder="•••• •••• •••• •••• ••••" value="" maxlength="24">
                                    <label class="label-for-input-card" for="number-card">Номер карты</label>
                                </div>
                                <div class="input-data-card validity">
                                    <input type="text" class="input-card" name="" id="validity" placeholder="ММ/ГГ" value="" maxlength="5">
                                    <label class="label-for-input-card" for="validity">Срок действия</label>
                                </div>
                                <div class="input-data-card cvv-cvc">
                                    <input type="password" class="input-card" name="" id="cvv-cvc" placeholder="•••" value="" maxlength="3">
                                    <label class="label-for-input-card" for="cvv-cvc">CVV/CVC</label>
                                </div>
                                <button class="btn-add-bank-card">
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <img src="/img/Line 2.svg" alt="" class="line">
    {{-- <footer class="footer">
        <div class="logo-footer">
            <h1>SHOP</h1>
        </div>
        

        <div class="footer-information">
            <div class="footer-list">
                <ul class="list">
                    <li class="item-footer-list-header">Меню</li>
                    <li class="item-footer-list"><a href="">Главная</a></li>
                    <li class="item-footer-list"><a href="">Каталог</a></li>
                    <li class="item-footer-list"><a href="">Контакты</a></li>
                    <li class="item-footer-list"><a href="">О нас</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <ul class="list">
                    <li class="item-footer-list-header">Каталог</li>
                    <li class="item-footer-list"><a href="">Телефоны</a></li>
                    <li class="item-footer-list"><a href="">Зарядные уст-ва</a></li>
                    <li class="item-footer-list"><a href="">Плантшеты</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <ul class="list">
                    <li class="item-footer-list-header">Контакты</li>
                    <li class="item-footer-list"><a href="https://t.me/vadya605">Телеграм</a> </li>
                    <li class="item-footer-list"><a href="https://www.instagram.com/invites/contact/?i=1439nysdqk661&utm_content=9rmoctx">Инстаграм</a></li>
                    <li class="item-footer-list"><a href="https://kosmat3936@gmail.com">Почта</a></li>
                    <li class="item-footer-list"><a href="">+375 (29) 611-61-08</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <ul class="list">
                    <li class="item-footer-list-header">Партнеры</li>
                    <li class="item-footer-list"><a href="">Samsung</a></li>
                    <li class="item-footer-list"><a href="">Apple</a></li>
                    <li class="item-footer-list"><a href="">Huawei</a></li>
                    <li class="item-footer-list"><a href="">Xiaomi</a></li>
                </ul>
            </div>
        </div>
    </footer>  --}}
    @include('layouts.footer')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/profile.js"></script>
</body>
</html>