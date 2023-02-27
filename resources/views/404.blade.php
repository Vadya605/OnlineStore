<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/page_not_found.css">
    <title>PageNotFound</title>
</head>
<body>
    <script>
        var isAuth={!! json_encode(Auth::check()) !!}
    </script>
    {{-- <header class="header">
        <div class="container">
            <div class="header-nav">
                <div class="logo">
                    <h1 class="title">SHOP</h1>
                </div>
                <nav class="nav">
                    <ul class="list-nav">
                        <li class="item-nav"><a href="#" class="link-item">Каталог</a></li>
                        <li class="item-nav"><a href="#" class="link-item">О нас</a></li>
                        <li class="item-nav"><a href="#" class="link-item">Контакты</a></li>
                        <li class="item-nav"><a href="#" class="link-item">Главная</a></li>
                    </ul>
                </nav>
                <div class="profile-cart">
                    <a href="/profile/"><svg class="profile" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"><g fill="#fff" fill-opacity=".5" clip-path="url(#a)"><path d="M20.677 30.72s3.947-.23 5.92-2.777C28.57 25.395 22.651 19 22.651 19s-3.289 2.776-7.893 2.548C10.154 21.318 8.18 19 8.18 19s-7.235 5.095-4.604 9.172c2.631 4.076 17.101 2.547 17.101 2.547ZM15.448 17.884a8.442 8.442 0 1 0 0-16.884 8.442 8.442 0 0 0 0 16.884Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h30v30H0z"/></clipPath></defs></svg></a>
                    <a href="/cart/"><img src="/img/cart.svg" alt="" class="cart"></a>
                </div>
            </div>
        </div>
    </header> --}}
    @include('layouts.header')

    @include('layouts.panel_profile')

    <img src="/img/Line 2.svg" alt="" class="line">

    <main class="main">
        <section class="section-main">
            <div class="container">
                <div class="phone">
                    <div class="logo-in-phone">
                        <h1 class="title">SHOP</h1>
                    </div>
                    <span class="text">Страница не найдена</span>
                    <span class="code">404</span>
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
    </footer> --}}
    @include('layouts.footer')

</body>
</html>