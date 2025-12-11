@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__header">
        <h2>Confirm</h2>
    </div>
    <form action="" class="form">
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="name" value="山田太郎" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="gender" value="男性" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="email" value="test@example.com" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="tel" value="08012345678" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="address" value="東京都渋谷区千駄ヶ谷1-2-3" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="building" value="千駄ヶ谷マンション101" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__item">
                        <input class="confirm-table__item-input" type="text" name="category" value="商品の交換について" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row confirm-table__row--textarea">
                    <th class="confirm-table__header confirm-table__header--textarea">お問い合わせ内容</th>
                    <td class="confirm-table__item confirm-table__item--textarea">
                        <textarea class="confirm-table__item-input--textarea" type="text" name="detail" readonly>届いた商品が注文した商品ではありませんでした。商品の取り換えをお願いします。</textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button--submit" type="submit">送信</button>
            <a href="/" class="form__button--modify">修正</a>
        </div>
    </form>

</div>
@endsection