<?php
  $navList = [
    'info' => ['query' => 'info', 'name' => 'Общая информация'],
    'edit' => ['query' => 'edit', 'name' => 'Редактирование'],
    'delete' => ['query' => 'delete', 'name' => 'Удаление аккаунта'],
  ];
?>

<nav class="navbar border-top">
  <ul class="nav nav-pills w-100 d-flex flex-column">
    @foreach ($navList as $key => $tabData)
        <li class="nav-item text-center">
            <a
                href="{{ '/profile/'.$userId.'?tab='.$tabData['query'] }}"
                class="{{ $key === $activeTab ? 'nav-link active' : 'nav-link' }}" 
                aria-current="page"
            >{{ $tabData['name'] }}</a>
        </li>
    @endforeach
  </ul>
</nav>