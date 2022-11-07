@extends('layouts.main')
@section('title', 'Профиль')
@section('meta')
    <link rel="stylesheet" href="/assets/css/profile.css">
    <style>
        .btn-info{
            color: #0000ff;
        }
        .btn-warning{
            color: #d5ba64;
        }
    </style>
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

                <div class="contributors__list">
                    @foreach($certificates as $certificate)
                        <div class="contributors__item" style="grid-template-columns:1fr 1fr;">
                            <div class="contributors__item-d">{{$certificate->number}}</div>
                            <div class="contributors__item-n">
                                <a href="{{route('certificate.show',$certificate->id)}}" class="btn btn-info">Смотреть</a>
                                <a href="{{route('certificate.download', $certificate->id)}}" class="btn btn-warning">Скачать</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
