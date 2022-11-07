@extends('layouts.admin')
@section('title', 'Заявки на волонтерство')
@section('content')
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Дата и время</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->date()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
