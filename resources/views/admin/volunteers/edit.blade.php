@extends('layouts.admin')
@section('title', 'Изменить волонтера')
@section('content')
    <div class="card-body">
        <form class="row g-3" action="{{route('admin.volunteers.update', $volunteer->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="inputNumber" class="col-sm-2 col-form-label">Фото</label>
            <img src="{{$volunteer->photo}}" alt="" width="300px">
            <div class="col-md-12"><input class="form-control" type="file" name="photo" id="formFile"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="name" placeholder="Имя" value="{{$volunteer->name}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="lastname" placeholder="Фамилия" value="{{$volunteer->lastname}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{$volunteer->patronymic}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="city" placeholder="Город" value="{{$volunteer->city}}"></div>

            <div class="col-md-12"><input type="text" class="form-control" name="whatsapp" placeholder="whatsapp" value="{{$volunteer->getSocial('whatsapp')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="telegram" placeholder="telegram" value="{{$volunteer->getSocial('telegram')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="email" placeholder="email" value="{{$volunteer->getSocial('email')}}"></div>

            <div class="col-md-12"><textarea name="note" class="form-control" placeholder="Заметка" id="" cols="10" rows="3">{{$volunteer->note}}</textarea></div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
