@extends('layouts.main')
@section('meta')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection
@section('title', 'Статистика')
@section('content')
    <div class="containers">
        <div class="profile-wrap">
            @include('includes.profile.menu')
            <div class="profile-content">
                <div class="stat-wrapper">
                    <div class="stat-block">
                        <div class="stat-title">Перешли по вашей ссылке</div>
                        <div class="stat-count">{{$user->getStat('transitions') ?? 0}}</div>
                    </div>

                    <div class="stat-block">
                        <div class="stat-title">Пожертвовали</div>
                        <div class="stat-count">{{$user->getStat('donated') ?? 0}}</div>
                    </div>

                    <div class="stat-block">
                        <div class="stat-title">Вы заработали</div>
                        <div class="stat-count">{{$user->getStat('earnings') ?? 0}} ₽</div>
                    </div>
                </div>
                <p class="ref-text">
                    Специально для вас создали партнерскую программу, по который вы можете зарабатывать.
                    <br>
                    Копируйте вашу индивидуальную ссылку
                    <br>
                    <span class="ref-link">
                        <span id="ref-link">{{env('APP_URL')}}?ref={{$user->id}}</span>
                        <img src="/assets/img/copy.png" onclick="copyToClipboard('#ref-link')" width="15px" alt="">
                    </span>
                    <br><br>
                    Отправляйте другу и получайте 10% от его платежей
                </p>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <style>
        .stat-wrapper{
            display: flex;
            gap:15px;
        }

        .stat-block{
            text-align: center;
            background-color: #ff8743;
            border-radius: 15px;
            padding: 10px;
        }

        .stat-title{
            font-family: "NunitoSans";
            font-weight: 400;
            color:#ffffff;
        }

        .stat-count{
            font-size: 14pt;
            font-family: "NunitoSans";
            font-weight: 900;
            margin-top: 10px;
        }

        .ref-text{
            font-family: "NunitoSans";
            margin-top: 15px;
        }

        .ref-link{
            font-family: "NunitoSans";
            padding: 5px;
            border-radius: 15px;
            border: 1px solid #ff8743;
            color: #ff8743;
            display: inline-block;
            margin-top: 15px;
        }

        .ref-link img{
            cursor: pointer;
        }
    </style>

    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $('.ref-link').css('border','1px solid #d5ba64');
            $('.ref-link').css('color','#d5ba64');
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection
