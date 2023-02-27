
@if(Auth::check())
    <link rel="stylesheet" href="/css/panel_profile.css">

    <div class="panel-profile">
        <div class="container-panel">
            <h1 class="user-name">{{ Auth::user()->name }}</h1>
        </div>
        <img src="/img/line.svg" alt="">
        <div class="container-panel">
            <div class="section-list">
                <ul class="list-profile">
                    <li class="section-list-profile"><img src="/img/delivery.svg" alt=""><a href="/profile?section=delivery-box"><span>Доставки</span></a></li>
                    <li class="section-list-profile"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M19.697 9.316c0-.685-.56-1.244-1.244-1.244H1.547c-.684 0-1.244.56-1.244 1.244 0 .581.406 1.069.948 1.203l1.715 8.114A1.37 1.37 0 0 0 4.332 20h11.56a1.37 1.37 0 0 0 1.366-1.367l1.734-8.202c.415-.202.705-.625.705-1.115ZM5.89 17.048a.428.428 0 0 1-.428.427h-.117a.428.428 0 0 1-.427-.427v-4.999c0-.235.192-.427.427-.427h.117c.235 0 .428.192.428.427v4.999Zm3.126 0a.428.428 0 0 1-.427.427h-.118a.428.428 0 0 1-.427-.427v-4.999c0-.235.192-.427.427-.427h.118c.235 0 .427.192.427.427v4.999Zm3.127 0a.428.428 0 0 1-.427.427h-.118a.428.428 0 0 1-.427-.427v-4.999c0-.235.192-.427.427-.427h.118c.235 0 .427.192.427.427v4.999Zm3.127 0a.428.428 0 0 1-.427.427h-.118a.428.428 0 0 1-.427-.427v-4.999c0-.235.192-.427.427-.427h.118c.235 0 .427.192.427.427v4.999ZM4.523 6a5.564 5.564 0 0 1 5.504-4.77A5.564 5.564 0 0 1 15.531 6c.056.921 1.242.774 1.242 0a6.795 6.795 0 0 0-6.746-6 6.795 6.795 0 0 0-6.746 6c0 .958 1.257.995 1.242 0Z"/></svg><a href="/profile?section=purchases-box"><span>Покупки</span></a></li>
                    <li class="section-list-profile"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none"><path fill="#fff" d="M14.995 0A5.001 5.001 0 0 1 20 4.999c0 4.76-4.538 7.288-9.287 11.835a1.038 1.038 0 0 1-1.432 0C4.532 12.287 0 9.758 0 5A5 5 0 0 1 4.999 0c2.499 0 3.748 1.25 4.998 3.749 1.25-2.5 2.5-3.749 4.998-3.749Z"/></svg><a href="/profile?section=favorites-box"><span>Избранное</span></a></li>
                    <li class="section-list-profile"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" fill="none"><path fill="#fff" d="M1.226 24h16.548C18.45 24 19 23.45 19 22.774V17.5a.5.5 0 0 0-1 0v5.274a.227.227 0 0 1-.226.226H1.226A.227.227 0 0 1 1 22.774V2.226C1 2.102 1.102 2 1.226 2h1.866c.207.581.757 1 1.408 1h10c.651 0 1.201-.419 1.408-1h1.866c.124 0 .226.102.226.226v3.839a.5.5 0 0 0 1 0V2.226C19 1.55 18.45 1 17.774 1h-1.866c-.207-.581-.757-1-1.408-1h-10c-.651 0-1.201.419-1.408 1H1.226C.55 1 0 1.55 0 2.226v20.549C0 23.45.55 24 1.226 24ZM4.5 1h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1 0-1Z"/><path fill="#fff" d="M15 7.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0 0 1h10a.5.5 0 0 0 .5-.5ZM12.286 12.5a.5.5 0 0 0-.5-.5H4.5a.5.5 0 0 0 0 1h7.286a.5.5 0 0 0 .5-.5ZM4.5 17a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5Z"/><path stroke="#fff" d="M18.5 5v13"/></svg><a href="/profile?section=personal-data-box"><span>Личные данные</span></a></li>
                </ul>
            </div>
        </div>
        <img src="/img/line.svg" alt="">
        <div class="container-panel">
            <h1 class="exit-panel"><a href="/logout">Выйти</a></h1>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/panel_profile.js"></script>
@endif
