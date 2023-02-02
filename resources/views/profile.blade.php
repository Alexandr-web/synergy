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
      <div class="col border p-3 rounded">
        <div class="col d-flex flex-column">
          <img class="img-thumbnail" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1860290ee4c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1860290ee4c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.41666603088379%22%20y%3D%22104.55999994277954%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="">
          <h4>{{ $user['lastname'].' '.$user['firstname'] }}</h4>
          <h5>{{ $user['email'] }}</h5>
        </div>
        <div class="col mt-2">
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
            @default
                
        @endswitch
      </div>
    </div>
  </div>
</body>
</html>