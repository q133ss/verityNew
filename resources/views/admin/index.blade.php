@extends('layouts.admin')
@section('title', 'Жертвователи')
@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?_v=20221017195015" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="firstName" class="form-label">Дата</label>
                <select name="#" class="form-select" id="#" onchange="sort($(this).val())">
                    <option value="new">Сначала новые</option>
                    <option value="old">Сначала старые</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="address" placeholder="" oninput="searchFio($(this).val())" required="">
            </div>

            <div class="col-md-3">
                <label for="firstName" class="form-label">Сумма</label>
                <select name="#" class="form-select" id="#" onchange="sort($(this).val())">
                    <option value="sum-high">От большей к меньшей</option>
                    <option value="sum-low">От меньшей к большей</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">Город</label>
                <input type="text" class="form-control" id="address" placeholder="" oninput="searchCity($(this).val())" required="">
            </div>
        </div>

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
            @foreach($contributors as $contributor)
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


    <script>
        function sort(field){
            $.ajax({
                url: '/admin/sort/'+field,
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
                url: '/admin/search/'+query,
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
                url: '/admin/search/city/'+query,
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
