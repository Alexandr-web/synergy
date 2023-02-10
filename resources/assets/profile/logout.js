import Cookie from "../Cookie";
import Location from "../Location";

// Выход из учетной записи
(function () {
  const cookie = new Cookie();
  const location = new Location();

  // Удаление токена пользователя и перенаправление его на страницу входа
  new Promise((resolve) => {
    resolve(cookie.remove("token"));
  }).then(() => {
    location.push("/auth/login");
  });
}());