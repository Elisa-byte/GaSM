<!doctype html>
<html>

<head>
    <base href="<?php echo $base_location ?>" />
    <title>404 not found</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Serif&display=swap');

        body {
            color: black;
            margin: 0;
            font-family: 'IBM Plex Serif', serif;
            overflow-x: hidden;
        }
        #container {
            width: 100%;
            height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 2em;
        }
    </style>

</head>

<body>

    <div id="container">
        <h1>:'( 404 :'(</h1>
        <p>Nu am putut găsi campania cu numele '<?php echo str_replace('-', ' ', ucfirst($data['id'])) ?>'</p>
        <p>Navighează <a href="home">acasă</a></p>
    </div>

</body>

</html>