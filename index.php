<?php
    // show errors if not in php.ini
    ini_set('display_errors','on');
    error_reporting(E_ALL);

    include_once('Model/InstapicClass.php');

    $pic1 = new Instapic();
    $pic1->setAuthor("eyesofchildrenaroundtheworld");
    $pic1->setDescription('Photo by @miweb_photography');
    $pic1->setUrl("insta1.jpg");
    $pic1->setCreatedAt("17/06/2017");


    $pic2 = new Instapic();
    $pic2->setAuthor("bobthesponge");
    $pic2->setDescription('a real and strange photo');
    $pic2->setUrl("insta2.jpg");
    $pic2->setCreatedAt("06/06/2013");


    $pics = array($pic1, $pic2);

;?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>my Insta</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >
</head>
<body>
    <header>
        <nav>
            <div class="nav-item">
                <a href="#">
                    <i class="material-icons">camera_alt</i>
                    <h1>Instagram Like</h1>
                </a>
                <h1 style="line-height: 1em"></h1>
            </div>
            <div class="nav-item">
                <input id="input-search" type="text" placeholder="Rechercher"/>
            </div>
            <div class="nav-item end-row">
                <a href="#">
                    <i class="material-icons">star_border</i>
                </a>
                <a href="#">
                    <i class="material-icons">person_outline</i>
                </a>
            </div>
        </nav>
    </header>

    <div id="container">
        <section id="flux">
            <?php foreach ($pics as $pic):?>
                <figure class="content-image">
                    <figcaption>
                    <span class="author">
                        <?= $pic->getAuthor();?>
                    </span>
                        <?= $pic->getDescription();?><br/>
                    </figcaption>
                    <img src="<?= $pic->getUrl();?>"/>
                    <br/>
                    Photo ajoutée le <?= $pic->getCreatedAt();?>
                </figure>
            <?php endforeach;?>
        </section>
    </div>

</body>
</html>