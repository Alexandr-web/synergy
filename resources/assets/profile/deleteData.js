import Cookie from "../Cookie";
import Location from "../Location";
import Element from "../Element";

// Отправка запроса на удаление данных пользователя
(function () {
  const btn = document.querySelector(".js-remove-btn");

  if (btn) {
    const textBtn = new Element(".js-btn-text");
    const cookie = new Cookie();
    const location = new Location();
    const spinner = new Element(".js-btn-spinner");
    const metaToken = document.querySelector("meta[name=csrf-token]");

    btn.addEventListener("click", () => {
      const token = cookie.get("token");
      const userId = location.getIdFromPathName("profile");

      // Показываем лоадер
      textBtn.setText();
      spinner.show();

      fetch(`http://127.0.0.1:8000/api/profile/${userId}/delete`, {
        method: "DELETE",
        headers: {
          "Accept-Type": "application/json",
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": metaToken.content,
          "Authorization": `Bearer ${token}`,
        },
      })
        .then((data) => data.json())
        .then(({ status, message, }) => {
          // Скрываем лоадер
          spinner.hide();
          textBtn.setText(message);

          if (status === 200) {
            // Удаляем токен пользователя и перенаправляем его на страницу входа
            new Promise((resolve) => {
              resolve(cookie.remove("token"));
            }).then(() => location.push("/auth/login"));
          }
        }).catch((err) => {
          throw err;
        });
    });
  }
}());