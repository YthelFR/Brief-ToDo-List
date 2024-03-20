export default function handleLogin() {
  let email = document.querySelector(".emailInput").value;
  let password = document.querySelector(".passwordInput").value;

  let emailCrendentials = {
    email: email,
    password: password,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(emailCrendentials),
  };

  fetch("./login.php", params)
    .then((res) => res.text())
    .then((data) => console.log("success"));
}
