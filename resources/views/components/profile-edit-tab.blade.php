<div>
    <form class="js-form">
        <div class="d-flex flex-column">
          <div class="row mb-5">
            <div class="row">
              <h3>Общее</h3>
              <div class="form-group col">
                <label for="surname">Фамилия</label>
                <input type="text" name="lastname" class="form-control js-input" id="lastname" placeholder="Написать фамилию" value="{{ $user['lastname'] }}">
                <div class="invalid-feedback js-error" data-error="lastname"></div>
              </div>
              <div class="form-group col">
                <label for="firstname">Имя</label>
                <input type="text" name="firstname" class="form-control js-input" id="firstname" placeholder="Написать имя" value="{{ $user['firstname'] }}">
                <div class="invalid-feedback js-error" data-error="firstname"></div>
              </div>
              <div class="form-group col">
                <label for="surname">Отчество</label>
                <input type="text" name="surname" class="form-control js-input" id="surname" placeholder="Написать отчество" value="{{ $user['surname'] }}">
                <div class="invalid-feedback js-error" data-error="surname"></div>
              </div>
              <div class="form-group col">
                <label for="birth-date">Дата рождения</label>
                <input type="date" name="birth-date" class="form-control js-input" id="birth-date" value="{{ $user['birth-date'] }}">
                <div class="invalid-feedback js-error" data-error="birth-date"></div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="email">Эл. почта</label>
                <input type="text" name="email" class="form-control js-input" id="email" placeholder="Написать эл. почту" value="{{ $user['email'] }}">
                <div class="invalid-feedback js-error" data-error="email"></div>
              </div>
              <div class="form-group col">
                <label for="password">Пароль</label>
                <div class="d-flex">
                  <div class="col">
                    <input type="text" name="password" class="form-control js-input js-input-password" id="password" readonly>
                  </div>
                  <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary js-btn-generate-password">Сгенерировать</button>
                  </div>
                </div>
                <div class="invalid-feedback js-error" data-error="password"></div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label>Пол</label>
                <div class="form-check">
                  <input class="form-check-input js-input" type="radio" name="sex" id="sex-man" value="man" {{ $user['sex'] === 'man' ? 'checked' : ''}}>
                  <label class="form-check-label" for="sex-man">
                    Мужской
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input js-input" type="radio" name="sex" id="sex-woman" value="woman" {{ $user['sex'] === 'woman' ? 'checked' : ''}}>
                  <label class="form-check-label" for="sex-woman">
                    Женский
                  </label>
                </div>
                <div class="invalid-feedback js-error" data-error="sex"></div>
              </div>
              <div class="form-group col">
                <label for="passport-series">Серия паспорта</label>
                <input type="number" name="passport-series" class="form-control js-input" id="passport-series" placeholder="Написать серию паспорта" value="{{ $user['passport-series'] }}">
                <div class="invalid-feedback js-error" data-error="passport-series"></div>
              </div>
              <div class="form-group col">
                <label for="passport-number">Номер паспорта</label>
                <input type="number" name="passport-number" class="form-control js-input" id="passport-number" placeholder="Написать номер паспорта" value="{{ $user['passport-number'] }}">
                <div class="invalid-feedback js-error" data-error="passport-number"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <h3>Контакты</h3>
          <div class="form-group row mb-2">
            <label for="stackoverflow-url" class="col-sm-2 col-form-label">Stackoverflow</label>
            <div class="col-sm-10">
              <input type="text" class="form-control js-input" id="stackoverflow-url" name="stackoverflow-url" value="{{ $user['stackoverflow-url'] }}" placeholder="Написать ссылку">
              <div class="invalid-feedback js-error" data-error="stackoverflow-url"></div>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="telegram-url" class="col-sm-2 col-form-label">Telegram</label>
            <div class="col-sm-10">
              <input type="text" class="form-control js-input" id="telegram-url" name="telegram-url" value="{{ $user['telegram-url'] }}" placeholder="Написать ссылку">
              <div class="invalid-feedback js-error" data-error="telegram-url"></div>
            </div>
          </div>
          <div class="form-group row">
            <label for="github-url" class="col-sm-2 col-form-label">GitHub</label>
            <div class="col-sm-10">
              <input type="text" class="form-control js-input" id="github-url" name="github-url" value="{{ $user['github-url'] }}" placeholder="Написать ссылку">
              <div class="invalid-feedback js-error" data-error="github-url"></div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
          <button type="submit" class="btn btn-primary d-flex align-items-center">
            <div class="spinner-border text-light spinner-border-sm d-none js-btn-spinner" role="status"></div>
            <span class="sr-only js-btn-text">Редактировать</span>
          </button>
        </div>
      </form>
</div>