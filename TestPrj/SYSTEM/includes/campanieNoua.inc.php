<?php
    function newCampaignInDB()
    {
        require "dbh.inc.php";
        $name = $_GET['name'];
        $description =  $_GET['description'];
        $type = $_GET['type'];
        $category =  $_GET['category'];
        $begining = $_GET['begining'];
        $duration =  $_GET['duration'];
        $hour = $_GET['hour'];
        $location = $_GET['location'];
        $location_address = $_GET['location_address'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $sql="INSERT INTO campanii (name, description, type, category, duration, begining, hour, 
        location, location_address, phone, email)
        VALUES ('$name',
        '$description',
        '$type',
        '$category','$duration','$begining','$hour',
        '$location','$location_address','$phone','$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            if(strstr($conn->error, 'Duplicate'))
            {
                echo "Numele campaniei coincide cu alt nume de campanie,va rugam sa introduceti altul!";
            }
                else
                    echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
    }
    newCampaignInDB();
    ?>