import PasswordGenerate from "../PasswordGenerate";

(function () {
  const btn = document.querySelector(".js-btn-generate-password");
  const input = document.querySelector(".js-input-password");

  input.value = new PasswordGenerate(20).init();

  btn.addEventListener("click", () => input.value = new PasswordGenerate(20).init());
}());