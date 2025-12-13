<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <a href="/login" class="header__button">register</a>
        </div>
    </header>

    <main class="main">
        <div class="login__content">
            <div class="login__header">
                <h2>Login</h2>
            </div>
            <form action="/login" class="form" method="post">
                @csrf
                <div class="form__label">メールアドレス</div>
                <div class="form__input">
                    <input class="form__input-text" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                @error('email')
                <div class="form__error" style="color: red; width: 70%; text-align: left;">
                    {{$message}}
                </div>
                @enderror
                <div class="form__label">パスワード</div>
                <div class="form__input">
                    <input class="form__input-text" type="password" name="password" placeholder="例: coachtech1106" value="{{ old('password') }}">
                </div>
                @error('password')
                <div class="form__error" style="color: red; width: 70%; text-align: left;">
                    {{$message}}
                </div>
                @enderror
                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>