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
