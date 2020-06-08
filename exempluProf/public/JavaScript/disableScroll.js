function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("overlay-checkbox");
    // Get the output text
    var text = document.getElementById("main-cont");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        text.style.display = "none";
    } else {
        text.style.display = "block";
    }
}