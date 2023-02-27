<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	{{-- <link rel="stylesheet" type="text/css" href="slide navbar style.css"> --}}
    <link rel="stylesheet" href="/css/login.css">
{{-- <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet"> --}}
</head>
<body>
	<div class="main"> 
        <script>
            var errors={!! json_encode($errors->all()) !!}
        </script>
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form class="form-sign-up" method="POST" action="http://127.0.0.1:8000/login">
                    @csrf
					<label for="chk" aria-hidden="true">Авторизация</label>
                    <div class="input-box">
                        <input class="input-form" id="email" value="{{ old('email') }}" type="email" name="email" required="required" autocomplete="do-not-autofill" autofocus="autofocus" placeholder=" ">
                        <label class="label-for-input-form" for="email">Почта</label>
                    </div>
                    <div class="input-box">
                        <input class="input-form" id="password" type="password" name="password" required="required" autocomplete="current-password" placeholder=" ">
                        <label class="label-for-input-form" for="password">Пароль</label>
                    </div>
					<button>Войти</button>
				</form>
			</div>

			<div class="login">
				<form class="form-login" method="POST" action="http://127.0.0.1:8000/register">
                    @csrf
					<label class="label-for-login" for="chk" aria-hidden="true">Регистрация</label>
                    <div class="input-box">
                        <input class="input-form" id="name" type="text" name="name" value="{{ old('name') }}" required="required" autofocus="autofocus" placeholder=" ">
                        <label class="label-for-input-form" for="name">Имя</label>
                    </div>
                    <div class="input-box">
                        <input class="input-form" id="email" type="email" name="email" required="required" placeholder=" " value="{{ old('email') }}">
                        <label class="label-for-input-form" for="email">Почта</label>
                    </div>
                    <div class="input-box">
                        <input class="input-form" id="password" type="password" name="password" required="required" autocomplete="new-password" placeholder=" ">
                        <label class="label-for-input-form" password="name">Пароль</label>
                    </div>
                    <div class="input-box">
                        <input class="input-form" id="password_confirmation" type="password" name="password_confirmation" required="required" placeholder=" ">
                        <label class="label-for-input-form" for="confirm-password">Повторите пароль</label>
                    </div>
                    <span class="password-mismatch">Пароли не совпадают</span>
					<button>Зарегистрироваться</button>
				</form>
			</div>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/login.js"></script>
</body>
</html>