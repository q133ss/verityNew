@extends('layouts.admin')
@section('title', 'Волонтер')
@section('content')
    <p>
        Колличество проданных сертификатов: {{$volunteer->getStat('donated') ?? 0}} <br>
        Сумма на которую проданны сертификаты: {{$volunteer->getStat('earnings') ?? 0}}
    </p>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Список волонтеров
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Город</th>
                <th scope="col">Страна</th>
                <th scope="col">Сумма</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="contributors__list">
            @foreach($volunteer->getContributors as $contributor)
                <tr>
                    <th scope="row">{{$contributor->id}}</th>
                    <td>{{$contributor->getFio()}}</td>
                    <td>{{$contributor->city}}</td>
                    <td>
                        {{$contributor->getCountry->name}}
                    </td>
                    <td>
                        {{$contributor->sum}} ₽
                    </td>
                    <td>
                        <a href="{{route('certificate.download', $contributor->Certificate->id)}}" class="btn btn-info">Скачать сертификат</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
