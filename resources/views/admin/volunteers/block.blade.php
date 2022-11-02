@extends('layouts.admin')
@section('title', 'Заблокированные волонтеры')
@section('content')
    <div class="card-body">
        <a href="{{route('admin.volunteers.index')}}" class="btn btn-info">Назад</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Город</th>
                <th scope="col">Соц.сети</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($volunteers as $volunteer)
                <tr>
                    <th scope="row">{{$volunteer->id}}</th>
                    <td>{{$volunteer->getFio()}}</td>
                    <td>{{$volunteer->city}}</td>
                    <td>
                        @foreach($volunteer->getSocials() as $key => $social)
                            <a href="{{$social}}">{{$key}}</a> <br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('admin.volunteers.edit', $volunteer->id)}}" class="btn btn-warning">Изменить</a>
                        <form action="{{route('admin.volunteers.unblock', $volunteer->id)}}" style="display:inline" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-success">Разблокировать</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
