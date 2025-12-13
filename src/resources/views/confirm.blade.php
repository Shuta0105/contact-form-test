@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__header">
        <h2>Confirm</h2>
    </div>

    <div class="confirm-table">
        <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="name" value="{{ $form['last_name'] . '   ' . $form['first_name'] }}" readonly>
                    <input type="hidden" name="last_name" value="{{ $form['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $form['first_name'] }}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__item">
                    @if ($form['gender'] == 1)
                    <input class="confirm-table__item-input" type="text" value="男性" readonly>
                    @elseif ($form['gender'] == 2)
                    <input class="confirm-table__item-input" type="text" value="女性" readonly>
                    @else
                    <input class="confirm-table__item-input" type="text" value="その他" readonly>
                    @endif
                    <input type="hidden" name="gender" value="{{ $form['gender'] }}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="email" value="{{ $form['email'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="tel" value="{{ $form['tel'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="address" value="{{ $form['address'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="building" value="{{ $form['building'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__item">
                    <input class="confirm-table__item-input" type="text" name="category_name" value="{{ $form['category_name'] }}" readonly>
                    <input type="hidden" name="category_id" value="{{ $form['category_id'] }}">
                </td>
            </tr>
            <tr class="confirm-table__row confirm-table__row--textarea">
                <th class="confirm-table__header confirm-table__header--textarea">お問い合わせ内容</th>
                <td class="confirm-table__item confirm-table__item--textarea">
                    <textarea class="confirm-table__item-input--textarea" type="text" name="detail" readonly>{{ $form['detail'] }}</textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="form__content">
        <form action="/thanks" class="form" method="post">
            @csrf
            @foreach ($form as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="form__button">
                <button class="form__button--submit" type="submit">送信</button>
            </div>
        </form>
        <form action="/modify" class="modify__form" method="post">
            @csrf
            @foreach ($form as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="form__button">
                <button class="form__button--modify">修正</button>
            </div>
        </form>
    </div>

</div>
@endsection