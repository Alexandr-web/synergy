class Location {
  constructor() {
    this.locaction = window.location;
    this.history = window.history;
  }

  /**
   * Перенаправление пользователя на заданный маршрут
   * @param {string} path маршрут, куда нужно направить пользователя (/is/example)
   */
  push(path) {
    this.locaction.replace(path);
  }

  /**
   * Изменение текущего маршрута на следующий/предыдущий, который есть в истории
   * @param {number} delta куда нужно переместиться (1,0,-1)
   */
  go(delta) {
    this.history.go(delta);
  }

  /**
   * Получение идентификатора пользователя, который присутствует в url
   * @param {string} before Путь, который находится перед идентификатором
   * @param {string} after Путь, который находится после идентификатора
   * @returns {string}
   */
  getIdFromPathName(before = "", after = "") {
    const regexp = new RegExp(`${before}\/\\d+${after ? `\/${after}` : ""}`);
    const findId = this.locaction.pathname.match(regexp);

    return findId ? findId[0].match(/\d+/)[0] : "";
  }
}

export default Location;