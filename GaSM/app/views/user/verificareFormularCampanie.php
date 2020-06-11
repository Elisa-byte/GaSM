<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifica Date</title>
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" href="public/stylesheets/styles.css">
</head>
<body>
<?php require_once 'app/views/includes/topnav.php' ?> 
<main class="main-content" id="main-cont">

    <h1>Vă mulțumim!</h1>
    <p>Aici aveți informațiile completate ded dumneavoastră</p>

    <table class="campaign-info">
  <tr>
    <td>Nume:</td>
    <td><?php echo $data['name'];?></td>
  </tr>
  <tr>
    <td>Descriere</td>
    <td><?php echo $data['description'];?></td>
  </tr>
  <tr>
    <td>Data evenimentului:</td>
    <td><?php echo $data['event_date'];?></td>
  </tr>
  <tr>
    <td>Durată:</td>
    <td><?php echo $data['duration'];?></td>
  </tr>
  <tr>
    <td>Ora la care începe:</td>
    <td><?php echo $data['begining'];?></td>
  </tr>
  <tr>
    <td>Ora:</td>
    <td><?php echo $data['hour'];?></td>
  </tr>

  <tr>
    <td>Tipul campaniei:</td>
    <td> <?php echo $data['type'];?></td>
  </tr>
  <tr>
    <td>Categorie:</td>
    <td><?php echo $data['category'];?></td>
  </tr>
  <tr>
    <td>Locație:</td>
    <td><?php echo $data['location'];?></td>
  </tr>  <tr>
    <td>Adresa locației:</td>
    <td><?php echo $data['location_address'];?></td>
  </tr>
  <tr>
    <td>Imagine destinată campaniei:</td>
    <td><?php echo $data['IM'];?></td>
  </tr>
  <tr>
    <td>Telefon inițiator:</td>
    <td><?php echo $data['phone'];?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo $data['email'];?></td>
  </tr>
</table>    
    </br>
    <form>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <button class="shadow-button" type="button" id="test"> Continue </button>
    <input type="hidden" id="val" value="true"> <!--download filename value true and false-->

    <script>
    $(function(){
        $('#test').click(function(){

            var val = $("#val").val();
            var name = "<?php echo $data ['name']; ?>";
            var description = "<?php echo $data ['description']; ?>";
            var duration = "<?php echo $data ['durationdb']; ?>";
            var type = "<?php echo $data ['typedb']; ?>";
            var category = "<?php echo $data ['categorydb']; ?>";
            var begining = "<?php echo $data ['beginingdb']; ?>";
            var hour = "<?php echo $data ['hourdb']; ?>";
            var location = "<?php echo $data ['locationdb']; ?>";
            var location_address = "<?php echo $data ['location_addressdb']; ?>";
            var phone = "<?php echo $data ['phone']; ?>";
            var email = "<?php echo $data ['email']; ?>";
            var event_date = "<?php echo $data ['event_datedb']; ?>";

            var imageId = "<?php echo $data['current_id'];?>";

            $.ajax({
                url: 'user/createNewCampaign?&name=' + name +
                 '&description=' + description + '&type=' + 
                 type + '&category=' + category + '&event_date=' + 
                 event_date + '&duration=' + duration + '&begining=' + 
                 begining + '&hour=' + hour + '&location=' + 
                 location + '&location_address=' + location_address + '&phone=' + 
                 phone + '&email=' + email+ "&imageId=" + imageId,
                type: 'GET', // get method
                data: 'download='+val+name,
                  success: function(data) {
                    alert(data);
                    window.location = 'home';
                  },
                  error: function(data) {
                    alert(data);
                    window.location = 'home';
                  }
            });
            
        });
    });
    </script>
    </form>
</main>
    <?php require_once 'app/views/includes/footer.php' ?> 
    </body>
</html>