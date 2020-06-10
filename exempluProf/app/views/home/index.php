<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" href="public/stylesheets/styles.css">

    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <script src="public/JavaScript/disableScroll.js"></script>
</head>

<body>


  <?php require_once 'app/views/includes/topnav.php' ?> 

    <main class="main-content" id="main-cont">
        <section id="home-intro">
            <img id="home-intro__image" src="public/img/logo2-dark.PNG" alt="Some image for now">
            <div>
                <h1>Some title here</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at dignissim tellus. In hac habitasse platea dictumst. Praesent imperdiet sodales imperdiet. Nam ullamcorper purus et felis pharetra, sit amet finibus enim gravida. Aliquam sem diam,
                    ultrices vel posuere a, sodales ut purus. Donec ultrices laoreet consequat. Nunc lacinia orci sit amet dolor feugiat, non maximus magna elementum. Suspendisse potenti. Donec tincidunt elementum tempus. Nam posuere ultrices leo, a egestas
                    urna euismod vel. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam massa est, euismod ut dui porttitor, efficitur consequat tellus. Curabitur dapibus sed nisl vitae ornare.
                </p>
            </div>
        </section>
        <h2 class="center-text">Aspirațiile noastre</h2>
        <hr class="divider">
        <section id="home-qa">
            
            <div>
                <img class="home-qa__image" src="https://picsum.photos/150/150" alt="some img alt">
                <div>
                    <h1>Question1</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente rerum eligendi distinctio voluptates saepe ut aperiam similique provident, nostrum exercitationem doloribus est delectus pariatur, voluptatum placeat, perspiciatis
                        quis neque voluptatem!</p>
                </div>
            </div>
            <div>
                <img class="home-qa__image" src="https://picsum.photos/150/150" alt="some img alt">
                <div>
                    <h1>Question2</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente rerum eligendi distinctio voluptates saepe ut aperiam similique provident, nostrum exercitationem doloribus est delectus pariatur, voluptatum placeat, perspiciatis
                        quis neque voluptatem!</p>
                </div>
            </div>
            <div>
                <img class="home-qa__image" src="https://picsum.photos/150/150" alt="some img alt">
                <div>
                    <h1>Question3</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente rerum eligendi distinctio voluptates saepe ut aperiam similique provident, nostrum exercitationem doloribus est delectus pariatur, voluptatum placeat, perspiciatis
                        quis neque voluptatem!</p>
                </div>
            </div>
        </section>
        <section id="campaigns-preview">
            <h1 class="section-title">Campaniile noastre</h1>
            <div class="campanie__preview">
                <!-- <img src="https://picsum.photos/150/150" alt="some img alt"> -->
                <h2>Nume Campanie</h2>
                <div class="overlay"></div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, porro labore. Mollitia, iure necessitatibus at voluptate eveniet perspiciatis nemo atque, neque tempora velit quidem fugiat expedita nostrum! Ex, fuga eum.</p>
                <a href="#readmore">Read more...</a>
            </div>
            <div class="campanie__preview">
                <!-- <img src="https://picsum.photos/150/150" alt="some img alt"> -->
                <div class="overlay"></div>
                <h2>Nume Campanie</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, porro labore. Mollitia, iure necessitatibus at voluptate eveniet perspiciatis nemo atque, neque tempora velit quidem fugiat expedita nostrum! Ex, fuga eum.</p>
                <a href="#readmore">Read more...</a>
            </div>
            <div class="campanie__preview">
                <!-- <img src="https://picsum.photos/150/150" alt="some img alt"> -->
                <div class="overlay"></div>
                <h2>Nume Campanie</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, porro labore. Mollitia, iure necessitatibus at voluptate eveniet perspiciatis nemo atque, neque tempora velit quidem fugiat expedita nostrum! Ex, fuga eum.</p>
                <a href="#readmore">Read more...</a>
            </div>
            <div class="campanie__preview">
                <!-- <img src="https://picsum.photos/150/150" alt="some img alt"> -->
                <div class="overlay"></div>
                <h2>Nume Campanie</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, porro labore. Mollitia, iure necessitatibus at voluptate eveniet perspiciatis nemo atque, neque tempora velit quidem fugiat expedita nostrum! Ex, fuga eum.</p>
                <a href="#readmore">Read more...</a>
            </div>
        </section>
    </main>

 <?php require_once 'app/views/includes/footer.php'?>

</body>

</html>