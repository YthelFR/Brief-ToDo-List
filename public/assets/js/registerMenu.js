export default function registerMenu() {
  let loginBar = document.querySelector("#navbar");
  let registerBar = document.querySelector("#registerBar");
  let buttonRegisterBar = document.querySelector("#buttonRegisterBar");

  buttonRegisterBar.addEventListener("click", () => {
    loginBar.classList.toggle("fixed");
    loginBar.classList.toggle("hidden");
    registerBar.classList.toggle("fixed");
    registerBar.classList.toggle("hidden");
  });
}
