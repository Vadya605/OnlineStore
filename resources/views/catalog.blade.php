<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/29ce40a6e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/catalog.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="stylesheet" href="/css/message.css">
    <title>Catalog</title>
</head>
<body>
    <script>
        var allProducts = ({!! json_encode($products) !!}) 
        var isAuth={!! json_encode(Auth::check()) !!}
    </script>

    
    @include('layouts.header')
    @include('message')
    
    <div class="box-search">
        <form name="search" class="search_form">
            <input type="text" placeholder="Поиск" id="search" class="input" name="txt" onmouseout=this.blur()>
        </form>
        <img src="/img/search (2).svg" alt="">
    </div> 
    @include('layouts.panel_profile')

    <img src="./img/Line 2.svg" alt="" class="line">

    <main class="main">
        <section class="products-catalog">
            <div class="container">
                <div class="products-row">
                    <div class="filters">
                        <div class="filter">
                            <div class="title-filters">
                                <h1 class="title-filter">Категория</h1>
                                <img src="/img/close.svg" alt="" class="close-filters">
                            </div>
                            <div class="checkboxes">
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox category" id="phones">
                                    <label for="phones">Телефоны</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox category" id="charging-device">
                                    <label for="charging-device">Зарядное устройство</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox category" id="tablets">
                                    <label for="tablets">Планшеты</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox category" id="headphones">
                                    <label for="headphones">Наушники</label>
                                </div>
                            </div>
                            
                        </div>
            
                        <div class="filter">
                            <h1 class="title-filter">Бренд</h1>
                            <div class="checkboxes">
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox brand" id="samsung">
                                    <label for="samsung">Samsung</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox brand" id="apple">
                                    <label for="apple">Apple</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox brand" id="huawei">
                                    <label for="huawei">Huawei</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="custom-checkbox brand" id="xiaomi">
                                    <label for="xiaomi">Xiaomi</label>
                                </div>
                            </div>
                        </div>

                        <div class="filter">
                            <h1 class="title-filter">Цена</h1>
                            <div class="checkboxes">
                                <div class="checkbox">
                                    <input type="radio" class="custom-checkbox price-filter" id="increase" name="contact">
                                    <label for="increase">По возрастанию</label>
                                </div>
                                <div class="checkbox">
                                    <input type="radio" class="custom-checkbox price-filter" id="decrease" name="contact">
                                    <label for="decrease">По убыванию</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img class="show-filters" src="/img/show-filter.svg" alt="">
                    <div class="cards">
                        @foreach($products as $product)
                            <div class="card-product" id={{ $product->id  }}>
                                <img class="photo-product" src="data:image/png;base64,{{$product->photo_product}}">
                                <div class="description">
                                    <a class="link-product" href="product/{{ $product->id }}">
                                        <div class="info">
                                            <ul>
                                                <li class="type item-list-info">{{  $product->type_name  }}</li>
                                                <li class="name item-list-info" >{{ $product->name }}</li>
                                                <li class="price item-list-info">{{ $product->price }} $</li>
                                            </ul>
                                        </div>
                                    </a>
                                    <div class="btns">
                                        <div class="to-favorites">
                                            @if($product->is_in_favorites==0)
                                                <svg id="{{ $product->is_in_favorites }}" class="add-to-favorites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                            @else
                                                <svg id="{{ $product->is_in_favorites }}" class="add-to-favorites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>
                                            @endif
                                        </div>
                                        <div class="add-to-cart">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            
        </section>
        <section class="pagination-section">
            <div id="pagination-container"></div>
        </section>

    </main>

    
    
    


    <img src="./img/Line 2.svg" alt="" class="line">


    
    @include('layouts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js" integrity="sha512-9Dh726RTZVE1k5R1RNEzk1ex4AoRjxNMFKtZdcWaG2KUgjEmFYN3n17YLUrbHm47CRQB1mvVBHDFXrcnx/deDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/pagination.js"></script>
    <script src="/js/catalog.js"></script>

</body>
</html>