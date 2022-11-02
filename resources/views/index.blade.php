<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css?_v=20221017195015" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?_v=20221017195015" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js?_v=20221017195015" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css?_v=20221017195015" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js?_v=20221017195015" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css?_v=20221017195015" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js?_v=20221017195015" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.4/swiper-bundle.min.css?_v=20221017195015" integrity="sha512-V5B6OaBftIs7Kx8BBx7n2W42FpHP7MiXmDaKWTBdCsnStyS3gVYuA30kG6oABmh8uayFJDsfl2hCywak1eKE2w==" crossorigin="anonymous" referrerpolicy="no-referrer">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js?_v=20221017195015"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.4/swiper-bundle.min.js?_v=20221017195015" integrity="sha512-ztZ7m9gYJmuwemu0TmAp9QDuhFhOYbbIoN6iIKMi5ay88l8U5tkt5OOlA/fP8DI/p/OphEY7QIbuoDQKpVvf7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="/assets/css/style.min.css?_v=20221017195015">
</html>
<body></body>
<header class="header">
    <div class="header__wrapper header__wrapper-white">
        <div class="containers"> <a class="header__logo" href="/"> <picture><source srcset="/assets/img/header/logo-white.webp" type="image/webp"><img src="/assets/img/header/logo-white.png"></picture></a>
            <div class="header__navs">
                <nav class="header__nav header__nav-a"> <a href="/">Главная</a></nav>
                <nav class="header__nav"> <a href="{{route('donate')}}">Пожертвовать</a></nav>
                <nav class="header__nav"> <a href="{{route('volunteers')}}">Волонтеры</a></nav>
                <nav class="header__nav"><a href="{{route('contributors')}}">Жертвователи</a></nav>
                <nav class="header__nav"><a href="{{route('verification')}}">Проверка сертификата</a></nav>
                <nav class="header__nav"> <a href="{{route('for.volunteers')}}">Для волонтеров</a></nav>
                @if(Auth()->check())
                    <nav class="header__nav"> <a href="{{route('profile.index')}}">Профиль</a></nav>
                @else
                    <nav class="header__nav"> <a href="{{route('login')}}">Вход</a></nav>
                @endif
            </div>
            <div class="header__lang">
                <select class="clang_select clang_select-white" name="lang" style="display: none">
                    <option data-icon="/assets/svg/header/rus.svg" value="default" selected="">Русский</option>
                    <option data-icon="/assets/svg/header/rus.svg" value="default" selected="">Русский1</option>
                    <option data-icon="/assets/svg/header/rus.svg" value="default" selected="">Русский2</option>
                </select>
            </div>
        </div>
    </div>
    <div class="header__banner">
        <div class="containers">
            <div class="header__banner-t">Проверьте ваш сертификат чтобы убедиться что он выдан  что то там что то там оверьте ваш сертификат чтобы убедиться что </div><a class="header__banner-b" href="{{route('verification')}}">Проверить</a>
        </div>
    </div>
</header>
<div class="main-banner">
    <div class="main-banner__bg"> <picture><source srcset="/assets/img/main/banner.webp" type="image/webp"><img src="/assets/img/main/banner.png"></picture></div>
    <div class="main-banner__wrapper">
        <div class="containers">
            <div class="main-banner__blocks">
                <div class="main-banner__content">
                    <div class="main-banner__content-t">Проект, который сделает этот мир лучше</div>
                    <div class="main-banner__content-d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый о</div><a class="main-banner__content-b" href="/">Внести свой вклад</a>
                </div>
                <div class="main-banner__video">
                    <div class="main-banner__video-t">Посмотрите короткое видео, чтобы понять нашу идею и ценности</div>
                    <div class="main-banner__video-d"> <img src="/assets/svg/main/arrow-decor.svg"></div>
                    <div class="main-banner__video-v">
                        <video poster="image" loop="loop" controls="controls" tabindex="0">
                            <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-description">
    <div class="containers">
        <div class="main-description__banner"> <picture><source srcset="/assets/img/main/desc.webp" type="image/webp"><img src="/assets/img/main/desc.png"></picture></div>
        <div class="main-description__content">
            <div class="main-description__content-t">Почему вам стоит </div>
            <div class="main-description__content-d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Таким образом укрепление и развитие структуры позволяет оценить значение соответствующий условий </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer__bg"> <img src="/assets/svg/bg.svg"></div>
    <div class="footer__over"><picture><source srcset="/assets/img/footer/banner.webp" type="image/webp"><img src="/assets/img/footer/banner.png"></picture></div>
    <div class="footer__banner">
        <div class="containers">
            <div class="footer__banner-t">
                Цепляющий заголовок в <br>подвале</div><a class="footer__banner-b" href="{{route('donate')}}">Пожертвовать</a>
        </div>
    </div>
    <div class="footer__line"> </div>
    <div class="footer__main">
        <div class="containers">
            <div class="footer__main-d"> <a class="footer__main-logo" href="/"> <picture><source srcset="/assets/img/footer/logo.webp" type="image/webp"><img src="/assets/img/footer/logo.png"></picture></a>
                <div class="footer__main-t">Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров.</div>
            </div>
            <div class="footer__main-list">
                <div class="footer__main-title">Пункт</div>
                <ul class="footer__main-l">
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                </ul>
            </div>
            <div class="footer__main-list">
                <div class="footer__main-title">Пункт</div>
                <ul class="footer__main-l">
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                </ul>
            </div>
            <div class="footer__main-list">
                <div class="footer__main-title">Пункт</div>
                <ul class="footer__main-l">
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                </ul>
            </div>
            <div class="footer__main-list">
                <div class="footer__main-title">Пункт</div>
                <ul class="footer__main-l">
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                    <li class="footer__main-i"> <a href="/">Пункт</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__line"> </div>
    <div class="footer__project">
        <div class="footer__project-name">ООО ..........................</div>
    </div>
</footer>
<script type="module" src="/assets/js/app.min.js?_v=20221017195015"></script>
