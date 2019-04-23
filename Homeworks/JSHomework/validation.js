function formValidation() {
    var user_name = document.forms["register_form"]["user_name"].value;
    var password = document.forms["register_form"]["password"].value;
    var confirm_password = document.forms["register_form"]["confirm_password"].value;
    
    if (user_name.length < 3 || user_name.length > 10) {
        document.forms["register_form"]["user_name"].style.border = "1px solid red";
        document.getElementById("userNameAlert").innerHTML = "Name must be between 3 and 10 characters!";
        return false;
    }

    var nameExpr = /^[\w\s.-]+$/;
    if (!user_name.match(nameExpr)) {
        document.forms["register_form"]["user_name"].style.border = "1px solid red";
        document.getElementById("userNameAlert").innerHTML = "Name can contain only letters, numbers and _";
        return false;
    }

    if (password.length < 6) {
        document.forms["register_form"]["password"].style.border = "1px solid red";
        document.getElementById("passAlert").innerHTML = "Password should be at least 6 characters!";
        return false;
    }

    var passExpr = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])$/;
    if (password.search(/[0-9]/) < 0 ||  password.search(/[a-z]/) < 0 || password.search(/[A-Z]/) < 0){
        document.forms["register_form"]["password"].style.border = "1px solid red";
        document.getElementById("passAlert").innerHTML = "Password should contain at least one uppercase, one lowercase letter and one number!";
        return false;
    }

    if (password != confirm_password) {
        document.forms["register_form"]["confirm_password"].style.border = "1px solid red";
        document.getElementById("confirmPassAlert").innerHTML = "Passwords don't match!";
        return false;
    }


}