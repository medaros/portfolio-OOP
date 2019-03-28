<header>
    
    <nav>
        <a href="">LOGO</a>
        <ul>
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#"><i></i> Competences</a></li>
            <li><a href=""><i></i> Parcours</a></li>
            <li><a href=""><i></i> Projets</a></li>
            <li><a href=""><i></i> Centre d'interet</a></li>
            <li><a href=""><i></i> Télécharger mon CV !</a></li>
        </ul>
    </nav>

    <h1 class="title center">
    <span class="sociaux">
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-linkedin"></i></a>
        <a href=""><i class="fab fa-deviantart"></i></a>
        <a href=""><i class="fab fa-github"></i></a>
    </span>
    <h2 class="h2-tooltip">Mohamed AAROUS</h2>
    </h1>
    
</header>

<div class="content">
    <div class="competences">
        <h2>COMPETENCES</h2>
        <p>Voici une liste des compétences que j'ai acquises au fil des années :</p>                    
        <div class="comp">
            <?php for ($i = 0; $i < 4; $i++) : ?>                    
            <div>
                <i class="ico <?= $competences[$i]["logo"] ?>"></i>
                <p><?= $competences[$i]["titre"] ?></p>
            </div>
            <?php endfor ?>
        </div>
            
        <div class="comp">
            <?php for ($i = 4; $i < count($competences); $i++) : ?>          
                <div>
                    <i class="ico <?= $competences[$i]["logo"] ?>"></i>
                    <p><?= $competences[$i]["titre"] ?></p>
                </div>
            <?php endfor ?>
        </div>
    </div>

    <div class="projets">
        <h2>Projets</h2>

        <div class="pro">
            <?php for ($i = 0; $i < count($projets); $i++) : ?>          
                <div class="projet">
                    <img class="projet-img" style="background-position: center 0;" src="<?= $projets[$i]["shot"] ?>">
                    <p><?= $projets[$i]["titre"] ?></p>
                </div>
            <?php endfor ?> 
        </div>
    </div>

    <div class="parcours">
        <h2>Parcours</h2>
        <div class="par">

            <?php for ($i = 0; $i < count($parcours); $i++) : ?>
            <div>
                <div class="date">
                    <p>&nbsp;&nbsp;<?= $parcours[$i]["date"] ?></p>
                </div>          
                <div class="desc">
                    <p><?= $parcours[$i]["logo"] ?></p>
                    <p><?= $parcours[$i]["titre"] ?></p>
                    <p><?= $parcours[$i]["description"] ?></p>
                </div>
            </div>
            <?php endfor ?>
            
        </div>
        
    </div>

    <div class="contact">
        <h2>Contact</h2>
        <div class="form-container">

            <form action="" method="post">
                <div class="doubleInput">
                    <input name="nom" type="text" placeholder="Votre Nom">
                    <input name="prenom" type="text" placeholder="Votre Prénom">
                </div>
                <input name="email" type="email" name="email" id="" placeholder="Votre Email *">

                <textarea name="msg" id="">Votre message *</textarea>
                <input type="text" placeholder="Tel (facultatif) ">
                <input type="submit" value="Envoyer">
            </form>

            <div class="social">
                <h3>Reseaux Sociaux :</h3>
                <!-- <?php var_dump($reseaux); ?> -->
                <?php foreach($reseaux as $r => $v) : ?>
                    <?php if($v == $reseaux["email"]) : ?>
                        <a href=""><i class="fas fa-envelope-square"></i>  <?=$v?></a>
                    <?php elseif($v != $reseaux['tel'] && $v != $reseaux['id']) : ?>
                        <a href="<?="http://www." . $r . ".com" . $v?>"><i class="fab fa-<?=$r?>"></i>  <?=$v?></a>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            
        </div>
        
    </div>
</div>