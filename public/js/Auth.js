class AuthForm {
  constructor(selectorForm = "", uri = "") {
    this.form = document.querySelector(selectorForm);
    this.uri = uri;
  }

  /**
   * Проверяет правильность написания электронной почты
   * @param {string} value Значение поля с электронной почтой
   * @return {boolean}
   */
  checkEmail(value = "") {
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
  }

  /**
   * Самодельная проверка значения
   * @param {string} value Значение поля
   * @param {RegExp} regexp Регулярное выражение
   * @returns {boolean}
   */
  customCheck(value, regexp) {
    return regexp.test(value);
  }

  /**
   * Отправляет запрос на сервер
   * @param {object} event Объект данных события
   * @param {string} method Метод запроса
   * @param {string|FormData} body Тело запроса
   * @param {object} headers Заголовки запроса
   * @return {promise}
   */
  sendReq(event, method, body, headers, callbackBeforeSend) {
    event.preventDefault();

    if (callbackBeforeSend instanceof Function) {
      callbackBeforeSend();
    }

    return fetch(this.uri, {
      method,
      credentials: "same-origin",
      body,
      headers,
    });
  }
}