@extends('layouts.main')
@section('title', 'Волонтеры')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="volunteers-recom">
        <div class="containers">
            <div class="volunteers-recom__t">Волонтеры</div>
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
            <div class="volunteers-recom__d">Равным образом консультация с широким активом позволяет оценить значение дальнейших направлений развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Таким образом укрепление и развитие структуры позволяет оценить значение соответствующий </div>
            <div class="volunteers-recom__filter">
                <div class="volunteers-recom__filter-i">
                    <select class="c_select" name="select" style="display: none" onchange="sort($(this).val())">
                        <option value="lastname">Сортировка по фамилии</option>
                        <option value="name" selected="">Сортировка по имени</option>
                        <option value="patronymic" selected="">Сортировка по отчеству</option>
                    </select>
                </div>
                <div class="volunteers-recom__filter-i">
                    <label class="custom-input-search__label"><img class="custom-input-search__icon" src="/assets/svg/components/search.svg">
                        <input class="custom-input-search__input" placeholder="Поиск по ФИО" oninput="search($(this).val())">
                    </label>
                </div>
                <div class="volunteers-recom__filter-i">
                    <label class="custom-input-search__label"><img class="custom-input-search__icon" src="/assets/svg/components/search.svg">
                        <input class="custom-input-search__input" placeholder="Поиск по региону" oninput="searchCity($(this).val())">
                    </label>
                </div>
            </div>
            <ul class="volunteers-recom__list">
                @foreach($volunteers as $letter => $letterVolunteer)
                <li class="volunteers-recom__list-i">
                    <div class="volunteers-recom__list-t">{{$letter}}</div>
                    <div class="volunteers-recom__list-peoples">
                        @foreach($letterVolunteer as $volunteer)
                        <div class="cardUser">
                            <div class="cardUser__photo"> <picture><source srcset="@if($volunteer->photo) {{$volunteer->photo}} @else /assets/img/volunteers/people.webp @endif" type="image/webp"><img src="/assets/img/volunteers/people.png"></picture></div>
                            <div class="cardUser__content">
                                <div class="cardUser__content-n">{{$volunteer->getFio()}}</div>
                                <div class="cardUser__content-j">{{$volunteer->city}}</div>
                                <div class="cardUser__content-socials">
                                    @foreach($volunteer->getSocials() as $key => $social)
                                        <a class="cardUser__content-s" @if($key == 'email') href="mailto:{{$social}}" @else href="{{$social}}" target="_blank" @endif>
                                            <picture>
                                                @if($key != 'email')
                                                    <source srcset="/assets/img/volunteers/{{$key}}.webp" type="image/webp">
                                                    <img src="/assets/img/volunteers/{{$key}}.png">
                                                @elseif($key == 'email')
                                                    <source srcset="/assets/img/volunteers/mail.webp" type="image/webp">
                                                    <img src="/assets/img/volunteers/mail.png">
                                                @endif
                                            </picture>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function sort(field){
            $.ajax({
                url: '/volunteers/sort/'+field,
                type: "POST",
                data: {
                    field:field
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.volunteers-recom__list').html(data)
                },
                error: function(request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }

        function search(request){
            $.ajax({
                url: '/volunteers/search/'+request,
                type: "POST",
                data: {
                    request:request
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.volunteers-recom__list').html(data)
                },
                error: function(request, status, error) {
                    console.log(statusCode = request.responseText);
                }
            })
        }

        function searchCity(city){
            $.ajax({
                url: '/volunteers/search/city/'+city,
                type: "POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.volunteers-recom__list').html(data)
                },
                error: function(request, status, error) {
                    console.log(statusCode = request.responseText);
                }
            })
        }
    </script>
@endsection
