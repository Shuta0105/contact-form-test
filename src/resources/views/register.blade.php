<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <a href="/login" class="header__button">login</a>
        </div>
    </header>

    <main class="main">
        <div class="register__content">
            <div class="register__header">
                <h2>Register</h2>
            </div>
            <form action="" class="form">
                <div class="form__label">お名前</div>
                <div class="form__input">
                    <input class="form__input-text" type="text" name="name" placeholder="例: 山田太郎" value="{{ old('name') }}">
                </div>
                <div class="form__label">メールアドレス</div>
                <div class="form__input">
                    <input class="form__input-text" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__label">パスワード</div>
                <div class="form__input">
                    <input class="form__input-text" type="password" name="password" placeholder="例: coachtech1106" value="{{ old('password') }}">
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>