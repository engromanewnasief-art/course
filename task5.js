function checkPassword() {

    let password = document.getElementById("password").value;
    let message = document.getElementById("message");

    if (password.length < 10) {
        message.innerHTML = "Password must be at least 10 characters.";
    }
    else if (
        !password.includes("%") &&
        !password.includes("*") &&
        !password.includes("+") &&
        !password.includes("=") &&
        !password.includes("_")
    ) {
        message.innerHTML = "Password must contain one symbol (% * + = _).";
    }
    else {
        message.innerHTML = "Password is valid.";
    }
}
setTimeout(function () {
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
}, 10000);