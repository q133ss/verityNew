@extends('layouts.main')
@section('title', 'Для волонтеров')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="for_volunteers-main">
        <div class="for_volunteers-main__banner"> <picture><source srcset="/assets/img/for_volunteers/banner.webp" type="image/webp"><img src="/assets/img/for_volunteers/banner.png"></picture></div>
        <div class="containers">
            <div class="for_volunteers-main__wrapper">
                <div class="for_volunteers-main__wrapper-t">Присоединяйтесь в нашу команду волонтеров</div>
                <div class="for_volunteers-main__wrapper-d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый о</div>
                <div class="for_volunteers-main__wrapper-f">
                    <div class="for_volunteers-main__wrapper-i">
                        <div class="for_volunteers-main__wrapper-l">Введите Ваше имя</div>
                        <input class="custom-input" id="name" placeholder="Имя">
                    </div>
                    <div class="for_volunteers-main__wrapper-i">
                        <div class="for_volunteers-main__wrapper-l">Введите номер телефона</div>
                        <label class="custom-input-phone__label"><img class="custom-input-phone__icon" src="/assets/svg/components/rus.svg">
                            <input class="custom-input-phone__input" id="phone__mask" placeholder="+7">
                        </label>
                    </div>
                    <button class="for_volunteers-main__wrapper-b" onclick="send()" id="buttonModalTxOpen">Стать волонтером</button>
                </div>
            </div>
        </div>
    </div>
    <div class="for_volunteers-description">
        <div class="containers">
            <div class="for_volunteers-description__wrapper">
                <div class="for_volunteers-description__photo"> <picture><source srcset="/assets/img/for_volunteers/desc.webp" type="image/webp"><img src="/assets/img/for_volunteers/desc.png"></picture></div>
                <div class="for_volunteers-description__content">
                    <div class="for_volunteers-description__content-t">Почему вам стоит обратить </div>
                    <div class="for_volunteers-description__content-d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Таким образом укрепление и развитие структуры позволяет оценить значение соответствующий условий </div>
                </div>
            </div>
        </div>
    </div>
    <div class="for_volunteers-plus">
        <div class="for_volunteers-plus__banner"> <picture><source srcset="/assets/img/for_volunteers/bg.webp" type="image/webp"><img src="/assets/img/for_volunteers/bg.png"></picture></div>
        <div class="for_volunteers-plus__wrapper">
            <div class="containers">
                <div class="for_volunteers-plus__header">
                    <div class="for_volunteers-plus__title">Почему вам стоит работать с нами?</div><a class="for_volunteers-plus__link" href="/">Стать частью команды</a>
                </div>
                <ul class="for_volunteers-plus__list">
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                    <li class="for_volunteers-plus__item">
                        <div class="for_volunteers-plus__item-c"> <img src="/assets/svg/for_volunteers/icon-1.svg"></div>
                        <div class="for_volunteers-plus__item-t">Преимущество</div>
                        <div class="for_volunteers-plus__item-d">Равным образом консультация с широким активом позволяет оценить значение</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="for_volunteers-question">
        <div class="containers">
            <div class="for_volunteers-question__title">Часто задаваемые вопросы</div>
            <div class="for_volunteers-question__list">
                <div class="for_volunteers-question__item">
                    <div class="accordion__block">
                        <div class="accordion__header">
                            <div class="accordion__title">Title</div>
                            <button class="accordion__close"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_109_179" fill="white">
                                        <path d="M21.2129 11.1421L10.6063 21.7487L-0.000312448 11.1421L10.6063 0.535488L21.2129 11.1421Z"/>
                                    </mask>
                                    <path d="M10.6063 21.7487L7.77786 24.5771L10.6063 27.4055L13.4347 24.5771L10.6063 21.7487ZM18.3845 8.31366L7.77786 18.9203L13.4347 24.5771L24.0413 13.9705L18.3845 8.31366ZM13.4347 18.9203L2.82811 8.31366L-2.82874 13.9705L7.77786 24.5771L13.4347 18.9203Z" fill="black" mask="url(#path-1-inside-1_109_179)"/>
                                </svg>
                            </button>
                        </div>
                        <div class="accordion__content">
                            <p>Text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-thx display-n" id="modalThx">
        <div class="modal-thx__wrapper">
            <div class="modal-thx__title">Спасибо!</div>
            <div class="modal-thx__text">Мы получили вашу заявку и скоро свяжемся с вами вдля уточнения деталей сотрудничества!</div>
            <button class="modal-thx__button" id="buttonModalThxClose">Назад</button>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function send() {
            let name = $('#name').val();
            let phone = $('#phone__mask').val();

            $.ajax({
                url: '/volunteers/order',
                type: "POST",
                data: {
                    name: name,
                    phone: phone
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    let name = $('name').val('')
                    let phone = $('phone').val('')
                    $("#modalThx").removeClass("display-n")
                    $("body").css("overflow","hidden")
                },
                error: function (request, status, error) {
                    console.log(statusCode = request.responseText);
                }
            })
        }
    </script>
@endsection
