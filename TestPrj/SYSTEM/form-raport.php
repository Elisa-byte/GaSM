
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/GaSM/JavaScript/viewPassword.js"></script>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <script src="JavaScript/viewMap.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <title>FormularRaportare</title>

</head>

<body>
<div class="main-content">
    <div class="container-report">
        <div class="wrap-report">
            <div class="card-4 ">
                <div class="testbox">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyObserve') {
                            echo '<p class="help-block" > Nu ati facut o alegere la prima intrebare!</p> ';
                        } else if ($_GET['error'] == 'emptyRecognize') {
                            echo '<p class="help-block" > Nu ati facut o alegere la a doua intrebare!</p> ';
                        } else if ($_GET['error'] == 'emptyType') {
                            echo '<p class="help-block" > Nu ati ales tipul de gunoi depozitat ilegal vazut!</p> ';
                        } else if ($_GET['error'] == 'emptyQuantity') {
                            echo '<p class="help-block" > Nu ati ales cantitatea de gunoi depozitat ilegal vazuta!</p> ';
                        } else if ($_GET['error'] == 'emptyJudet') {
                            echo '<p class="help-block" > Nu ati ales un judet!</p> ';
                        } else if ($_GET['error'] == 'emptyLocalitate') {
                            echo '<p class="help-block" > Nu ati completat cu o localitate valida!</p> ';
                        } else if ($_GET['error'] == 'emptyStreet') {
                            echo '<p class="help-block" > Nu ati completat cu o strada valida!</p> ';
                        } else if ($_GET['error'] == 'emptyDate') {
                            echo '<p class="help-block" > Nu ati ales data corespunzatoare raportarii!</p> ';
                        }
                    }
                    ?>
                    <form class="form-login" action="includes/form-raport.inc.php" name="FormularRaportare" method="POST">
                        <h1 class="h1-report">Raportare a depozitului ilegal de gunoi</h1>
                        <div>
                            <h4 class="h4-report">Ati observat dumneavoastra acest incident?*</h4>
                            <div class="question-answer">
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Da" name="observeIncident" />Da</label>
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Nu" name="observeIncident" />Nu</label>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Cunoasteti persoana care a depozitat deseurile?*</h4>
                            <div class="question-answer">
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Da" name="recognizePerson" />Da</label>
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Nu" name="recognizePerson" />Nu</label>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Ce ati vazut depozitat ilegal?*</h4>
                            <div class="question-answer">
                                <div class="selection-category-person">
                                    <select name="typeLitter" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                                        <option value="Electrocasnice">Electrocasnice</option>
                                        <option value="Hartie">Hartie</option>
                                        <option value="Metale">Metale</option>
                                        <option value="Sticla">Sticla</option>
                                        <option value="Plastic">Plastic</option>
                                        <option value="Textile">Textile</option>
                                        <option value="Gunoi menajer">Gunoi menajer</option>
                                        <option value="Materiale de constructie">Materiale de constructie</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Va rugam sa specificati cantitatea de gunoi depozitata ilegal*</h4>
                            <div class="question-answer">
                                <div class="selection-category-person">
                                    <select name="quantity" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o cantitate</option>
                                        <option value="Sub 50kg">Sub 50kg</option>
                                        <option value="Intre 50-100kg">Intre 50-100kg</option>
                                        <option value="Peste 100kg">Peste 100kg</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Numele companiei in cauza: </h4>
                            <div class="question-answer">
                                <input class="form-input" type="text" placeholder="" name="companyName" />
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Va rugam completati cu informatii referitoare la persoana incriminata</h4>
                            <div class="question-answer">
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Masina" name="carType" />Masina</label>
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Remorca" name="carType" />Remorca</label>
                                <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="Aruncate din masini de mare tonaj" name="carType" />Aruncate din masini de mare tonaj</label></br>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Placutele de inmatriculare ale masinii/remorcii </h4>
                            <div class="question-answer">
                                <input class="form-input" type="text" placeholder="ex: VS123AAA" name="licensePlate" />
                            </div>
                        </div>
                        <div>
                             <h4 class="h4-report">Modelul masinii: </h4>
                                 <div class="question-answer">
                                      <div class="selection-category-person">
                                          <select name="colorCar" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                              <option disabled="disabled" selected="selected">Alegeti o culoare</option>
                                              <option value="Alba">Alba</option>
                                              <option value="Neagra">Neagra</option>
                                              <option value="GriArgintie">Gri/Argintie</option>
                                              <option value="Rosie">Rosie</option>
                                              <option value="Galbena">Galbena</option>
                                              <option value="Verde">Verde</option>
                                              <option value="Albastra">Albastra</option>
                                              <option value="Violeta">Violeta</option>
                                              <option value="Mai mult de o culoare">Mai mult de o culoare</option>
                                          </select>
                                      </div>
                                 </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Modelul masinii: </h4>
                            <div class="question-answer">
                                <div class="selection-category-person">
                                    <select name="modelCar" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti un model</option>
                                        <option value="AC">AC</option><option value="Acura">Acura</option><option value="AEC">AEC</option><option value="Ahrens Fox">Ahrens Fox</option><option value="Alfa Romeo">Alfa Romeo</option><option value="Alpine">Alpine</option><option value="Alpine Renault">Alpine Renault</option><option value="Alvis">Alvis</option><option value="AMC">AMC</option><option value="Andretti">Andretti</option><option value="Anhänger">Anhänger</option><option value="Aston Martin">Aston Martin</option><option value="Audi">Audi</option><option value="Auflieger">Auflieger</option><option value="Austin">Austin</option><option value="Auto Union">Auto Union</option><option value="Barkas">Barkas</option><option value="Batman">Batman</option><option value="Büssing">Büssing</option><option value="Bedford">Bedford</option><option value="Benetton">Benetton</option><option value="Bentley">Bentley</option><option value="Berliet">Berliet</option><option value="BMW">BMW</option><option value="Borgward">Borgward</option><option value="Brabham">Brabham</option><option value="Brabus">Brabus</option><option value="Buch">Buch</option><option value="Bugatti">Bugatti</option><option value="Buick">Buick</option><option value="Cadillac">Cadillac</option><option value="Checker">Checker</option><option value="Chevrolet">Chevrolet</option><option value="Chrysler">Chrysler</option><option value="Citroen">Citroen</option><option value="Claas">Claas</option><option value="Commer">Commer</option><option value="Cunningham">Cunningham</option><option value="Dacia">Dacia</option><option value="DAF">DAF</option><option value="Daihatsu">Daihatsu</option><option value="Daimler">Daimler</option><option value="Dallara">Dallara</option><option value="Datsun">Datsun</option><option value="Delage">Delage</option><option value="Delahaye">Delahaye</option><option value="DeLorean">DeLorean</option><option value="Desoto">Desoto</option><option value="Deutz">Deutz</option><option value="Diamond">Diamond</option><option value="Diamond Reo">Diamond Reo</option><option value="Diorama">Diorama</option><option value="DKW">DKW</option><option value="Dodge">Dodge</option><option value="DS">DS</option><option value="Duesenberg">Duesenberg</option><option value="Edsel">Edsel</option><option value="Eicher">Eicher</option><option value="EMW">EMW</option><option value="Fendt">Fendt</option><option value="Ferrari">Ferrari</option><option value="Fiat">Fiat</option><option value="Figur">Figur</option><option value="Ford">Ford</option><option value="Fordson">Fordson</option><option value="Fortschritt">Fortschritt</option><option value="Framo">Framo</option><option value="Freightliner">Freightliner</option><option value="GAZ">GAZ</option><option value="Glas">Glas</option><option value="GM">GM</option><option value="GMC">GMC</option><option value="Goggomobil">Goggomobil</option><option value="Gordini">Gordini</option><option value="Gräf &amp; Stift">Gräf &amp; Stift</option><option value="Hamann">Hamann</option><option value="Hanomag">Hanomag</option><option value="Hanomag-Henschel">Hanomag-Henschel</option><option value="Harley Davidson">Harley Davidson</option><option value="Heinkel">Heinkel</option><option value="Henschel">Henschel</option><option value="Hillman">Hillman</option><option value="Honda">Honda</option><option value="Horch">Horch</option><option value="Hotchkiss">Hotchkiss</option><option value="Humber">Humber</option><option value="Hummer">Hummer</option><option value="Hyundai">Hyundai</option><option value="IFA">IFA</option><option value="IHC">IHC</option><option value="Ikarus">Ikarus</option><option value="Imperial">Imperial</option><option value="International">International</option><option value="International Harvester">International Harvester</option><option value="ISO">ISO</option><option value="Iveco">Iveco</option><option value="Jaguar">Jaguar</option><option value="Jawa">Jawa</option><option value="JCB">JCB</option><option value="Jeep">Jeep</option><option value="Jensen">Jensen</option><option value="John Deere">John Deere</option><option value="Jordan">Jordan</option><option value="Kaelble">Kaelble</option><option value="Kamaz">Kamaz</option><option value="Kenworth">Kenworth</option><option value="KrAZ">KrAZ</option><option value="Krupp">Krupp</option><option value="Lada">Lada</option><option value="Lagonda">Lagonda</option><option value="Lamborghini">Lamborghini</option><option value="Lancia">Lancia</option><option value="Land Rover">Land Rover</option><option value="Lanz">Lanz</option><option value="LaSalle">LaSalle</option><option value="Lexus">Lexus</option><option value="Leyland">Leyland</option><option value="LIAZ">LIAZ</option><option value="Ligier">Ligier</option><option value="Lincoln">Lincoln</option><option value="Lola">Lola</option><option value="Lotec">Lotec</option><option value="Lotus">Lotus</option><option value="Mack">Mack</option><option value="Magirus">Magirus</option><option value="Magirus Deutz">Magirus Deutz</option><option value="Mahindra">Mahindra</option><option value="MAN">MAN</option><option value="March">March</option><option value="Maserati">Maserati</option><option value="Massey Ferguson">Massey Ferguson</option><option value="Matra">Matra</option><option value="Maybach">Maybach</option><option value="MAZ">MAZ</option><option value="Mazda">Mazda</option><option value="McLaren">McLaren</option><option value="Melkus">Melkus</option><option value="Mercedes">Mercedes</option><option value="Mercury">Mercury</option><option value="Messerschmitt">Messerschmitt</option><option value="Meyers Manx">Meyers Manx</option><option value="MG">MG</option><option value="Military">Military</option><option value="Mini">Mini</option><option value="Mitsubishi">Mitsubishi</option><option value="Morgan">Morgan</option><option value="Morris">Morris</option><option value="Multicar">Multicar</option><option value="Nagetusch">Nagetusch</option><option value="Neoplan">Neoplan</option><option value="NextEV">NextEV</option><option value="Nissan">Nissan</option><option value="NSU">NSU</option><option value="Oldsmobile">Oldsmobile</option><option value="OM">OM</option><option value="Opel">Opel</option><option value="Oreca">Oreca</option><option value="Osca">Osca</option><option value="Packard">Packard</option><option value="Pagani">Pagani</option><option value="Panhard">Panhard</option><option value="Panoz">Panoz</option><option value="Panzer">Panzer</option><option value="Pegaso">Pegaso</option><option value="Penske">Penske</option><option value="Peterbilt">Peterbilt</option><option value="Peugeot">Peugeot</option><option value="Plymouth">Plymouth</option><option value="Pontiac">Pontiac</option><option value="Porsche">Porsche</option><option value="Praga">Praga</option><option value="Racing Point">Racing Point</option><option value="RAM">RAM</option><option value="Red Bull">Red Bull</option><option value="Reliant">Reliant</option><option value="Renault">Renault</option><option value="Robur">Robur</option><option value="Rolls Royce">Rolls Royce</option><option value="Rometsch">Rometsch</option><option value="Rover">Rover</option><option value="Saab">Saab</option><option value="Sauber">Sauber</option><option value="Saurer">Saurer</option><option value="Saviem">Saviem</option><option value="Scania">Scania</option><option value="SCG">SCG</option><option value="Scuderia Toro Rosso">Scuderia Toro Rosso</option><option value="Seagrave">Seagrave</option><option value="Set">Set</option><option value="Setra">Setra</option><option value="Shelby">Shelby</option><option value="Simca">Simca</option><option value="Skoda">Skoda</option><option value="Smart">Smart</option><option value="Solaris">Solaris</option><option value="Steyr">Steyr</option><option value="Streetscooter">Streetscooter</option><option value="Studebaker">Studebaker</option><option value="Stutz">Stutz</option><option value="Subaru">Subaru</option><option value="Suzuki">Suzuki</option><option value="Talbot">Talbot</option><option value="Talbot Lago">Talbot Lago</option><option value="Tatra">Tatra</option><option value="Toro Rosso">Toro Rosso</option><option value="Toyota">Toyota</option><option value="Trabant">Trabant</option><option value="Triumph">Triumph</option><option value="Tyrrell">Tyrrell</option><option value="UAZ">UAZ</option><option value="Unic">Unic</option><option value="Ural">Ural</option><option value="Vauxhall">Vauxhall</option><option value="Venturi">Venturi</option><option value="Vespa">Vespa</option><option value="Vitrine">Vitrine</option><option value="Volvo">Volvo</option><option value="VW">VW</option><option value="Wartburg">Wartburg</option><option value="Wietmarscher">Wietmarscher</option><option value="Williams">Williams</option><option value="Willys">Willys</option><option value="Winnebago">Winnebago</option><option value="Wohnanhänger">Wohnanhänger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report"> In ce judet a fost aruncat?*</h4>
                            <div class="question-answer">
                                    <div class="selection-location-person">
                                        <select name="judet" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected">Alegeti un judet</option>
                                            <option value="Alba">Alba</option> <option value="Arad">Arad</option> <option value="Arges">Arges</option> <option value="Bacau">Bacau</option> <option value="Bihor">Bihor</option> <option value="Bistrita-Nasaud">Bistrita-Nasaud</option> <option value="Botosani">Botosani</option> <option value="Braila">Braila</option> <option value="Brasov">Brasov</option> <option value="Bucuresti">BUCURESTI</option> <option value="Buzau">Buzau</option> <option value="Calarasi">Calarasi</option> <option value="Caras-Severin">Caras-Severin</option> <option value="Cluj">Cluj</option> <option value="Constanta">Constanta</option> <option value="Covasna">Covasna</option> <option value="Dambovita">Dambovita</option> <option value="Dolj">Dolj</option> <option value="Galati">Galati</option> <option value="Giurgiu">Giurgiu</option> <option value="Gorj">Gorj</option> <option value="Harghita">Harghita</option> <option value="Hunedoara">Hunedoara</option> <option value="Ialomita">Ialomita</option> <option value="Iasi">Iasi</option> <option value="Ilfov">Ilfov</option> <option value="Maramures">Maramures</option> <option value="Mehedinti">Mehedinti</option> <option value="Mures">Mures</option> <option value="Neamt">Neamt</option> <option value="Olt">Olt</option> <option value="Prahova">Prahova</option> <option value="Salaj">Salaj</option> <option value="Satu Mare">Satu Mare</option> <option value="Sibiu">Sibiu</option> <option value="Suceava">Suceava</option> <option value="Teleorman">Teleorman</option> <option value="Timis">Timis</option> <option value="Tulcea">Tulcea</option> <option value="Valcea">Valcea</option> <option value="Vaslui">Vaslui</option> <option value="Vrancea">Vrancea</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report"> In ce localitate a fost aruncat?*</h4>
                            <div class="question-answer">
                                <input class="form-input" type="text" placeholder="ex: Targul Frumos" name="localitate" />
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report"> Pe ce strada a fost aruncat?*</h4>
                            <div class="question-answer">
                                <input class="form-input" type="text" placeholder="ex: Str.Paunului" name="street" />
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Data intamplarii*</h4>
                            <div class="question-answer">
                                <input class="form-input" type="date" name="dateReport" placeholder="zz/ll/aaaa" min="2020-01-01" max="2021-01-01">
                            </div>
                        </div>
                        <div>
                            <h4 class="h4-report">Alte detalii</h4>
                            <div class="question-answer">
                                <textarea class="form-input" name="details" rows="4" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="question-answer">
                            <div class="upload-btn-wrapper">
                                <button class="btn">Upload a file</button>
                                <input type="file" name="myfile" name="imageReport"/>
                            </div>
                        </div>
                        <div class="question-answer">
                            <div class="btn-block">
                                <button class="button-report-login-signup-AS" type="submit" name="raport-submit">Trimiteti formularul</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html