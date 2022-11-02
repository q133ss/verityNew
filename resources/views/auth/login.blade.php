@extends('layouts.main')
@section('title', 'Вход')
@section('content')
    <div class="donate-form">
        <div class="donate-form__banner"> <img src="/assets/svg/donate/bg.svg"></div>
        <div class="containers">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="donate-form__wrapper">
                    <div class="donate-form__t">Вход</div>
                    @if ($errors->any())
                        <span class="for_volunteers-plus__item-d" style="color:#f00; font-weight: 700;">{{ $errors->first() }}</span>
                    @endif
                    <div class="donate-form__blocks">
                        <div class="donate-form__item">
                            <div class="donate-form__item-l">Введите вашу почту</div>
                            <input class="custom-input" value="{{old('email')}}" name="email" placeholder="mail@mail.ru">
                        </div>
                        <div class="donate-form__item">
                            <div class="donate-form__item-l">Введите ваш пароль</div>
                            <input class="custom-input" value="" type="password" name="password" placeholder="*********">
                        </div>
                    </div>
                    <button type="submit" class="donate-form__button">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection
