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
