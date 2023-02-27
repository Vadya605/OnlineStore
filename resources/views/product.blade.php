<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="stylesheet" href="/css/message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ProductPage</title>
</head>
<body>
    <script>
        // var photos={!! json_encode($product['photos']) !!}
        var isInFavorites = {!! json_encode($product['is_in_favorites']) !!}
        var isAuth={!! json_encode(Auth::check()) !!}
    </script>

    <section class="panel-buttons">
        <div class="container">
            <div>
                <span class="price-product">{{$product['price']}} $</span>
            </div>
            <div>
                <button id="{{ $product['id'] }}" class="button-add-cart">В корзину</button>
                @if(!$product['is_in_favorites'])
                    <svg id="{{ $product['id'] }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                @else
                    <svg id="{{ $product['id'] }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                @endif
            </div>
        </div>
        {{-- <div class="container-panel-buttons">
            
        </div> --}}
    </section>
        
    @include('message')
    
    @include('layouts.header')
    
    @include('layouts.panel_profile')

    <img src="/img/Line 2.svg" alt="" class="line">


    <main class="main">
        <section class="short-description">
            <div class="container">
                <div class="description-row">
                    <div class="slider">
                        <div class="image">
                            <div class="owl-carousel for-images">
                                @foreach($product['photos'] as $photoProduct)
                                    <div>
                                        <img class="photo-product" src="data:image/png;base64,{{$photoProduct->photo_product}}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="buttons-slider">
                                <div class="btn-left">
                                    <img src="/img/btn-slider2 (1).svg" alt="">
                                </div>
                                <div class="btn-right">
                                    <img src="/img/btn-slider1 (1).svg" alt="">
                                </div>
                            </div>
                            <script>
                                var product = {!! json_encode($product) !!}
                                console.log(product);
                            </script>
                        </div>
                    </div>
                    <div class="description-cart">
                        <div class="container-desc-cart">
                            <div class="header-desc">
                                <h1 class="title-product">
                                    {{ $product['name'] }}
                                </h1>
                                <div class="row">
                                    <div class="rating">
                                        <span>Рейтинг {{ $product['rating'] }}</span><img src="/img/Star.svg" alt="">
                                    </div>
                                    <div class="select">
                                        
                                        @if($product['is_in_favorites']==0)
                                            <svg id="{{ $product['id'] }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                        @else
                                            <svg id="{{ $product['id'] }}" class="add-to-favourites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <img src="/img/Line 2.svg" alt="" class="line">
                            <div class="main-description">
                                <ul class="list-description">
                                    <li class="item-description">Цена {{ $product['price'] }}$</li>
                                    
                                    @if(!empty($product['characteristics']))
                                        @for($i=0; $i<3; $i++)
                                            <li class="item-description">
                                                {{  $product['characteristics'][$i]->name  }} 
                                                {{  $product['characteristics'][$i]->value_characteristic  }}
                                            </li>
                                        @endfor
                                    @else
                                        <li class="item-description">
                                            У данного товар пока нет характеристик
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="btn-cart">
                                <button id="{{ $product['id'] }}">
                                    Добавить в корзину
                                </button>  
                            </div>
                        </div>
                        
                    </div>
                </div> 
            </div>
        </section>
        <section class="full-description">
            <div class="container">
                <ul class="suggestions">
                    <li class="item box-characteristics active-item" id="characteristics">Характеристики</li>
                    <li class="item box-reviews">Отзывы</li>
                    <li class="item box-give-review">Оставить отзыв</li>
                </ul>

                <div class="characteristics box-characteristics box-full-description active">
                    <ul class="list-characteristics">
                        @forelse($product['characteristics'] as $characteristic)
                            <li class="characteristic">
                                <div class="characteristic-description">
                                    <span class="name">{{  $characteristic->name  }}</span>
                                    <span class="value">{{  $characteristic->value_characteristic  }}</span>
                                </div>
                                <img class="show-characteristic" src="/img/show-characteristic.svg" alt="">
                            </li>
                        @empty
                            <li class="characteristic">
                                <span>Нет характеристик</span>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="reviews box-reviews box-full-description">
                    <div class="container-reviews">
                        @forelse($product['reviews'] as $review)
                            <div class="review">
                                <div class="container-review">
                                    <div class="header-review">
                                        <h1>{{$review->user_name}}</h1>
                                        <div class="user-rating">
                                            @for($i=0; $i<$review->product_rating; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="none"><path fill="#fff" d="M9.098 1.854c.599-1.843 3.205-1.843 3.804 0l1.017 3.129a2 2 0 0 0 1.902 1.382h3.29c1.937 0 2.742 2.479 1.175 3.618l-2.661 1.933a2 2 0 0 0-.727 2.236l1.017 3.13c.598 1.842-1.51 3.374-3.078 2.235l-2.661-1.933a2 2 0 0 0-2.352 0l-2.661 1.933c-1.567 1.139-3.676-.393-3.078-2.236l1.017-3.128a2 2 0 0 0-.727-2.237L1.714 9.983C.147 8.844.952 6.365 2.89 6.365h3.29A2 2 0 0 0 8.08 4.983l1.017-3.129Z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="text">
                                        <div class="border">
                                            <p>{{$review->text}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            {{-- <span class="no-reviews">Нет отзывов, будьте первым</span> --}}
                        @endforelse
                    </div>
                    {{-- <div class="owl-carousel for-reviews">
                        
                        <div></div>
                    </div> --}}
                </div>
                <div class="give-review box-give-review box-full-description">
                    @if(Auth::check())
                        <div class="review-add">
                            <div class="container-add-review">
                                <div class="name-user">
                                    <h1>{{ Auth::user()->name }}</h1>
                                </div>
                                <div class="text">
                                    <div class="border">
                                        
                                        <textarea name="" id="" cols="30" rows="10" class="input-review" placeholder="Ваш текст"></textarea>
                                    </div>
                                </div>
                                <div class="rating-selection">
                                    <div class="stars">
                                        @for($i=1; $i<=5; $i++)
                                            <svg class="star" id="{{ $i }}" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><path stroke="#fff" d="m13.927 2.009 1.577 4.856a2.5 2.5 0 0 0 2.378 1.727h5.106c1.453 0 2.057 1.86.882 2.714l-4.131 3.001a2.5 2.5 0 0 0-.908 2.795l1.578 4.856c.449 1.382-1.133 2.531-2.309 1.677l-4.13-3.001a2.5 2.5 0 0 0-2.94 0L6.9 23.635c-1.176.854-2.758-.295-2.309-1.677l1.578-4.856a2.5 2.5 0 0 0-.908-2.795l-4.13-3.001c-1.176-.854-.572-2.714.88-2.714h5.107a2.5 2.5 0 0 0 2.378-1.727l1.577-4.856c.45-1.382 2.405-1.382 2.854 0Z"/></svg>
                                        @endfor
                                    </div>
                                    
                                </div>
                                <div class="send">
                                    <button class="send-to-review" id={{ $product['id'] }}>
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <span>Необходимо авторизоваться</span>
                    @endif
                </div>
                
                
            </div>
        </section>
    </main>

    <img src="/img/Line 2.svg" alt="" class="line">

    @include('layouts.footer')
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/product.js"></script>
</body>
</html>