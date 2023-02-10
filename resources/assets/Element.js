class Element {
  constructor(element) {
    this.element = typeof element === "string" ? document.querySelector(element) : element;
  }

  /**
   * Появление элемента
   * @param {string} showClass Класс появления элемента
   * @param {string} hideClass Класс скрытия элемента
   */
  show(showClass = "d-block", hideClass = "d-none") {
    this.removeClass(hideClass);
    this.addClass(showClass);
  }

  /**
   * Скрытие элемента
   * @param {string} showClass Класс появления элемента
   * @param {string} hideClass Класс скрытия элемента
   */
  hide(showClass = "d-block", hideClass = "d-none") {
    this.removeClass(showClass);
    this.addClass(hideClass);
  }

  /**
   * Изменение текста/значения элемента
   * @param {string} text Текст, который хотим вставить
   */
  setText(text = "") {
    if (this.element.value !== undefined) {
      this.element.value = text;
    } else {
      this.element.textContent = text;
    }
  }

  /**
   * Удаление класса у элемента
   * @param {string} className Класс, который хотим удалить
   */
  removeClass(className = "") {
    this.element.classList.remove(className);
  }

  /**
   * Добавление класса элементу
   * @param {string} className Класс, который хотим добавить
   */
  addClass(className = "") {
    this.element.classList.add(className);
  }

  /**
   * Получение элемента
   * @returns {HTMLElement}
   */
  getEl() {
    return this.element;
  }
}

export default Element;