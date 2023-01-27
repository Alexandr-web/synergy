<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('./includes/bootstrap')
  <title>Регистрация</title>
</head>
<body>

  <div class="container">
    <h2 class="text-center">Регистрация</h2>
    <form>
      <div class="row">
        <div class="form-group col">
          <label for="lastname">Фамилия</label>
          <input type="text" name="lastname" class="form-control js-input" id="lastname" placeholder="Написать фамилию">
          <div class="invalid-feedback js-error" data-error="lastname"></div>
        </div>
        <div class="form-group col">
          <label for="firstname">Имя</label>
          <input type="text" name="firstname" class="form-control js-input" id="firstname" placeholder="Написать имя">
          <div class="invalid-feedback js-error" data-error="firstname"></div>
        </div>
        <div class="form-group col">
          <label for="surname">Отчество</label>
          <input type="text" name="surname" class="form-control js-input" id="surname" placeholder="Написать отчество">
          <div class="invalid-feedback js-error" data-error="surname"></div>
        </div>
        <div class="form-group col">
          <label for="birth-date">Дата рождения</label>
          <input type="date" name="birth-date" class="form-control js-input" id="birth-date">
          <div class="invalid-feedback js-error" data-error="birth-date"></div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col">
          <label for="email">Эл. почта</label>
          <input type="email" name="email" class="form-control js-input" id="email" placeholder="Написать эл. почту">
          <div class="invalid-feedback js-error" data-error="email"></div>
        </div>
        <div class="form-group col">
          <label for="password">Пароль</label>
          <div class="d-flex">
            <div class="col">
              <input type="text" name="password" class="form-control js-input js-input-password" id="password" readonly>
            </div>
            <div class="col d-flex justify-content-end">
              <button type="button" class="btn btn-primary js-btn-generate-password">Сгенерировать заново</button>
            </div>
          </div>
          <div class="invalid-feedback js-error" data-error="password"></div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col">
          <label>Пол</label>
          <div class="form-check">
            <input class="form-check-input js-input" type="radio" name="sex" id="sex-men" value="men" checked>
            <label class="form-check-label" for="sex-men">
              Мужской
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input js-input" type="radio" name="sex" id="sex-women" value="women">
            <label class="form-check-label" for="sex-women">
              Женский
            </label>
          </div>
          <div class="invalid-feedback js-error" data-error="sex"></div>
        </div>
        <div class="form-group col">
          <label for="passport-series">Серия паспорта</label>
          <input type="number" name="passport-series" class="form-control js-input" id="passport-series" placeholder="Написать серию паспорта">
          <div class="invalid-feedback js-error" data-error="passport-series"></div>
        </div>
        <div class="form-group col">
          <label for="passport-number">Номер паспорта</label>
          <input type="number" name="passport-number" class="form-control js-input" id="passport-number" placeholder="Написать номер паспорта">
          <div class="invalid-feedback js-error" data-error="passport-number"></div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
      </div>
    </form>
  </div>
  <script src="/js/Auth.js"></script>
  <script src="/js/auth/registration.js"></script>
  <script src="/js/PasswordGenerate.js"></script>
  <script src="/js/auth/generatePassword.js"></script>
</body>
</html>