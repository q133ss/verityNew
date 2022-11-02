@extends('layouts.admin')
@section('title', 'Добавить волонтера')
@section('content')
    <div class="card-body">
        <form class="row g-3" action="{{route('admin.volunteers.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="inputNumber" class="col-sm-2 col-form-label">Фото</label>
            <div class="col-md-12"><input class="form-control" type="file" name="photo" id="formFile"></div>
            <div class="col-md-12"><input type="text" class="form-control" name="name" placeholder="Имя" value=""></div>
            <div class="col-md-12"><input type="text" class="form-control" name="lastname" placeholder="Фамилия" value=""></div>
            <div class="col-md-12"><input type="text" class="form-control" name="patronymic" placeholder="Отчество" value=""></div>
            <div class="col-md-12"><input type="text" class="form-control" name="city" placeholder="Город" value=""></div>

            <div class="col-md-12"><input type="text" class="form-control" name="whatsapp" placeholder="whatsapp" value=""></div>
            <div class="col-md-12"><input type="text" class="form-control" name="telegram" placeholder="telegram" value=""></div>
            <div class="col-md-12"><input type="text" class="form-control" name="email" placeholder="email" value=""></div>

            <div class="col-md-12"><input type="password" class="form-control" name="password" placeholder="Пароль" value=""></div>

            <div class="col-md-12"><textarea name="note" class="form-control" placeholder="Заметка (необязательно)" id="" cols="10" rows="3"></textarea></div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
