class Element {
  constructor(element) {
    this.element = typeof element === "string" ? document.querySelector(element) : element;
  }

  show(showClass = "d-block", hideClass = "d-none") {
    this.removeClass(hideClass);
    this.addClass(showClass);
  }

  hide(showClass = "d-block", hideClass = "d-none") {
    this.removeClass(showClass);
    this.addClass(hideClass);
  }

  setText(text = "") {
    if (this.element.value !== undefined) {
      this.element.value = text;
    } else {
      this.element.textContent = text;
    }
  }

  removeClass(className = "") {
    this.element.classList.remove(className);
  }

  addClass(className = "") {
    this.element.classList.add(className);
  }

  getEl() {
    return this.element;
  }
}

export default Element;