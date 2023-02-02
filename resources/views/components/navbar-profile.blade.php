<?php
  $navList = [
    'info' => ['query' => 'info', 'name' => 'Информация', 'onlyOwner' => false],
    'edit' => ['query' => 'edit', 'name' => 'Редактирование данных', 'onlyOwner' => true],
    'delete' => ['query' => 'delete', 'name' => 'Удаление аккаунта', 'onlyOwner' => true],
  ];
?>

<nav class="navbar">
  <ul class="nav nav-pills w-100 d-flex flex-column">
    @foreach ($navList as $key => $tabData)
      @if ($isGuest)
        @if (!$tabData['onlyOwner'])
          <li class="nav-item text-center">
              <a
                  href="{{ '/profile/'.$userId.'?tab='.$tabData['query'] }}"
                  class="{{ $key === $activeTab ? 'nav-link active' : 'nav-link' }}" 
                  aria-current="page"
              >{{ $tabData['name'] }}</a>
          </li>
        @endif
        @else
        <li class="nav-item text-center">
            <a
                href="{{ '/profile/'.$userId.'?tab='.$tabData['query'] }}"
                class="{{ $key === $activeTab ? 'nav-link active' : 'nav-link' }}" 
                aria-current="page"
            >{{ $tabData['name'] }}</a>
        </li>
      @endif
    @endforeach
  </ul>
</nav>