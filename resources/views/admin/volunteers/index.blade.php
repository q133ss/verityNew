@extends('layouts.admin')
@section('title', 'Волонтеры')
@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?_v=20221017195015" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="card-body">
        <a href="{{route('admin.volunteers.create')}}" class="btn btn-info">Добавить</a>
        <a href="{{route('admin.volunteers.block')}}" class="btn btn-primary">Заблокированные</a>

        <div class="row mt-3">
            <div class="col-md-3">
                <select name="#" class="form-select" id="#" onchange="sort($(this).val())">
                    <option value="lastname">Сортировка по фамилии</option>
                    <option value="name">Сортировка по имени</option>
                    <option value="patronymic">Сортировка по отчеству</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="text" class="form-control" id="address" placeholder="Поиск по ФИО" oninput="search($(this).val())" required="">
            </div>

            <div class="col-md-3">
                <input type="text" class="form-control" id="address" placeholder="Поиск по региону" oninput="searchCity($(this).val())" required="">
            </div>
        </div>
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
            <tbody class="volunteers-recom__list">
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
                        <a href="{{route('admin.volunteers.show', $volunteer->id)}}" class="btn btn-info">Смотреть</a>
                        <form action="{{route('admin.volunteers.destroy', $volunteer->id)}}" style="display:inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Заблокировать</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        function sort(field){
            $.ajax({
                url: '/admin/volunteers/sort/'+field,
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
                url: '/admin/volunteers/search/'+request,
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
                url: '/admin/volunteers/search/city/'+city,
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
