@extends('layouts.main')
@section('title', 'Жертвователи')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="contributors">
        <div class="containers">
            <div class="contributors__t">Жертвователи</div>
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
            <div class="contributors__filter">
                <div class="contributors__filter-i">
                    <div class="contributors__filter-t">Дата </div>
                    <select class="c_select" name="select" style="display: none" onchange="sort($(this).val())">
                        <option value="new">Сначала новые</option>
                        <option value="old" selected="">Сначала старые</option>
                    </select>
                </div>
                <div class="contributors__filter-i">
                    <div class="contributors__filter-t">ФИО жертвователя </div>
                    <label class="custom-input-search__label"><img class="custom-input-search__icon" src="/assets/svg/components/search.svg">
                        <input class="custom-input-search__input" placeholder="Поиск по ФИО жертвователя" oninput="searchFio($(this).val())">
                    </label>
                </div>
                <div class="contributors__filter-i">
                    <div class="contributors__filter-t">Сумма  </div>
                    <select class="c_select" name="select" style="display: none" onchange="sort($(this).val())">
                        <option value="sum-high">От большей к меньшей</option>
                        <option value="sum-low" selected="">От меньшей к большей</option>
                    </select>
                </div>
                <div class="contributors__filter-i">
                    <div class="contributors__filter-t">Регион</div>
                    <label class="custom-input-search__label"><img class="custom-input-search__icon" src="/assets/svg/components/search.svg">
                        <input class="custom-input-search__input" placeholder="Поиск по региону" oninput="searchCity($(this).val())">
                    </label>
                </div>
            </div>
            <div class="contributors__list">
                @foreach($contributors as $contributor)
                <div class="contributors__item">
                    <div class="contributors__item-d">{{$contributor->id}}</div>
                    <div class="contributors__item-n">{{$contributor->getFio()}}</div>
                    <div class="contributors__item-p">{{$contributor->sum}} ₽</div>
                    <div class="contributors__item-c">{{$contributor->getCountry->name . ', ' . $contributor->city}}</div>
                    <div class="contributors__item-c">{{$contributor->created_at}}</div>
                </div>
                @endforeach
            </div>
            <div id="pagination-controls"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function sort(field){
            $.ajax({
                url: '/contributors/sort/'+field,
                type: "POST",
                data: {
                    field:field
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.contributors__list').html(data)
                },
                error: function(request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }

        function searchFio(query){
            $.ajax({
                url: '/contributors/search/'+query,
                type: "POST",
                data: {
                    query:query
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.contributors__list').html(data)
                },
                error: function(request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }

        function searchCity(query){
            $.ajax({
                url: '/contributors/search/city/'+query,
                type: "POST",
                data: {
                    query:query
                },
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.contributors__list').html(data)
                },
                error: function(request, status, error) {
                    //console.log(statusCode = request.responseText);
                }
            })
        }
    </script>
@endsection
