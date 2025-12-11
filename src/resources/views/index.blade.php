@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__header">
        <h2>Contact</h2>
    </div>
    <form action="" class="form">
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--name" type="text" name="last_name" placeholder="例: 山田" value="{{ old('name') }}">
                <input class="form__input--name" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <div class="form__input-gender">
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="male">男性</label>
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="female">女性</label>
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="other">その他</label>
                </div>

            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--email" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--tel" type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                <span class="form__input--dash">-</span>
                <input class="form__input--tel" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                <span class="form__input--dash">-</span>
                <input class="form__input--tel" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--text" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">建物名</span>
            </div>
            <div class="form__input">
                <input class="form__input--text" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <select class="form__select" name="category">
                <option class="form__select-item" value="">選択してください</option>
                <option class="form__select-item" value="1">商品のお届けについて</option>
                <option class="form__select-item" value="2">商品の交換について</option>
                <option class="form__select-item" value="3">商品トラブル</option>
                <option class="form__select-item" value="4">ショップへのお問い合わせ</option>
                <option class="form__select-item" value="5">その他</option>
            </select>
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <textarea class="form__input--textarea" name="detail" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection