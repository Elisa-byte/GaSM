<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <base href="<?php echo $base_location ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/formularCampanie.css">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/styles.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>

    <title>Formular Campanie</title>
</head>

<body>
    <?php require_once 'app/views/includes/topnav.php' ?> 

    <main class="main-content" id="main-cont" >
    <div class="bg-img">
        <form class="form-campaign" method="POST" action="user/verificareFormularCampanie" enctype="multipart/form-data">
            <h1 class="form-title"> Formular de inregistrare campanie</h1>
            <div class="two-rows">
                <div class="one-column">
                    <input class="form-input" type="text" name="name" placeholder="Numele Campaniei" required>
                    <input class="form-input" type="text" name="description" placeholder="Descrierea Campaniei" required>
                    <input class="form-input" type="text" name="duration" placeholder="Durata Campaniei(ore,minute,ex:1h15m)" pattern="[0-9]*h[0-9]*m"/>
                    <input class="form-input" type="text" name="begining" placeholder="Ora de inceput a  Campaniei(ex: 01:15)" pattern="(((0[1-9])|(1[0-2])):([0-5])[(0-9)])"/>
                    <p>
                        AM : <input type="radio" name="hour" value="AM" /><br /> PM : <input type="radio" name="hour" value="PM" /><br />
                    </p>
                </div>
                <div class="one-column">
                    <div class="group, form-input, choose">
                        <label class="label">Tipul campaniei</label>
                        <div class="selection-campaign-type">
                            <select  required="required" name="type" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                            <option disabled="disabled" selected="selected" value="">Alegeti o optiune</option>
                            <option value="1">Strangere de fonduri</option>
                            <option value="2">Meeting</option>
                            <option value="3">Mesaj</option>
                        </select>
                        </div>
                    </div>
                    <div class="group, form-input, choose">
                        <label class="label">Destinatia camppaniei</label>
                        <div class="selection-category-person">
                        <select  required="required" name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                        <option disabled="disabled" selected="selected" value="">Alegeti o optiune</option>
                        <option value="1">Cetateni</option>
                        <option value="2">Personal autorizat</option>
                        <option value="3">Oricine</option>
                    </select>
                        </div>
                    </div>
                    <div class="group, form-input, choose">
                        <label class="label">Orasul-locatie</label>
                        <div class="selection-location-person">
                            <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                        <option value="42">Alba</option>
                        <option value="1">Arad</option>
                        <option value="2">Arges</option>
                        <option value="3">Bacau</option>
                        <option value="4">Bihor</option>
                        <option value="5">Bistrita-Nasaud</option>
                        <option value="6">Botosani</option>
                        <option value="7">Braila</option>
                        <option value="8">Brasov</option>
                        <option value="9">BUCURESTI</option>
                        <option value="10">Buzau</option>
                        <option value="11">Calarasi</option>
                        <option value="12">Caras-Severin</option>
                        <option value="13">Cluj</option>
                        <option value="14">Constanta</option>
                        <option value="15">Covasna</option>
                        <option value="16">Dambovita</option>
                        <option value="17">Dolj</option>
                        <option value="18">Galati</option>
                        <option value="19">Giurgiu</option>
                        <option value="20">Gorj</option>
                        <option value="21">Harghita</option>
                        <option value="22">Hunedoara</option>
                        <option value="23">Ialomita</option>
                        <option value="24">Iasi</option>
                        <option value="25">Ilfov</option>
                        <option value="26">Maramures</option>
                        <option value="27">Mehedinti</option>
                        <option value="28">Mures</option>
                        <option value="29">Neamt</option>
                        <option value="30">Olt</option>
                        <option value="31">Prahova</option>
                        <option value="32">Salaj</option>
                        <option value="33">Satu Mare</option>
                        <option value="34">Sibiu</option>
                        <option value="35">Suceava</option>
                        <option value="36">Teleorman</option>
                        <option value="37">Timis</option>
                        <option value="38">Tulcea</option>
                        <option value="39">Valcea</option>
                        <option value="40">Vaslui</option>
                        <option value="41">Vrancea</option>
                    </select>
                        </div>
                    </div>
                    <input class="form-input" type="text" name="location-address" placeholder="Adresa locatiei">
                    <input class="form-input" type="text" name="event-date" placeholder="Data evenimentului(ex:2000.08.31)" pattern="(?:19|20)[0-9]{2}.(?:(?:0[1-9]|1[0-2]).(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"/>
                </div>
            </div>
            <h4 class="form-title">Date de contact</h4>
            <div class="two-rows">
                <div class="one-column">
                    <input class="form-input" type="text" name="phone" placeholder="Numarul de telefon" pattern="\+?[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]*" required>
                </div>
                <div class="one-column">
                    <input class="form-input" type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
            </div>
            <?php
            // if(count($_FILES) > 0) {
            //     echo "OOO";
            //     if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            //         require_once "db.inc.php";
            //         $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	        //         $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	
	        //         $sql = "INSERT INTO output_images(imageType ,imageData)
	        //         VALUES('{$imageProperties['mime']}', '{$imgData}')";
    	    //         $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
	        //         if(isset($current_id)) {
		    //             header("Location: listImg.php");
	        //         }
            //     }
            // }
            ?>
            <div class ="frmImageUpload">
                    <label>Incarca o imagine pentru Campanie:</label><br/>
                    <input name="userImage" type="file" class="inputFile" />
                    <!-- <input type="submit" value="Submit image" class="btnSubmit" name="submitImg/> -->
            </div>
            <div class="space">
            </div>
            <button type="submit" class="btn" name="signup-campanie">Inregistrare</button>
        </form>
    </div>
    </main>

    <!-- <?php require_once 'app/views/includes/footer.php'?> -->
</body>

</html>