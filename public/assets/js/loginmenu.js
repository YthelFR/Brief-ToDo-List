export default function loginmenu() {
  let profile = document.querySelector("#profile");
  let navbar = document.querySelector("#loginBar");

  profile.addEventListener("click", () => {
    navbar.classList.toggle("fixed");
    navbar.classList.toggle("hidden");
  })


}