<?php define('CURRENT_PROFILE_TAB', htmlspecialchars($_GET['tab'])); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('./includes/bootstrap')
  @vite(['resources/assets/profile/editData.js', 'resources/assets/profile/deleteData.js'])
  <title>Профиль | {{ $user['lastname'].' '.$user['firstname'] }}</title>
</head>
<body>
  <x-header activePage="profile" />
  <div class="container mt-5">
    <div class="d-flex">
      <div class="col">
        <div class="col d-flex flex-column">
          <h2>{{ $user['lastname'].' '.$user['firstname'] }}</h2>
          <h5>{{ $user['email'] }}</h5>
        </div>
        <div class="col mt-2 border p-3 rounded">
          <x-navbar-profile activeTab="{{ CURRENT_PROFILE_TAB }}" userId="{{ $user['id'] }}" is-guest="{{ $isGuest }}" />
        </div>
      </div>
     <div class="col-9 px-3">
        @switch(CURRENT_PROFILE_TAB)
            @case('info')
                <x-profile-info-tab :user="$user" />
                @break
            @case('edit')
                <x-profile-edit-tab :user="$user" />
                @break
            @case('delete')
                <x-profile-delete-tab :user="$user" />
                @break
        @endswitch
      </div>
    </div>
  </div>
</body>
</html>