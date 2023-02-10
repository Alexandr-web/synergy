class PasswordGenerate {
  constructor(len = 6) {
    this.len = len;
    this.contains = [
      "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
      "1", "2", "3", "4", "5", "6", "7", "8", "9",
      "!", "#", "@", "$", "%", "^", "&", "*", "(", ")", "-", "+", "?", "<", ">", ";", ".", ",", "+", "/", ":"
    ];
  }

  /**
   * Получение случайного символа
   * @returns {string}
   */
  _getRandomCharacter() {
    const lenContains = this.contains.length;
    const randomIndex = Math.floor(Math.random() * (lenContains - 1));

    return this.contains[randomIndex];
  }

  /**
   * Генерация пароля по заданной длине
   * @returns {string}
   */
  init() {
    let res = "";

    for (let i = 0; i < this.len; i++) {
      res += this._getRandomCharacter();
    }

    return res;
  }
}

export default PasswordGenerate;