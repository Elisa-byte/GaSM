<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Utilizare GaSM</title>
    <link rel="stylesheet" href="scholarly.min.css">
    <script src="scholarly.min.js"></script>
</head>
<body prefix="schema: http://schema.org" class="vsc-initialized">
<header>
    <div class="banner">
        <img src="scholarly-html.svg" width="227" height="50" alt="Scholarly HTML logo">
        <div class="status">Community Draft</div>
    </div>
    <h1>Utilizare GaSM</h1>
</header>
<div role="contentinfo">

    <ol role="directory">
        <li><a href="#abstract"><span>1. </span>Informatii despre acest document</a></li>
        <li><a href="#introduction"><span>2. </span>Scopul ghidului</a></li>
        <ol role="directory">
            <li><a href="#scop"><span>2.1 </span>Scop</a></li>
            <li><a href="#dictionary"><span>2.2 </span>Dictionar de termeni</a></li>
            <li><a href="#validate"><span>2.3 </span>Validare pagini</a></li>
        </ol>
        <li><a href="#login"><span>3. </span>Logarea si inregistrarea</a>
            <ol role="directory">
                <li><a href="#register"><span>3.1 </span>Inregistrare</a></li>
                <ol role="directory">
                    <li><a href="#completeregister"><span>3.3.1 </span>Conditii inregistrare</a></li>
                </ol>
                <li><a href="#logare"><span>3.2 </span>Logare</a></li>
            </ol>
        </li>
        <li><a href="#home"><span>4. </span>Pagina Principala</a>
            <ol role="directory">
                <li><a href="#raportarezona"><span>4.1 </span>Raportare zona</a></li>
                <li><a href="#statistici"><span>4.2 </span>Statistici</a></li>
                <li><a href="#campanii"><span>4.3 </span>Campanii</a></li>
                <li><a href="#createcampaign"><span>4.4 </span>Creare campanie</a></li>
            </ol>
        </li>
        <li><a href="#profile"><span>5. </span>Profil</a></li>
        <ol role="directory">
            <li><a href="#profileuser"><span>5.1 </span>Profil utilizator</a></li>
            <li><a href="#settings"><span>5.2 </span>Setari profil</a></li>
        </ol>
        <li><a href="#biblio-references"><span>6. </span>References</a></li>
    </ol>
    <dl>
        <dt>Authors</dt>
        <dd>
            Constantin Elisabeta, Zmuschi Shanti, Caras Teodor
        </dd>
        <dt>Bugs &amp; Feedback</dt>
        <dd>
            <a href="https://github.com/w3c/scholarly-html/issues">Issues and PRs welcome!</a>
        </dd>
        <dt>Discussion Group</dt>
        <dd>
            The <a href="https://www.w3.org/community/scholarlyhtml/">Scholarly HTML Community
                Group</a> at <a href="https://w3.org/">W3C</a>
            (<a href="https://lists.w3.org/Archives/Public/public-scholarlyhtml/">email archives</a>)
        </dd>
        <dt>License</dt>
        <dd>
            <a href="http://creativecommons.org/licenses/by/4.0/">CC-BY</a>
        </dd>
    </dl>
</div>

<section typeof="sa:Abstract" id="abstract" role="doc-abstract">
    <h2><span>1. </span>Informatii despre acest document</h2>
    <p>
        Raportul este creat in formatul Scholarly HTML, cuprinzand scopul acestuia si desigur utilizarea website-ului proiectului GaSM.
    </p>
</section>
<section id="introduction" role="doc-introduction">
    <h2><span>2 </span>Scopul documentului</h2>
    <section id="scop">
    <h3><span>2.1 </span>Scopul</h3>
    <p>
        Acest ghid a fost creat cu scopul de a familiariza viitorii utilizatori cu facilitatile pe care le permite si
        ofera aplicatia noastra.
        Aplicatia a fost creata cu scopul de a veni in ajutorul celor din sistemele de salubrizare, care printr-un efort
        colectiv al societatii va evidentia locurile in care s-a strans o cantitate substantiala de gunoi.
    </p>
    <p><img src="../images/logo-dark.PNG" alt="Logo GaSM" width="800px" height="350px"/></p>
    <p> Aspiratiile noastre:</p>
    <ul>
        <li>Descurajarea depunerii ilegale de deseuri.</li>
        <li>Crearea a cat mai mulor campanii.</li>
        <li>Crearea unor conditii mai eco-friendly pentru noi si cei din jurul nostru.</li>
    </ul>
    </section>
    <section id="dictionary">
    <h2><span>2.2 </span>Dictionar de termeni folositi</h2>
    <p> <ul>
        <li>Redirectionare : trimiterea unui utilizator de pe o pagina pe alta, in functie de interactiunea sa cu website-ul nostru.</li>
        <li>Validare : asigurarea respectarii unor conditii</li>
        <li>Notificare : vine in ajutorul utilizatorului (de ex. la completarea gresita a unui formular)</li>
        <li>Exportare: trimiterea unor informatii prin formulare </li>
        <li>Importare: primirea unor infomatii de la baza de date </li>
    </ul> </p>
    </section>
    <section id="validate">
        <h3><span>2.1 </span>Validare pagini</h3>
        <p>
           Codul HTML a fost validat cu : <a href="https://validator.w3.org/">https://validator.w3.org/</a>
        </p>
        <p>
            Codul CSS a fost validat cu : <a href="https://jigsaw.w3.org/css-validator/">https://jigsaw.w3.org/css-validator/</a>
        </p>
    </section>
