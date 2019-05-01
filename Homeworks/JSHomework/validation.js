var nameExpr = /^[\w\s.-]+$/;

function formValidation() {
    var user_name = document.getElementById("user_name");
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");
    var response = true;

    // Username checks
    if (user_name.value.trim().length === 0) {
        document.getElementById("username_error").innerHTML = "Please enter your username *";
        response = false;
    } else if (user_name.value.length < 3 || user_name.value.length > 10) {
        document.getElementById("username_error").innerHTML = "Name must be between 3 and 10 characters!";
        response = false;
    } else if (!user_name.value.match(nameExpr)) {
        document.getElementById("username_error").innerHTML = "Name can contain only letters, numbers and _!";
        response = false;
    } else {
        document.getElementById("username_error").innerHTML = "";
    }

    // Password checks
    if (password.value.trim().length === 0) {
        document.getElementById("password_error").innerHTML = "Please enter your password *";
        response = false;
    } else if (password.value.length < 6) {
        document.getElementById("password_error").innerHTML = "Password should be at least 6 characters!";
        response = false;
    } else if (password.value.search(/[0-9]/) < 0 ||  password.value.search(/[a-z]/) < 0 || password.value.search(/[A-Z]/) < 0){
        document.getElementById("password_error").innerHTML = "Password should contain at least one uppercase, one lowercase letter and one number!";
        response = false;
    } else {
        document.getElementById("password_error").innerHTML = "";
    }

    // Confirm password checks
    if (confirm_password.value.trim().length == 0){
        document.getElementById("confirm_pass_error").innerHTML = "Please enter your password *";
        response = false;
    } else if (password.value != confirm_password.value) {
        document.getElementById("confirm_pass_error").innerHTML = "Passwords don't match!";
        response = false;
    } else {
        document.getElementById("confirm_pass_error").innerHTML = "";
    }

    if (response) {
        $.ajax({
            type: "POST",
            url: "register.php",
            data: "formdata",
            success: true,
        });
    }
    return false;
}