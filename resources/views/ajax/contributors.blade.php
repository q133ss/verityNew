@foreach($contributors as $contributor)
    <div class="contributors__item">
        <div class="contributors__item-d">{{$contributor->id}}</div>
        <div class="contributors__item-n">{{$contributor->name}}</div>
        <div class="contributors__item-p">{{$contributor->sum}} ₽</div>
        <div class="contributors__item-c">{{$contributor->getCountry->name . ', ' . $contributor->city}}</div>
    </div>
@endforeach
