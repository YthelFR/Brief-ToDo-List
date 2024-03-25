export default function afficherMenuRegister() {
  let buttonRegister = document.querySelector("#register");
  let registerBar = document.querySelector("#registerBar");

  buttonRegister.addEventListener("click", () => {
    registerBar.classList.toggle("static");
    registerBar.classList.toggle("hidden");
  });
}
