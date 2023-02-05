import Location from "../Location";
import Form from "../Form";
import passwordGenerate from "../helpers/passwordGenerateInDOM";

passwordGenerate(true);

(function () {
  const form = document.querySelector(".js-form");
  const metaToken = document.querySelector("meta[name=csrf-token]");
  const location = new Location();

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const reqData = {
      method: "POST",
      body: new FormData(form),
      uri: "api/auth/registration",
      headers: {
        "Accept-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": metaToken.content,
      },
      success: () => location.push("/auth/login"),
    };
    const { method, body, headers, uri, success, } = reqData;

    new Form().submit(method, body, headers, uri, success);
  });
}());