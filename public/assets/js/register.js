async function handleRegister() {
  // Première étape, on récupere les values des inputs
  let firstName = document.querySelector(".firstName").value;
  let lastName = document.querySelector(".lastName").value;
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;
  let confirm = document.querySelector(".confirm").value;

  let user = {
    firstName: firstName,
    lastName: lastName,
    mail: email,
    password: password,
    confirm: confirm,
   };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(user),
  };
  console.log(user);
  let treatmentCall = fetch("/../src/traitement_user.php", params);
  let response = await treatmentCall;
  let data = await response.json();
  console.log(data);
  console.log(response);

}