</section>
<section id="login">
    <h2><span>3. </span> Logarea si inregistrarea</h2>
    <section id="register">
    <h3><span>3.1 </span> Inregistrarea</h3>
    <p>
        Fara inregistrare, un utilizator are acces doar la cateva pagini de interes, si la acestea intervin cateva restrictii.
    </p>
    <p>
        Dupa ce inregistrarea a fost facuta va avea acces la pagina principala ce descrie scopul nostru, roadele muncii
        noastre, va putea vedea si descarca statistici pe o anumita perioada de timp, in diferite formate.
        Utilizatorul este liber sa raporteze o zona in care au fost depozitate ilegal deseuri, poate sa isi adauge
        propria sa campanie, activitati de voluntariat. Desigur poate verifica informatiile sale in pagina cu profilul sau poate aplica setari asupra acestuia.
    </p>
    <p>
        Inregistrarea cuprinde campuri absolut necesare, cu un sistem de tratare a erorilor provenite din completarea
        gresita a formularului de inregistrare. Informatiile vor fi trimise mai departe la o baza de date aflata in
        XAMPP (baza de date se numeste gasm, iar tabela in care se va face inserarea se numeste 'usersv2'). Parola
        trimisa va fi criptata folosind hash.
    </p>
        <section class="completeregister">
    <h3><span>3.1.1 </span> Completarea formularului de inregistrare</h3>
    <h3><p> Sistemul de tratare al erorilor</p></h3>
    <ul>Eroare la
        <li> Necompletarea tuturor campurilor din formular</li>
        <li> Completarea nepotrivita ducand la un input invalid</li>
        <li> Introducerea unei parole care sa nu corespunda cerintelor afisate</li>
        <li> Reintroducerea unei parole care nu corespunde cu parola initiala</li>
        <li> Alegerea unui nume de utilizator care este folosit de alt client</li>
    </ul>
    <p>Dupa inregistrare, utilizatorul va fi redirectionat spre pagina principala si nu va mai avea acces la formularul
        de inregistrare pana nu se delogheaza de la contul sau.</p>
        </section>
    <p><img src="../images/signup.png"</p>
    </section>
    <section class="logare">
    <h3><span>3.2 </span> Logarea</h3>
    <p> In cazul in care utilizatorul are deja un cont acesta se va loga pur si simplu folosind ori adresa sa de email,
        ori numele de utilizator, urmat desigur de parola contului sau.</p>
    <p> Logarea poate fi de doua feluri, prima pentru un utilizator, iar a doua pentru un administrator care va avea
        dreptul sa stearga si sa adauge utilizatori, dar si campanii si sa adauge alti administratori ai site-ului.</p>
    <p> Logarea, atat a utilizatorului, cat si a administratorului au la baza verificarea parolei din baza de date, cu
        parola data de client. Dupa logare acesta va fi redirectionat catre pagina principala. </p>
    <p><img src="../images/login.png"</p>
    <p><img src="../images/loginadmin.png"</p>
    <p><img src="../images/controlpanel" alt="controlpanel"/></p>
    </section>
