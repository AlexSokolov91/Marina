<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" style="position: absolute; left: 0; color: red">Admin Panel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('admin-management.service')}}">Услуги</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-management.our-work') }}">Наши работы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-management.employee-category') }}">Категории сотрудников</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-management.employee') }}">Услуги и категории</a>
        </li>
        <li class="nav-item">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link" style="position: absolute; right: 0; color: red"> Выйти </button>
{{--            <a class="nav-link" href="{{ route('logout') }}" style="position: absolute; right: 0; color: red">Выйти</a>--}}
            </form>
        </li>
    </ul>
</div>
