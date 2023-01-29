class Form {
  constructor(selectorForm = ".js-form", selectorErrors = ".js-error", selectorBtnText = ".js-btn-text", selectorSpinner = ".js-btn-spinner", selectorInputs = ".js-input") {
    this.form = document.querySelector(selectorForm);
    this.inputs = document.querySelectorAll(selectorInputs);
    this.errors = document.querySelectorAll(selectorErrors);
    this.btnText = new Element(selectorBtnText);
    this.btnSpinner = new Element(selectorSpinner);
  }

  _clearData() {
    this.errors.forEach((element) => {
      const el = new Element(element);

      el.hide();
      el.setText();
    });

    this.inputs.forEach((element) => new Element(element).removeClass("border-danger"));
  }

  _handlerErrors(errors) {
    const errorsKeys = Object.keys(errors);

    [...this.inputs]
      .filter((input) => errorsKeys.includes(input.name))
      .map((input) => {
        const errorKey = errorsKeys.find((key) => key === input.name);
        const errorMessage = errors[errorKey][0];
        const inputEl = new Element(input);
        const errorEl = new Element([...this.errors].find((element) => element.dataset.error === errorKey));

        inputEl.addClass("border-danger");

        errorEl.setText(errorMessage);
        errorEl.show();
      });
  }

  submit(method, body, headers, uri, callbackWhenSuccess, callbackWhenFailure) {
    this.btnText.hide();
    this.btnSpinner.show();

    this._clearData();

    fetch(`http://127.0.0.1:8000/${uri}`, { method, body, headers, })
      .then((data) => data.json())
      .then((data) => {
        this.btnSpinner.hide();
        this.btnText.show();
        this.btnText.setText(data.message);

        // Обработка ошибок
        if (data.errors) {
          this._handlerErrors(data.errors);
        }

        if (data.status === 200 && callbackWhenSuccess instanceof Function) {
          callbackWhenSuccess(data);
        }
      }).catch((err) => {
        if (callbackWhenFailure instanceof Function) {
          callbackWhenFailure(err);
        }

        throw err;
      });
  }
}