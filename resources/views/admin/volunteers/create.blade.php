@extends('layouts.admin')
@section('title', 'Добавить волонтера')
@section('content')
    <div class="card-body">
        <form class="row g-3" action="{{route('admin.volunteers.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="inputNumber" class="col-sm-2 col-form-label">Фото</label>
            <div class="col-md-12"><input class="form-control" type="file" name="photo" id="formFile"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="name" placeholder="Имя" value="{{old('name')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="lastname" placeholder="Фамилия" value="{{old('lastname')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{old('patronymic')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="city" placeholder="Город" value="{{old('city')}}"></div>

            <div class="col-md-12"><input type="text" class="form-control" name="whatsapp" placeholder="whatsapp | https://wa.me/7XXXXXXXXXX" value="{{old('whatsapp')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="telegram" placeholder="telegram | https://t.me/XXXXXXXXX" value="{{old('telegram')}}"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="email" placeholder="email | mail@mail.ru" value="{{old('email')}}"></div>

            <div class="col-md-12"><input type="password" class="form-control" name="password" placeholder="Пароль" value=""></div>

            <div class="col-md-12"><textarea name="note" class="form-control" placeholder="Заметка (необязательно)" id="" cols="10" rows="3">{{old('note')}}</textarea></div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
