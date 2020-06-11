function getUserInfo(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("userSpot").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("userSpot").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "admin/getUser?username=" + str, true);
    xhttp.send();
}