import Location from "../Location";
import Cookie from "../Cookie";
import Form from "../Form";
import "./generatePassword";

(function () {
  const form = document.querySelector(".js-form");

  if (form) {
    const metaToken = document.querySelector("meta[name=csrf-token]");
    const location = new Location();
    const inputs = document.querySelectorAll(".js-input");

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const token = new Cookie().get("token");
      const userId = location.getIdFromPathName("profile");
      const fd = [...inputs].reduce((acc, input) => {
        const name = input.name;
        let value = input.value;

        if (input.checked !== undefined) {
          const inputWithEqualName = [...inputs].find((el) => el.name === name);

          value = input.checked ? input.value : inputWithEqualName.value;
        }

        acc[name] = value;

        return acc;
      }, {});

      const reqData = {
        method: "PUT",
        body: JSON.stringify(fd),
        uri: `api/profile/${userId}/edit`,
        headers: {
          "Accept-Type": "application/json",
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": metaToken.content,
          "Authorization": `Bearer ${token}`,
        },
      };
      const { method, body, headers, uri, success, } = reqData;

      new Form().submit(method, body, headers, uri, success);
    });
  }
}());