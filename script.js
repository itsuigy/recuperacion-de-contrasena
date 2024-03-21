function github() {
    window.open('https://github.com/itsuigy/recuperacion-de-contrasena');
}

function showRegistrationForm() {
    document.getElementById("registrationForm").style.display = "block";
    document.getElementById("registrationForm").classList.add("slide-in");
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("forgotPasswordForm").style.display = "none";
}

function showLoginForm() {
    document.getElementById("registrationForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("forgotPasswordForm").style.display = "none";
}

function showForgotPasswordForm() {
    document.getElementById("forgotPasswordForm").style.display = "block";
    document.getElementById("forgotPasswordForm").classList.add("slide-in");
    document.getElementById("loginForm").style.display = "none";
}
