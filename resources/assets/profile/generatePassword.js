import PasswordGenerate from "../PasswordGenerate";

(function () {
  const btn = document.querySelector(".js-btn-generate-password");

  if (btn) {
    const input = document.querySelector(".js-input-password");

    btn.addEventListener("click", () => input.value = new PasswordGenerate(20).init());
  }
}());