</section>
<section id="home">
    <h2><span>4. </span> Pagina principala</h2>
    <!--        TEO COMPLETARE -->
    <p>
        După logarea utilizatorului, acestuia i se va afișa pagina principala GaSM unde va putea gasi un meniu catre
        alte pagini de interes, cum ar fi pagina raportarii, dar si campaniile de pana atunci.
    </p>
    <section id="raportarezona">
        <h3><span>4.1 </span>Raportare zona</h3>
        <p>
            Dupa logare, utilizatorului i se va atribui dreptul de a trimite un raport catre noi. Informatiile
            referitoare la tipul de gunoi vazut, cantitatea care este depozitata ilegal,
            localitatea, judetul, data sunt necesare pentru investigatiile urmatoare. Preluand aceste date, pagina de
            statistici va genera statistici pe zi, saptamana, luna. Rapoartele vor ajunge la sisteme de salubrizare.
        </p>
        <p><img src="../images/raportarezona.png" alt="raportare zona"</p>
        <p>
            Formularul va mai contine si campuri neobligatorii, dar care pot fi necesare in anumite conditii, cum ar fi
            numele companiei, organizatiei in cauza, tipul modelul si culoarea vehicului care l-a depozitat, cat si
            placuta de inmatriculare a vehicului in cauza.
            Fiecare camp este important pentru noi si pentru cei carora le trimitem aceste formulare, din aceasta cauza contam pe
            utilizatori si pe informatia pe care acestia ne-o transmit.
        </p>
    </section>
    <section id="statistici">
        <h3><span>4.2 </span> Statistici</h3>
        <!--    TEO & SHANTI COMPLETARE-->
        <p>

        </p>
    </section>
    <section id="campanii">
        <h3><span>4.3 </span> Campanii</h3>
        <!--    TEO COMPLETARE-->
        <p>

        </p>
    </section>
    <section id="createcampaign">
        <h3><span>4.4 </span> Creare campanie</h3>
        <!--    SHANTI COMPLETARE-->
        <p>
            Dupa logare,utilizatorul are dreptul si posibilitatea sa creeaza el insusi o campanie.
            Astfel,el poate sa organizeze o campanie de tip meeting,strangere de fonduri sau mesaj.Dupa ce completeaza cu atentie campurile 
            formularului de creare a unei campanii,utilizatorul poate sa vizualizeze informatiile pe care le-a introdus.
            Campaniile create sunt inregistrate in baza de date si pot fi accesate la rubrica Campanii.
        </p>
    </section>
</section>
    <section id="profile">
        <h2><span>5. </span> Profil & Setari Profil</h2>
        <section id="profileuser">
            <h3><span>5.1 </span> Profil user</h3>
        <p>
            Datele utilizatorului se pot vedea in pagina profilului. Profilul poate fi vizitat doar daca utilizatorul este logat. Pentru a fi afisate, am folosit sesiunea in care este logat utilizatorul si am accesat baza de date in care au fost stocate datele sale.

            Recent am reusit sa adaugam si imagini, asadar profilul poate
            fi completat si cu o imagine mai mult sau mai putin reprezentativa a clientului. Pentru a fi afisate, am folosit sesiunea in care este logat utilizatorul si am accesat baza de date in care au fost stocate datele sale.
        </p>
        <p><img src="../images/profil.png" alt="profil"/></p>
        </section>
        <section id="settings">
            <h3><span>5.2 </span> Setari user</h3>
        <p> Datele de inregistrare ale utilizatorului pot fi editate, desigur vor fi erori aruncate daca nu se respecta cerintele impuse.
            Recent am reusit sa adaugam si imagini, asadar profilul poate fi completat si cu o imagine mai mult sau mai putin reprezentativa a clientului.
        </p>
        <p><img src="../images/settings.png" alt="settings"</p>
        </section>
    </section>

    <section id="biblio-references"><h2><span>9. </span>References</h2>
        <dl>
            <dt id="ref-NYT">Pagina curs</dt>
            <dd property="schema:citation" typeof="schema:ScholarlyArticle"
                resource="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">
                <cite property="schema:name"><a
                            href="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">Tehnologii Web - proiecte propuse</a></cite>,
                by
                <span property="schema:author" typeof="schema:Person">
                    <span property="schema:name">Sabin Buraga</span>
                </span>;
                .
            </dd>
            <dt id="ref-HTML">Scholarly HTML</dt>
            <dd property="schema:citation" typeof="schema:WebPage" resource=https://w3c.github.io/scholarly-html/">
                <cite property="schema:name"><a href="https://w3c.github.io/scholarly-html/">Ghid de utilizare</a></cite>.
            </dd>
            <dt id="ref-WAI-ARIA">Maps & Charts</dt>
            <dd property="schema:citation" typeof="schema:WebPage" resource="https://www.amcharts.com/">
                <cite property="schema:name"><a href="https://www.amcharts.com/"> amCharts</a></cite>.
            </dd>
<!--            alte linkuri-->
        </dl>
    </section>
</body>
</html>