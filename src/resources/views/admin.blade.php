<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <a href="/login" class="header__button">logout</a>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__header">
                <h2>Admin</h2>
            </div>
            <form action="" class="form">
                <div class="form__input">
                    <input class="form__input--text" type="text" placeholder="名前やメールアドレスを入力してください">
                </div>
                <select class="form__select">
                    <option value="">性別</option>
                    <option value="">男性</option>
                    <option value="">女性</option>
                    <option value="">その他</option>
                </select>
                <select class="form__select">
                    <option value="">お問い合わせの種類</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
                <div class="form__input">
                    <input class="form__input--date" type="date" placeholder="年/月/日">
                </div>
                <div class="form__button">
                    <button class="form__button--submit" type="submit">検索</button>
                </div>
                <div class="form__button">
                    <button class="form__button--reset">リセット</button>
                </div>
            </form>
            <div class="admin__page">
                <div class="admin__page-export">エクスポート</div>
            </div>
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                    </tr>
                    <tr class="admin-table__row">
                        <td class="admin-table__item">山田太郎</td>
                        <td class="admin-table__item">男性</td>
                        <td class="admin-table__item">test@example.com</td>
                        <td class="admin-table__item">商品の交換について</td>
                        <td class="admin-table__item">
                            <a href="" class="admin-table__detail">詳細</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>