@extends('layouts.main')
@section('title', 'Оформить сертификат')
@section('meta')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection
@section('content')
    <div class="containers">
        <div class="profile-wrap">
            @include('includes.profile.menu')
            <div class="profile-content">
                <form action="{{route('contributors.payment')}}" method="POST">
                    @csrf
                    <div class="">
                        @if ($errors->any())
                            <span class="for_volunteers-plus__item-d" style="color:#f00; font-weight: 700;">{{ $errors->first() }}</span>
                        @endif
                        <div class="">
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите фамилию</div>
                                <input class="custom-input" value="{{old('lastname')}}" name="lastname" placeholder="Фамилия">
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите имя</div>
                                <input class="custom-input" value="{{old('name')}}" name="name" placeholder="Имя">
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите Отчество </div>
                                <input class="custom-input" value="{{old('patronymic')}}" name="patronymic" placeholder="Отчество">
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите номер телефона</div>
                                <label class="custom-input-phone__label"><img class="custom-input-phone__icon" src="/assets/svg/components/rus.svg">
                                    <input class="custom-input-phone__input" value="{{old('phone')}}" id="phone__mask" name="phone" placeholder="+7">
                                </label>
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите почту</div>
                                <input class="custom-input" value="{{old('email')}}" name="email" placeholder="mail@mail.ru">
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Выберите страну</div>
                                <select name="country_id" class="custom-input" id="country_input">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите регион</div>
                                {{--                        <input class="custom-input" value="{{old('city')}}" name="city" placeholder="Город / Село / Поселок">--}}
                                {{--                        <input type="text" name="city" class="js-data-example-ajax custom-input">--}}
                                <select name="city" id="" class="js-data-example-ajax custom-input">
                                    <option value="Москва">Москва</option>
                                </select>

                            </div>
                            <input type="hidden" name="recommender_id" value="{{Auth()->id()}}">
                            <div class="donate-form__item">
                                <div class="donate-form__item-l">Введите сумму пожертвования</div>
                                <label class="custom-input-rub__label">
                                    <div class="custom-input-rub__text">₽</div>
                                    <input class="custom-input-rub__input" id="sum-input" value="{{old('sum')}}" name="sum" placeholder="">
                                </label>

                                <div class="recom-price">
                                    <span class="recom-btn" onclick="changeSum(1000)">1000</span>
                                    <span class="recom-btn" onclick="changeSum(3000)">3000</span>
                                    <span class="recom-btn" onclick="changeSum(5000)">5000</span>
                                </div>

                            </div>
                        </div>
                        <div class="donate-form__checkboxs">
                            <div class="checkbox">
                                <input class="checkbox__input" type="checkbox" id="1">
                                <label class="checkbox__label" for="1">Согласен с политикой обработки персональных данных, договором офертой  и условиями использования</label>
                            </div>
                            <div class="checkbox">
                                <input class="checkbox__input" type="checkbox" id="2">
                                <label class="checkbox__label" for="2">Согласен с политикой обработки персональных данных, правилами предоставления услуг по подписке, офертой рекуррентных платежей, договором-офертой и условиями использования</label>
                            </div>
                        </div>
                        <button type="submit" class="donate-form__button">Пожертвовать</button>
                    </div>
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
