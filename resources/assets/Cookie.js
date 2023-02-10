class Cookie {
  /**
   * Получение срока истечения cookie
   * @param {number} hours Часы
   * @returns {string}
   */
  _getExp(hours) {
    const date = new Date();

    date.setTime(date.getTime() + (hours * 60 * 60 * 1000));

    return "; expires=" + date.toUTCString();
  }

  /**
   * Добавление cookie
   * @param {string} name Название
   * @param {string} value Значение
   * @param {number} hours Время
   */
  set(name, value, hours) {
    const exp = this._getExp(hours);

    document.cookie = `${name}=${value}${exp}; path=/`;
  }

  /**
   * Получение значения cookie
   * @param {string} name Название
   * @returns {string}
   */
  get(name) {
    const nameEQ = `${name}=`;
    const list = document.cookie.split(";");

    for (let i = 0; i < list.length; i++) {
      let c = list[i];

      while (c.charAt(0) === " ") c = c.substring(1, c.length);

      if (c.indexOf(nameEQ) === 0) {
        return c.substring(nameEQ.length, c.length);
      }
    }

    return "";
  }

  /**
   * Удаление cookie
   * @param {string} name Название
   */
  remove(name) {
    document.cookie = `${name}=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
  }
}

export default Cookie;