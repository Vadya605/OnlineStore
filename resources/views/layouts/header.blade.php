<link rel="stylesheet" href="/css/header.css">
<header class="header">
    <div class="container">
        <div class="header-nav">
            @include('layouts.menu')
            <div class="logo">
                <a href="/"><h1 class="title">SHOP</h1></a>
            </div>
            <nav class="nav">
                <ul class="list-nav">
                    <li class="item-nav"><a href="/catalog" class="link-item">Каталог</a></li>
                    <li class="item-nav"><a href="/#about" class="link-item">О нас</a></li>
                    <li class="item-nav"><a href="#footer" class="link-item">Контакты</a></li>
                    <li class="item-nav"><a href="/" class="link-item">Главная</a></li>
                </ul>
            </nav>
            <div class="profile-cart">
                <a href="/profile/"><svg class="profile" xmlns="http://www.w3.org/2000/svg" width="30" height="30"><g fill="#fff" fill-opacity=".5" clip-path="url(#a)"><path d="M20.677 30.72s3.947-.23 5.92-2.777C28.57 25.395 22.651 19 22.651 19s-3.289 2.776-7.893 2.548C10.154 21.318 8.18 19 8.18 19s-7.235 5.095-4.604 9.172c2.631 4.076 17.101 2.547 17.101 2.547ZM15.448 17.884a8.442 8.442 0 1 0 0-16.884 8.442 8.442 0 0 0 0 16.884Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h30v30H0z"/></clipPath></defs></svg></a>
                <a href="/cart/"><img src="/img/cart.svg" alt="" class="cart"></a>
            </div>
        </div>
    </div>
</header>