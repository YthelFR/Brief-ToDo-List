async function handleRegister() {
  let firstName = document.querySelector(".firstName").value;
  let lastName = document.querySelector(".lastName").value;
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;
  let confirm = document.querySelector(".confirm").value;
let resultat = document.querySelector('#home');

  // let user = {
  //   Lastname: lastName,
  //   Firstname: firstName,
  //   Mail: email,
  //   Password: password,
  //   Confirm: confirm,
  // };

  // let params = {
  //   method: "POST",
  //   headers: {
  //     "Content-Type": "application/json; charset=utf-8",
  //   },
  //   body: JSON.stringify(user),
  // };
  // console.log(user);
  // let treatmentCall = fetch("/../src/traitement_user.php", params);
  // let response = await treatmentCall;
  // console.log(response);

  fetch("/../src/traitement_user.php", {
    method: "POST", // *GET, POST, PUT, DELETE, etc.
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "same-origin", // include, *same-origin, omit
    headers: {
      "Content-Type": "application/json",
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify({
      'Lastname': lastName,
      'Firstname': firstName,
      'Mail': email,
      'Password': password,
      'Confirm': confirm
  }), // le type utilisé pour le corps doit correspondre à l'en-tête "Content-Type"

  }).then((response) => {
    if (!response.ok) {
      throw new Error("La réponse du serveur n'est pas OK");
    }
  
    return response.json(); // transforme la réponse JSON reçue en objet JavaScript natif
  })
  .then(data => {
    // Manipulation des données obtenues  
   
    resultat.innerHTML += data  + "<br>";
  })
  .catch(error => {
    // Gestion des erreurs
    console.error('Une erreur s\'est produite:', error);
  });

}


