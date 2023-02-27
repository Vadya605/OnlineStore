<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/message.css">
    <link rel="stylesheet" href="/css/media.css"> 
    <title>CartPage</title>
</head>
<body>
    @include('message')
    @include('layouts.header')
    <img src="/img/Line 2.svg" alt="" class="line">
    <main class="main">
        <section class="section">
            <div class="container">
                <div class="row-cart">
                    <div class="cards-products">
                        <script>
                            var productsInCart = {!! json_encode($productsInCart) !!};
                        </script>
                        <div class="cards-in-stock">
                            @forelse ($productsInCart as $productInCart)
                                @if($productInCart->in_stock)
                                    <div class="card-product in-stock" id="{{ $productInCart->product_id }}">
                                        <div class="container-card">
                                            <a href="/product/{{ $productInCart->product_id }}">
                                                <div class="title-and-image">
                                                    <img class="photo-product" src="data:image/png;base64,{{$productInCart->photo_product}}">
                                                    <h1 class="title-product">{{ $productInCart->name }}</h1>
                                                </div>
                                            </a>
                                            <div class="count-change">
                                                <img src="../img/minus.svg" alt="" class="decrease">
                                                <span class="count">{{ $productInCart->amount }}</span>
                                                <img src="../img/plus (4).svg" alt="" class="increase">
                                            </div>
                                            <div>
                                                <span class="price">{{ $productInCart->amount*$productInCart->price }}$</span>
                                                <div class="btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" fill="none"><path fill="#fff" fill-rule="evenodd" d="M16.8 14.25h2.4c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-2.4c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0-9.5h6c.66 0 1.2 1.188 1.2 1.188s-.54 1.187-1.2 1.187h-6c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0 4.75h4.8c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-4.8c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187ZM1.2 16.625C1.2 17.931 2.28 19 3.6 19h7.2c1.32 0 2.4-1.069 2.4-2.375V4.75h-12v11.875Zm12-15.438h-2.4L9.948.345A1.217 1.217 0 0 0 9.108 0H5.292c-.312 0-.624.13-.84.344l-.852.844H1.2c-.66 0-1.2.534-1.2 1.187s.54 1.188 1.2 1.188h12c.66 0 1.2-.535 1.2-1.188 0-.653-.54-1.188-1.2-1.188Z" clip-rule="evenodd"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                    <h1 class="cart-empty">В корзине нет товаров, перейдите в каталог и подберите себе что-нибудь</h1>
                            @endforelse
                        </div>
                        <div class="cards-out-of-stock">
                            <h1 class="out-of-stock">Нет в наличии</h1>
                            @forelse ($productsInCart as $productInCart)
                                @if(!$productInCart->in_stock)
                                    <div class="card-product out-of-stock" id="{{ $productInCart->product_id }}">
                                        <div class="container-card">
                                            <a href="/product/{{ $productInCart->product_id }}">
                                                <div class="title-and-image">
                                                    <img class="photo-product" src="data:image/png;base64,{{$productInCart->photo_product}}">
                                                    <h1 class="title-product">{{ $productInCart->name }}</h1>
                                                </div>
                                            </a>
                                            <div>
                                                <span class="price">{{ $productInCart->price }}$</span>
                                                <div class="btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" fill="none"><path fill="#fff" fill-rule="evenodd" d="M16.8 14.25h2.4c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-2.4c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0-9.5h6c.66 0 1.2 1.188 1.2 1.188s-.54 1.187-1.2 1.187h-6c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0 4.75h4.8c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-4.8c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187ZM1.2 16.625C1.2 17.931 2.28 19 3.6 19h7.2c1.32 0 2.4-1.069 2.4-2.375V4.75h-12v11.875Zm12-15.438h-2.4L9.948.345A1.217 1.217 0 0 0 9.108 0H5.292c-.312 0-.624.13-.84.344l-.852.844H1.2c-.66 0-1.2.534-1.2 1.187s.54 1.188 1.2 1.188h12c.66 0 1.2-.535 1.2-1.188 0-.653-.54-1.188-1.2-1.188Z" clip-rule="evenodd"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                
                            @endforelse
                        </div> 
                    </div>
                    <div class="ordering">
                        <div class="form-ordering">
                            <div class="input-personal-data">
                                <input type="text" class="input-ordering" name="" id="coutry" placeholder=" " value="">
                                <label class="label-for-input-ordering" for="coutry">Страна</label>
                            </div>
                            <div class="input-personal-data">
                                <input type="text" class="input-ordering" name="" id="city" placeholder=" " value="">
                                <label class="label-for-input-ordering" for="city">Город</label>
                            </div>
                            <div class="input-personal-data">
                                <input type="text" class="input-ordering" name="" id="address" placeholder=" " value="">
                                <label class="label-for-input-ordering" for="address">Адрес</label>
                            </div>
                            <div class="input-personal-data">
                                <input type="text" class="input-ordering" name="" id="number-phone" placeholder=" " value="">
                                <label class="label-for-input-ordering" for="number-phone">Номер телефона</label>
                            </div>
                            <button class="btn-ordering">
                                Оформить доставку
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <img src="/img/Line 2.svg" alt="" class="line">

    @include('layouts.footer')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/cart.js"></script>
    @include('layouts.panel_profile')

</body>
</html>