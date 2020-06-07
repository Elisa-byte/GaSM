<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <?php
        $name = $_POST['name'];
        $description = $_POST['description'];
        if(!empty($_POST["duration"]))
        {
            $duration = $_POST['duration'];
            $DURATION = $duration;
        }
        else
        {
            $duration = "-";
            $DURATION = "";
        }
        if(!empty($_POST["begining"]))
        {
            $begining = $_POST['begining'];
            $BEGINING = $begining;
        }
        else
        {
            $begining = "-";
            $BEGINING = "";
        }
        if(!empty($_POST["hour"]))
        {
            $HOUR = $_POST["hour"];
            if($_POST["hour"]==1)
            {
                $hour = "AM";
            }
            else
            {
                $hour = "PM";
            }
        }
        else
        {
            $hour = "-";
            $HOUR = "";
        }
        $TYPE = $_POST["type"];
        if($_POST['type']==1)
        {
            $type = "Strangere de fonduri";
        }
        else
        {
            if($_POST["type"]==2)
            {
                $type = "Meeting";
            }
            else
            {
                $type = "Mesaj";
            }
        }
        $CATEGORY = $_POST['category'];
        if($_POST['category']==1)
        {
            $category = "Cetateni";
        }
        else
        {
            if($_POST["category"]==2)
            {
                $category = "Personal autorizat";
            }
            else
            {
                $category = "Oricine";
            }
        }
        if(!empty($_POST["location"]))
        {
            $location = $_POST['location'];
            $LOCATION = $location;
        }
        else
        {
            $location = "-";
            $LOCATION = "";
        }
        if(!empty($_POST["location-address"]))
        {
            $location_address = $_POST['location-address'];
            $LOCATION_ADDRESS = $location_address;
        }
        else
        {
            $location_address = "-";
            $LOCATION_ADDRESS = "";
        }
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        // require_once('includes/formularCampanie.inc.php');
    ?>
    <ol>
        <li><em>Name:</em> <?php echo $name;?></li>
        <li><em>Description:</em> <?php echo $description;?></li>
        <li><em>Duration:</em> <?php echo $duration;?></li>
        <li><em>Begining hour:</em> <?php echo $begining;?></li>
        <li><em>Hour:</em> <?php echo $hour;?></li>
        <li><em>Type:</em> <?php echo $type;?></li>
        <li><em>Category:</em> <?php echo $category;?></li>
        <li><em>Location:</em> <?php echo $location;?></li>
        <li><em>Location_address:</em> <?php echo $location_address;?></li>
        <li><em>Phone:</em> <?php echo $phone;?></li>
        <li><em>Email:</em> <?php echo $email;?></li>
    </ol>
    Informatii incorecte:
    <button onclick="goBack()">Go Back</button>
    <script>
    function goBack() {
    window.history.back();
    }
    </script>
    </br>
    Informatii corecte:
    <form>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <button type="button" id="test"> Continue </button>
    <input type="hidden" id="val" value="true"> <!--download filename value true and false-->

    <script>
    $(function(){
        $('#test').click(function(){

            var val = $("#val").val();
            var name = "<?php echo $name; ?>";
            var description = "<?php echo $description; ?>";
            var duration = "<?php echo $DURATION; ?>";
            var type = "<?php echo $TYPE; ?>";
            var category = "<?php echo $CATEGORY; ?>";
            var begining = "<?php echo $BEGINING; ?>";
            var hour = "<?php echo $HOUR; ?>";
            var location = "<?php echo $LOCATION; ?>";
            var location_address = "<?php echo $LOCATION_ADDRESS; ?>";
            var phone = "<?php echo $phone; ?>";
            var email = "<?php echo $email; ?>";

            $.ajax({
                url: './campanieNoua.inc.php?&name=' + name +
                 '&description=' + description + '&type=' + 
                 type + '&category=' + category + '&duration=' + 
                 duration + '&begining=' + begining + '&hour=' + 
                 hour + '&location=' + location + '&location_address=' + 
                 location_address + '&phone=' + phone + '&email=' + 
                 email,
                type: 'GET', // get method
                data: 'download='+val+name,
                  success: function(data) {
                    alert(data);
                  },
                  error: function(data) {
                    alert(data);
                  }
            });
            
        });
    });
    </script>
    </form>
    </body>
</html>