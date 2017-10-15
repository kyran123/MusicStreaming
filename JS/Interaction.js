$(document).ready(function(){
    showLoginForm();
    if(Cookies.get("userLoggedIn") === undefined){
        document.querySelector("#focusContainer").style.display = "block";
    }

    var errorMessages = document.querySelectorAll(".errorMessage");
    for(var i = 1; i < errorMessages.length; i++){
        if(errorMessages[i].innerHTML.length > 0){
            showRegisterForm();
            return;
        }
    }
});

function showLoginForm(){
    document.querySelector("#loginForm").style.display = "block";
    document.querySelector("#registerForm").style.display = "none";
}

function showRegisterForm() {
    document.querySelector("#loginForm").style.display = "none";
    document.querySelector("#registerForm").style.display = "block";
}