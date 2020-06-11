function myFunction() {
    var x = document.getElementById("profile_settings_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  var validateForm = function() {
    var checks = $('input[type="checkbox"]:checked').map(function() {
      return $(this).val();
    }).get()
    console.log(checks);
    return false;
  }