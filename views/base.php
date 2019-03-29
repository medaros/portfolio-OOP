<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PORTFOLIO | AAROUS MOHAMED</title>
    <!-- Mon Fichier CSS -->
    <link rel="stylesheet" href="views/css/theme.css">
    <!-- Mon Fichier CSS pour cette page -->
    <link rel="stylesheet" href="views/css/custom.css">
    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <!-- icons developpement -->
    <link rel="stylesheet" href="views/css/style.css">
    <!-- Bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
<!-- <div class="container">

    <div class="nav">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
            <li><a href="#"><i></i> Competences</a></li>
            <li><a href=""><i></i> Parcours</a></li>
            <li><a href=""><i></i> Projets</a></li>
            <li><a href=""><i></i> Centre d'interet</a></li>
        </ul>
    </div>
    <div class="content">
        
    </div>
</div> -->

<?= $content ?>

<footer>
        <div class="divider-top"></div>
        <!-- <a href="">LOGO</a> -->

        <div class="flex">
            <ul>
                <p>Les liens:</p>
                <a href="/"><i class="fa fa-home"></i></a> -
                <a href="#competences"><i></i> Competences</a> -
                <a href="#projets"><i></i> Projets</a> -
                <a href="#parcours"><i></i> Parcours</a> -
                <a href="#contact"><i></i> Contact</a> - 
                <a href="?action=cv"><i></i> Télécharger mon CV !</a>
            </ul>
            <ul>
                <p> Siteweb from scratch en :</p>
                <a><i></i> HTML</a> -
                <a><i></i> CSS</a> -
                <a><i></i> JS / JQUERY</a> -
                <a><i></i> PHP</a> -
                <a><i></i> MYSQL</a>
            </ul>
        </div>

        <div class="blase">
            <p> Copyright <?= date("Y") ?> <strong>Mohamed AAROUS</strong>. Tous droits reservés.</p>
        </div>
        
</footer>
</body>

</html>