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
            switch ($_POST['location']) {
                case "42":
                    $location = "Alba";
                    break;
                case "1":
                    $location = "Arad";
                    break;
                case "2":
                    $location = "Arges";
                    break;
                case "3":
                    $location = "Bacau";
                    break;
                case "4":
                    $location = "Bihor";
                    break;
                case "5":
                    $location = "Bistrita-Nasaud";
                    break;
                case "6":
                    $location = "Botosani";
                    break;
                case "7":
                    $location = "Braila";
                    break;
                case "8":
                    $location = "Brasov";
                    break;
                case "9":
                    $location = "BUCURESTI";
                    break;
                case "10":
                    $location = "Buzau";
                    break;
                case "11":
                    $location = "Calarasi";
                    break;
                case "12":
                    $location = "Caras-Severin";
                    break;
                case "13":
                    $location = "Cluj";
                    break;
                case "14":
                    $location = "Constanta";
                    break;
                case "15":
                    $location = "Covasna";
                    break;
                case "16":
                    $location = "Dambovita";
                    break;
                case "17":
                    $location = "Dolj";
                    break;
                case "18":
                    $location = "Galati";
                    break;
                case "19":
                    $location = "Giurgiu";
                    break;
                case "20":
                    $location = "Gorj";
                    break;
                case "21":
                    $location = "Harghita";
                    break;
                case "22":
                    $location = "Hunedoara";
                    break;
                case "23":
                    $location = "Ialomita";
                    break;
                case "24":
                    $location = "Iasi";
                    break;
                case "25":
                    $location = "Ilfov";
                    break;
                case "26":
                    $location = "Maramures";
                    break;
                case "27":
                    $location = "Mehedinti";
                    break;
                case "28":
                    $location = "Mures";
                    break;
                case "29":
                    $location = "Neamt";
                    break;
                case "30":
                    $location = "Olt";
                    break;
                case "31":
                    $location = "Prahova";
                    break;
                case "32":
                    $location = "Salaj";
                    break;
                case "33":
                    $location = "Satu Mare";
                    break;
                case "34":
                    $location = "Sibiu";
                    break;
                case "35":
                    $location = "Suceava";
                    break;
                case "36":
                    $location = "Teleorman";
                    break;
                case "37":
                    $location = "Timis";
                    break;
                case "38":
                    $location = "Tulcea";
                    break;
                case "39":
                    $location = "Valcea";
                    break;
                case "40":
                    $location = "Vaslui";
                    break;
                case "41":
                    $location = "Vrancea";
                    break;
              }
            $LOCATION = $_POST['location'];
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
        if(!empty($_POST["event-date"]))
        {
            $event_date = $_POST["event-date"];
            $EVENT_DATE = $event_date;
        }
        else
        {
            $event_date = "-";
            $EVENT_DATE = "";
        }
        
        // require_once('includes/formularCampanie.inc.php');
        if(!empty($_FILES))
        {
            $IM = "YES";
        }
        else
        {
            $IM ="NO";
        }
    ?>
    <ol>
        <li><em>Name:</em> <?php echo $name;?></li>
        <li><em>Description:</em> <?php echo $description;?></li>
        <li><em>Event date:</em> <?php echo $event_date;?></li>
        <li><em>Duration:</em> <?php echo $duration;?></li>
        <li><em>Begining hour:</em> <?php echo $begining;?></li>
        <li><em>Hour:</em> <?php echo $hour;?></li>
        <li><em>Type:</em> <?php echo $type;?></li>
        <li><em>Category:</em> <?php echo $category;?></li>
        <li><em>Location:</em> <?php echo $location;?></li>
        <li><em>Location_address:</em> <?php echo $location_address;?></li>
        <li><em>Image for campaign:</em> <?php echo $IM;?></li>
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
            var event_date = "<?php echo $EVENT_DATE; ?>";
            <?php
            $current_id = "";
            if(!empty($_FILES))
            {
                if(count($_FILES) > 0) {
                    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                        require_once "dbh.inc.php";
                        $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
                    
                        $sql = "INSERT INTO campanii_images(imageType ,imageData)
                        VALUES('{$imageProperties['mime']}', '{$imgData}')";
                        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                        if(isset($current_id)) {
                            header("./listImages.php");
                        }
                    }
                }
            }
            ?>
            var imageId = "<?php echo $current_id;?>";

            $.ajax({
                url: './campanieNoua.inc.php?&name=' + name +
                 '&description=' + description + '&type=' + 
                 type + '&category=' + category + '&event_date=' + 
                 event_date + '&duration=' + duration + '&begining=' + 
                 begining + '&hour=' + hour + '&location=' + 
                 location + '&location_address=' + location_address + '&phone=' + 
                 phone + '&email=' + email + "&imageId=" + imageId,
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