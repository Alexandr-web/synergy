import PasswordGenerate from "../PasswordGenerate";
import Element from "../Element";

export default (setNow = false, btnSelector = ".js-btn-generate-password", inputSelector = ".js-input-password") => {
  const btn = document.querySelector(btnSelector);
  const input = new Element(inputSelector);

  if (setNow) {
    input.setText(new PasswordGenerate(20).init());
  }

  btn.addEventListener("click", () => input.setText(new PasswordGenerate(20).init()));
};