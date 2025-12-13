@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__header">
        <h2>Contact</h2>
    </div>
    <form action="/confirm" class="form" method="post">
        @csrf
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--name" type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                <input class="form__input--name" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="form__error--name" style="display: flex; width: 70%; margin-left: 30%">
            @error('last_name')
            <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: left; width: 50%;">
                {{$message}}
            </div>
            @enderror
            @error('first_name')
            <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: left; width: 50%">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <div class="form__input-gender">
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="1"
                            {{ old('gender') == 1 ? 'checked' : '' }}>
                        男性
                    </label>
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="2"
                            {{ old('gender') == 2 ? 'checked' : '' }}>
                        女性
                    </label>
                    <label class="form__label--radio"><input class="form__input--radio" type="radio" name="gender" value="3"
                            {{ old('gender') == 3 ? 'checked' : '' }}>
                        その他
                    </label>
                </div>
            </div>
        </div>
        @error('gender')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 80%;">
            {{$message}}
        </div>
        @enderror
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--email" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        @error('email')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 90%;">
            {{$message}}
        </div>
        @enderror
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
        @error('tel1')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 80%;">
            {{$message}}
        </div>
        @enderror
        @error('tel2')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px">
            {{$message}}
        </div>
        @enderror
        @error('tel3')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px">
            {{$message}}
        </div>
        @enderror
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <input class="form__input--text" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>
        @error('address')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 80%;">
            {{$message}}
        </div>
        @enderror
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
            <select class="form__select" name="category_id">
                <option class="form__select-item" value="">選択してください</option>
                @foreach ($categories as $category)
                <option class="form__select-item" value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 90%;">
            {{$message}}
        </div>
        @enderror
        <div class="form__group">
            <div class="form__label">
                <span class="form__label--text">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
                <textarea class="form__input--textarea" name="detail" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
            </div>
        </div>
        @error('detail')
        <div style="color: red; margin-bottom: 30px; margin-top: -20px; text-align: center; width: 90%;">
            {{$message}}
        </div>
        @enderror
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection