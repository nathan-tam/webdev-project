//ryan
document.addEventListener('DOMContentLoaded', function () {

    var usernamefield = document.getElementById('username');
    usernamefield.addEventListener('input', validateForm);
    
    var passwordfield = document.getElementById('password');
    passwordfield.addEventListener('input', validateForm);

    let confirmPasswordField = document.getElementById("confirmPassword");
    if (confirmPasswordField != null){
        passwordfield.addEventListener('input', validateForm); 
    }

    document.getElementById("loginForm").addEventListener("submit", function(event) {
        if (!validateForm()){
            event.preventDefault();
        }
    });

});


function validateForm() {
    let name = document.getElementById("username").value;
    let password = document.getElementById("password").value;    
    let confirmPasswordField = document.getElementById("confirmPassword");

    let nameError = document.getElementById("nameError");
    let passwordError = document.getElementById("passwordError");
    let confirmError = document.getElementById("confirmError");
    

    // clear the previous errors
    nameError.textContent = "";
    passwordError.textContent = "";
    if (confirmError != null){
        confirmError.textContent = "";
    }
    
    
    let valid = true;

    // checks if the username field is empty or invalid
    const usernamePattern = /^[a-zA-Z0-9_]+$/;

    if (name === "") {
        nameError.textContent = "Username is required.";
        valid = false;
    } else if (!usernamePattern.test(name)) {
        nameError.textContent = "Invalid username.";
        valid = false;
    }
    
    // checks if the password field is empty
    if (password === "") {
        passwordError.textContent = "Password is required.";
        valid = false;
    // checks if the confirm password field is empty
    } else if (passwordError != null && confirmPassword === "") {
        confirmError.textContent = "Password confirmation is required!";
        valid = false;
    // checks if the password matches the password confirmation
    } else if (confirmError != null && password !== confirmPassword.value) {
        confirmError.textContent = "The passwords do not match!";
        valid = false;
    }

    return valid;
}

