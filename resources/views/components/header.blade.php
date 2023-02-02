<?php 
    use App\Helpers\AuthToken;

    $userId = AuthToken::getUserId();
    $navList = [
        'home' => ['path' => '/', 'name' => 'Главная', 'show' => true],
        'profile' => ['path' => "/profile/$userId", 'name' => 'Профиль', 'show' => (bool) $userId],
        'logout' => ['path' => '/logout', 'name' => 'Выйти', 'show' => true],
    ];
?>

<header class="d-flex justify-content-center py-2">
    <ul class="nav nav-pills">
        @foreach ($navList as $key => $pageData)
            @if ($pageData['show'])
                <li class="nav-item">
                    <a
                        href="{{ $pageData['path'] }}"
                        class="{{ $key === $activePage ? 'nav-link active' : 'nav-link' }}"
                        aria-current="page"
                    >{{ $pageData['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</header>