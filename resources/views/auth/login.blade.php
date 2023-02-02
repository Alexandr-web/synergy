<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('./includes/bootstrap')
  @vite(['resources/assets/auth/login.js'])
  <title>Вход</title>
</head>
<body>
  <div class="container w-25">
    <h1 class="text-center">Вход</h1>
    <form class="js-form">
      <div class="form-group">
        <label for="email">Эл. почта</label>
        <input type="text" name="email" class="form-control js-input" id="email" placeholder="Написать эл. почту">
        <div class="invalid-feedback js-error" data-error="email"></div>
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" class="form-control js-input" id="password" placeholder="Написать пароль">
        <div class="invalid-feedback js-error" data-error="password"></div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-primary d-flex align-items-center">
          <div class="spinner-border text-light spinner-border-sm d-none js-btn-spinner" role="status"></div>
          <span class="sr-only js-btn-text">Войти</span>
        </button>
      </div>
      <div class="d-flex justify-content-center mt-2">
        <p>Нет аккаунта? <a href="/auth/registration">Зарегистрироваться</a></p>
      </div>
    </form>
  </div>
</body>
</html>