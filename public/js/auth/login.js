(function () {
  const form = document.querySelector(".js-form");
  const metaToken = document.querySelector("meta[name=csrf-token]");
  const location = new Location();

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const reqData = {
      method: "POST",
      body: new FormData(form),
      uri: "auth/login",
      success(res) {
        new Cookie().set("token", res.token);

        location.push("/");
      },
      failure(err) {
        console.log(err);
      },
      headers: {
        "Accept-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": metaToken.content,
      },
    };
    const { method, body, headers, uri, success, } = reqData;

    new Form().submit(method, body, headers, uri, success);
  });
}());