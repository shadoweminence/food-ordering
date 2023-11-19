function validateRegForm() {
  var username = document.forms["registerForm"]["name"].value;
  var email = document.forms["registerForm"]["email"].value;
  var password = document.forms["registerForm"]["password"].value;
  var confirmPassword = document.forms["registerForm"]["cpassword"].value;

  if (username === "") {
    alert("Please enter a username.");
    return false;
  }

  if (password === "") {
    alert("Please enter a password.");
    return false;
  }

  if (password.length < 6) {
    alert("Password must be at least 6 characters long.");
    return false;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  if (email === "") {
    alert("Please enter an email address.");
    return false;
  }

  if (!isValidEmail(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  return true;
}

function isValidEmail(email) {
  var emailRegex = /^\S+@\S+\.\S+$/;
  return emailRegex.test(email);
}