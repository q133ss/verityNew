@extends('layouts.main')
@section('title', 'Профиль')
@section('meta')
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="containers">
        <div class="profile-wrap">
            @include('includes.profile.menu')
            <div class="profile-content">
                @if ($errors->any())
                    <span class="for_volunteers-plus__item-d" style="color:#f00; font-weight: 700;">{{ $errors->first() }}</span>
                @endif

                @if(session()->has('success'))
                    <span class="for_volunteers-plus__item-d" style="color:#446a4c; font-weight: 700;">{{ session()->get('success') }}</span>
                @endif
                <form action="{{route('profile.update')}}" method="POST">
                    @csrf
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Фамилия</div>
                        <input class="custom-input" value="{{$user->lastname}}" name="lastname" placeholder="Фамилия">
                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Имя</div>
                        <input class="custom-input" value="{{$user->name}}" name="name" placeholder="Имя">
                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Отчество</div>
                        <input class="custom-input" value="{{$user->patronymic}}" name="patronymic" placeholder="Отчество">
                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Город</div>
{{--                        <input class="custom-input" value="{{$user->city}}" name="city" placeholder="Город">--}}

                        <select name="city" id="" class="js-data-example-ajax custom-input">
                            <option value="{{$user->city}}">{{$user->city}}</option>
                        </select>

                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Email</div>
                        <input class="custom-input" value="{{$user->getSocial('email')}}" name="email" placeholder="Email">
                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Telegram</div>
                        <input class="custom-input" value="{{$user->getSocial('telegram')}}" name="telegram" placeholder="Telegram">
                    </div>

                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Whatsapp</div>
                        <input class="custom-input" value="{{$user->getSocial('whatsapp')}}" name="whatsapp" placeholder="Whatsapp">
                    </div>

                    <button class="header__banner-b save-btn" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#country_input').select2({
            minimumInputLength: 3, // only start searching when the user has input 3 or more characters
            language: {
                inputTooShort: function () {
                    return "Введите минимум 3 символа";
                },
                noResults: function () {
                    return 'Ничего не найдено';
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".js-data-example-ajax").select2({
                ajax: {
                    url: function (params) {
                        return "http://geodb-free-service.wirefreethought.com/v1/geo/cities?offset=0&namePrefix="+ params.term +"&languageCode=ru";
                    },
                    dataType: 'json',
                    quietMillis: 100,
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                console.log(typeof(item))
                                return {
                                    'value': item.id,
                                    'id': item.id,
                                    'text': item.name
                                };
                            })
                        };
                    }
                }
            });
        });

    </script>

    <style>
        .recom-btn{
            background-color:#d5ba64;
            cursor: pointer;
            border-radius: 50px;
            padding: 3px 15px 0 15px;
            color: #ffffff;
        }
    </style>

    <script>
        function changeSum(sum){
            $('#sum-input').val(sum)
        }
    </script>
@endsection
