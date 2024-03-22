async function CreateThisUser() {
  // Première étape, on récupere les values des inputs
  let firstName = document.querySelector(".firstName").value;
  let lastName = document.querySelector(".lastName").value;
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;

  // On construit un objet dont les clefs ( nom de champs) doivent être identiques à la classe User.
  let user = {
    Firstname: firstName,
    Lastname: lastName,
    Mail: email,
    Password: password,
  };

  // On crée les paramètres de la requête HTTP qui sera envoyée à PHP
  let params = {
    // Méthode HTPP Post ( pour que le traitement puisse vérifier avec if(isset($_POST)))
    method: "POST",
    // On précise toujours le format de la requête HHTP
    // Ici du json, mais ca pourrait être du form data, du form url encoded , etc...
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    // Dans le corp de la requêter HTTP, va se trouver la donnée
    // On va lui passer nos données de l'objet user crée précédement

    body: JSON.stringify(user),
  };

  fetch("#", params)
    .then((res) => res.text())
    .then((data) => {
      console.log(data);
      let registerForm = document.querySelector("formRegister");
      // registerForm.style.display= "none"
    });

  // fetch("/../../src/Includes/Register.php", params)
  //   .then((res) => res.text())
  //   .then((data) => {
  //     console.log(data);
  //     let registerForm = document.querySelector("formRegister");
  //     // registerForm.style.display= "none"
  //     if (data === "Email already taken") {
  //       console.log(data);
  //       let toast = document.querySelector(".toast");
  //       toast.innerText = data;
  //     } else if (data == 1) {
  //       registerForm.style.display = "none";
  //     }
  //   });
}