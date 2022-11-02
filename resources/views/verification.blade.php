@extends('layouts.main')
@section('title', 'Проверка сертификата')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="verification-main">
        <div class="containers">
            <div class="verification-main__t">Проверка сертификата</div>
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
    <div class="verification-form">
        <div class="containers">
            <div class="verification-form__wrapper">
                <div class="verification-form__item">
                    <div class="verification-form__element">
                        <div class="verification-form__element-l">Проверка по номеру сертификата</div>
                        <input class="custom-input" id="number" placeholder="Введите 12 цифр номера сертификата">
                    </div>
                    <button class="verification-form__button" onclick="checkNumber($('#number').val())">Проверить</button>
                </div>
                <div class="verification-form__item">
                    <div class="verification-form__element">
                        <div class="verification-form__element-l">Проверка по номеру телефона</div>
                        <label class="custom-input-phone__label"><img class="custom-input-phone__icon" src="/assets/svg/components/rus.svg">
                            <input class="custom-input-phone__input" id="phone__mask" placeholder="+7">
                        </label>
                    </div>
                    <button class="verification-form__button" onclick="checkPhone($('#phone__mask').val())">Проверить</button>
                </div>
                <div class="verification-form__item">
                    <div class="verification-form__element">
                        <div class="verification-form__element-l">Проверка по ФИО</div>
                        <div class="verification-form__element-list">
                            <input class="custom-input" id="lastname" placeholder="Фамилия">
                            <input class="custom-input" id="name" placeholder="Имя">
                            <input class="custom-input" id="patronymic" placeholder="Отчество">
                        </div>
                    </div>
                    <button class="verification-form__button" onclick="checkFio()">Проверить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="containers" id='ajax-message'>

    </div>
    <div class="verification-description">
        <div class="containers">
            <div class="verification-description__wrapper">
                <div class="verification-description__t">Почему важно проверять сертификат на подлинность?</div>
                <div class="verification-description__d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Таким образом укрепление и развитие структуры позволяет оценить значение соответствующий </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function checkNumber(number){
            $.ajax({
                url: '/certificate/check/',
                type: "POST",
                data: {
                    number: number
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('#ajax-message').html(data)
                },
                error: function (request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }

        function checkPhone(phone){
                $.ajax({
                    url: '/certificate/check/',
                    type: "POST",
                    data: {
                        phone: phone
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('#ajax-message').html(data)
                    },
                    error: function (request, status, error) {
                        //console.log(statusCode = request.responseText);
                    }
                })
        }

        function checkFio(){
            let lastname = $('#lastname').val()
            let name = $('#name').val()
            let patronymic = $('#patronymic').val()

            $.ajax({
                url: '/certificate/check/',
                type: "POST",
                data: {
                    lastname:lastname,
                    name:name,
                    patronymic:patronymic
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('#ajax-message').html(data)
                },
                error: function (request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }
    </script>
@endsection
