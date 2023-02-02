import Cookie from "../Cookie";
import Location from "../Location";

(function () {
  const cookie = new Cookie();
  const location = new Location();

  new Promise((resolve) => {
    resolve(cookie.remove("token"));
  }).then(() => {
    location.push("/auth/login");
  });
}());