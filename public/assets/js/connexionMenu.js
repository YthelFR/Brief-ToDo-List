// ---- OPEN MENU CONNEXION --- //

let profile = document.querySelector("#profile");
let navbar = document.querySelector("#navbar");

export default function menuConnexion() {
  profile.addEventListener("click", () => {
    navbar.classList.toggle("fixed");
    navbar.classList.toggle("hidden");
  });
}
