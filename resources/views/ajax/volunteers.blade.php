@foreach($volunteers as $letter => $letterVolunteer)
    <li class="volunteers-recom__list-i">
        <div class="volunteers-recom__list-t">{{$letter}}</div>
        <div class="volunteers-recom__list-peoples">
            @foreach($letterVolunteer as $volunteer)
                <div class="cardUser">
                    <div class="cardUser__photo"> <picture><source srcset="/assets/img/volunteers/people.webp" type="image/webp"><img src="/assets/img/volunteers/people.png"></picture></div>
                    <div class="cardUser__content">
                        <div class="cardUser__content-n">{{$volunteer->getFio()}}</div>
                        <div class="cardUser__content-j">{{$volunteer->city}}</div>
                        <div class="cardUser__content-socials"><a class="cardUser__content-s" href="/"> <picture><source srcset="/assets/img/volunteers/whatsapp.webp" type="image/webp"><img src="/assets/img/volunteers/whatsapp.png"></picture></a><a class="cardUser__content-s" href="/"> <picture><source srcset="/assets/img/volunteers/telegram.webp" type="image/webp"><img src="/assets/img/volunteers/telegram.png"></picture></a><a class="cardUser__content-s" href="/"> <picture><source srcset="/assets/img/volunteers/mail.webp" type="image/webp"><img src="/assets/img/volunteers/mail.png"></picture></a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </li>
@endforeach
