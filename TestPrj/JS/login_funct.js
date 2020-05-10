function myFunction() {
    var x = document.getElementById("profile_settings_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}