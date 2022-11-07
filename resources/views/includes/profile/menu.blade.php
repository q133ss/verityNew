<div class="sidebar">
    <nav>
        <div class="menu-item"><a href="{{route('profile.index')}}" class="nav-item">Мой профиль</a></div>
        @if(Auth()->user()->is_volunteer)
        <div class="menu-item"><a href="{{route('profile.contributors')}}" class="nav-item">Мои жертвователи</a></div>
        <div class="menu-item"><a href="{{route('profile.statistic')}}" class="nav-item">Статистика</a></div>
        <div class="menu-item"><a href="{{route('profile.certificate')}}" class="nav-item">Оформить сертефикат</a></div>
        @elseif(!Auth()->user()->is_volunteer && !Auth()->user()->is_admin)
            <div class="menu-item"><a href="{{route('profile.contributor.certificate')}}" class="nav-item">Мои сертификаты</a></div>
        @endif
        @if(Auth()->user()->is_admin)
        <div class="menu-item"><a href="{{route('admin.index')}}" class="nav-item">Панель администратора</a></div>
        @endif
        <div class="menu-item"><a href="/logout" class="nav-item">Выйти</a></div>
    </nav>
</div>
