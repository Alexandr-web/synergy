<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include("./includes/bootstrap")
  <title>Главная</title>
</head>
<body>
  <x-header activePage="home" />
  <div class="container mt-5">
    <h1>Добро пожаловать!</h1>
  </div>
</body>
</html>