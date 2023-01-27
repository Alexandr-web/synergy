(function () {
  const auth = new AuthForm("form", "http://127.0.0.1:8000/auth/registration");
  const form = document.querySelector("form");
  const formErrors = document.querySelectorAll(".js-error");
  const formInputs = document.querySelectorAll(".js-input");
  const metaToken = document.querySelector("meta[name=csrf-token]");

  form.addEventListener("submit", (e) => {
    const fd = new FormData(form);
    const reqData = {
      method: "POST",
      body: fd,
      headers: {
        "Accept-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": metaToken.content,
      },
      clearData: () => {
        formErrors.forEach((element) => {
          element.style.display = "none";
          element.textContent = "";
        });

        formInputs.forEach((element) => element.classList.remove("border-danger"));
      },
    };
    const { method, body, headers, clearData, } = reqData;

    auth.sendReq(e, method, body, headers, clearData)
      .then((data) => data.json())
      .then((data) => {
        // Обработка ошибок
        if (data.errors) {
          const errors = data.errors;
          const errorsKeys = Object.keys(errors);

          [...formInputs]
            .filter((input) => errorsKeys.includes(input.name))
            .map((input) => {
              const errorKey = errorsKeys.find((key) => key === input.name);
              const errorMessage = errors[errorKey][0];
              const errorElement = [...formErrors].find((element) => element.dataset.error === errorKey);

              input.classList.add("border-danger");

              errorElement.textContent = errorMessage;
              errorElement.style.display = "block";
            });
        }
      }).catch((err) => {
        throw err;
      });
  });
}());