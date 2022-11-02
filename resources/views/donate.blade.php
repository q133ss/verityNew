@extends('layouts.main')
@section('title', 'Пожертвовать')
@section('meta')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="donate-main">
        <div class="containers">
            <div class="donate-main__t">Пожертвовать</div>
            <div class="banners__slider">
                <div class="swiper volunteersSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="banners__slider-i">
                                <div class="banners__slider-bg"> <picture><source srcset="/assets/img/banners/banners-1.webp" type="image/webp"><img src="/assets/img/banners/banners-1.png"></picture></div>
                                <div class="banners__slider-c">
                                    <div class="banners__slider-subtitle">Подзаголовок</div>
                                    <div class="banners__slider-title">
                                        Проверьте своего <br>рекомендателя </div>
                                    <div class="banners__slider-text">Текст для второго подзаголовка  </div><a class="banners__slider-button" href="/">Проверить</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="banners__slider-i">
                                <div class="banners__slider-bg"> <picture><source srcset="/assets/img/banners/banners-2.webp" type="image/webp"><img src="/assets/img/banners/banners-2.png"></picture></div>
                                <div class="banners__slider-c">
                                    <div class="banners__slider-subtitle">Подзаголовок</div>
                                    <div class="banners__slider-title">
                                        Проверьте своего <br>рекомендателя </div>
                                    <div class="banners__slider-text">Текст для второго подзаголовка  </div><a class="banners__slider-button" href="/">Проверить</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="banners__slider-i">
                                <div class="banners__slider-bg"> <picture><source srcset="/assets/img/banners/banners-3.webp" type="image/webp"><img src="/assets/img/banners/banners-3.png"></picture></div>
                                <div class="banners__slider-c">
                                    <div class="banners__slider-subtitle">Подзаголовок</div>
                                    <div class="banners__slider-title">
                                        Проверьте своего <br>рекомендателя </div>
                                    <div class="banners__slider-text">Текст для второго подзаголовка  </div><a class="banners__slider-button" href="/">Проверить</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="banners__slider-i">
                                <div class="banners__slider-bg"> <picture><source srcset="/assets/img/banners/banners-4.webp" type="image/webp"><img src="/assets/img/banners/banners-4.png"></picture></div>
                                <div class="banners__slider-c">
                                    <div class="banners__slider-subtitle">Подзаголовок</div>
                                    <div class="banners__slider-title">
                                        Проверьте своего <br>рекомендателя </div>
                                    <div class="banners__slider-text">Текст для второго подзаголовка  </div><a class="banners__slider-button" href="/">Проверить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-controls">
                    <div class="swiper-button-next"><img src="/assets/svg/slider/arrow-next.svg"></div>
                    <div class="swiper-button-prev"><img src="/assets/svg/slider/arrow-prev.svg"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="donate-form">
        <div class="donate-form__banner"> <img src="/assets/svg/donate/bg.svg"></div>
        <div class="containers">
            <form action="{{route('contributors.payment')}}" method="POST">
                @csrf
            <div class="donate-form__wrapper">
                <div class="donate-form__t">Заполните информацию о себе</div>
                <div class="donate-form__d">Товарищи! реализация намеченных плановых заданий позволяет выполнять важные задания по разработке системы обучения</div>
                @if ($errors->any())
                    <span class="for_volunteers-plus__item-d" style="color:#f00; font-weight: 700;">{{ $errors->first() }}</span>
                @endif
                <div class="donate-form__blocks">
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Введите Вашу фамилию</div>
                        <input class="custom-input" value="{{old('lastname')}}" name="lastname" placeholder="Фамилия">
                    </div>
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Введите Ваше имя</div>
                        <input class="custom-input" value="{{old('name')}}" name="name" placeholder="Имя">
                    </div>
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Введите Ваше Отчество </div>
                        <input class="custom-input" value="{{old('patronymic')}}" name="patronymic" placeholder="Отчество">
                    </div>
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Введите номер телефона</div>
                        <label class="custom-input-phone__label"><img class="custom-input-phone__icon" src="/assets/svg/components/rus.svg">
                            <input class="custom-input-phone__input" value="{{old('phone')}}" id="phone__mask" name="phone" placeholder="+7">
                        </label>
                    </div>
                    <div class="donate-form__item">
                        <div class="donate-form__item-l">Введите вашу почту</div>
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
                    @if(request()->session()->get('ref') != null)
                        <input type="hidden" name="recommender_id" value="{{request()->session()->get('ref')}}">
                    @else
                    <div class="donate-form__item">
                        <div class="donate-form__item-h">
                            <div class="donate-form__item-l">Выберите рекомендателя</div><a class="donate-form__item-a" href="#")">у меня нет рекомендателя</a>
                        </div>
                        <select class="c_select" name="recommender_id" style="display: none">
                            <option>Выберите рекомендателя</option>
                            <option value="" id="no-recommend" selected="">Нет рекомендателя</option>
                            @foreach($recommends as $recommend)
                            <option value="{{$recommend->id}}" selected="">{{$recommend->getFio()}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
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
                            <span class="recom-btn" onclick="changeSum(10000)">10000</span>
                            <span class="recom-btn" onclick="changeSum(25000)">25000</span>
                            <span class="recom-btn" onclick="changeSum(50000)">50000</span>
                            <span class="recom-btn" onclick="changeSum(100000)">100000</span>
                            <span class="recom-btn" onclick="changeSum(300000)">300000</span>
                            <span class="recom-btn" onclick="changeSum(500000)">500000</span>
                            <span class="recom-btn" onclick="changeSum(1000000)">1000000</span>
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
        .recom-price{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

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
