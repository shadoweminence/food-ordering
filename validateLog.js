
function validateLogForm() {
  var username = document.forms["loginForm"]["email"].value;
  var password = document.forms["loginForm"]["password"].value;

  if (username === "") {
    alert("Please enter your email.");
    return false;
  }
  if (password === "") {
    alert("Please enter your password.");
    return false;
  }

  return true;
}




