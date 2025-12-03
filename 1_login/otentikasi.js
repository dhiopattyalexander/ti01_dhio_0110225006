function login() {
    event.preventDefault();

    let uname = document.getElementById("username").value;
    let pass = document.getElementById("password").value;
    let msgElement = document.getElementById("message");

    let validUsers = {
        "iuno": "wuwa",
        "alex2025": "phoebe",
        "admin": "admin123",
        "mahasigma": "alek"
    };

    if (validUsers[uname] && validUsers[uname] == pass) {
        alert("Login Sukses");
        window.location.href = "success.html"; 
        return true;
    } else {
        alert("Login Gagal"); 
        document.getElementById("password").value = "";
        document.getElementById("password").focus();

        if (msgElement) {
            msgElement.innerHTML = "Login Gagal! Username atau Password salah.";
            msgElement.style.color = "red";
        }
        return false; 
    }
}