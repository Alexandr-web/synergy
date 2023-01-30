<?php 
    use App\Helpers\AuthToken;

    define('NAV_LIST', [
        'home' => ['path' => '/', 'name' => 'Главная'],
        'profile' => ['path' => '/profile/'.AuthToken::decode()['user_id'], 'name' => 'Профиль'],
        'logout' => ['path' => '/logout', 'name' => 'Выйти'],
    ]);
?>

<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        @foreach (NAV_LIST as $key => $pageData)
            <li class="nav-item">
                <a
                    href="{{ $pageData['path'] }}"
                    class="{{ $key === $activePage ? 'nav-link active' : 'nav-link' }}" 
                    aria-current="page"
                >{{ $pageData['name'] }}</a>
            </li>
        @endforeach
    </ul>
</header>