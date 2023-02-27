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

    @include('layouts.footer')

</body>
</html>