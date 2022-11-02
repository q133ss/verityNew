@extends('layouts.main')
@section('title', 'Мои жертвователи')
@section('meta')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection
@section('content')
    <div class="containers">
        <div class="profile-wrap">
            @include('includes.profile.menu')
            <div class="profile-content">
                <div class="contributors__list">
                    @foreach($contributors as $key => $contributor)
                    <div class="contributors__item" style="">
                        <div class="contributors__item-d">{{$key+1}}</div>
                        <div class="contributors__item-n">{{$contributor->getFio()}}</div>
                        <div class="contributors__item-p">{{$contributor->sum}} ₽</div>
                        <div class="contributors__item-c">{{$contributor->getCountry->name}}, {{$contributor->city}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
