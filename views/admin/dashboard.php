<div class="header-admin">
    
    <nav class="nav">
        <a href="" class="ico-parent"><i class="ico-admin"></i>PROFIL</a>
        <ul>
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="?page=competences"><i></i> Competences</a></li>
            <li><a href="?page=parcours"><i></i> Parcours</a></li>
            <li><a href="?page=projets"><i></i> Projets</a></li>
            <li><a href="?page=centre"><i></i> Centre d'interet</a></li>
            <li><a href="?action=deconnexion"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </nav>
    
</div>

<div class="content">
<?php if(isset($page)) : ?>
    <h3 class="h3-admin"><?=$page?></h3>
    <!-- <?php
        /*echo "<table class='t'>";
        // var_dump($data);

            echo "<tr>";
            foreach($data[0] as $k => $v) {
                
                // mauvais baie
                // if(strpos($v,".png") || strpos($v, ".jpg")) {
                //     echo "<td><img class='preview' src='" . $v . "' width=72></td>";
                // } <a href=''><i class=\"fas fa-save\"></i>
                echo "<td>" . $k . "</td>";
            }
            echo "<td>Action</td>";
            echo "</tr>";
        
        foreach($data as $d) {
            echo "<tr>";
            foreach($d as $k => $v) {
                
                // mauvais baie
                // if(strpos($v,".png") || strpos($v, ".jpg")) {
                //     echo "<td><img class='preview' src='" . $v . "' width=72></td>";
                // } <a href=''><i class=\"fas fa-save\"></i>
                echo "<td>" . $v . "</td>";
            }
            echo "<td><a href=''><i class=\"fas fa-pen-square\"></i></a><a href=''><i class=\"fas fa-minus-circle\"></i></a></td>";
            echo "</tr>";
        }
        
        echo "</table>";*/
    ?> -->

<div class="c">

    <div class="c-left">
    <h3 style="width:100%;padding: 20px;">Liste de données stockée dans la base de données</h3>
     <?php 

        foreach($data as $d) {

            echo "<div class='mycard'><form method='post' enctype=\"multipart/form-data\">";
            foreach($d as $k => $v) {
                if(strpos($v,".png") || strpos($v, ".jpg")) {
                    echo "<div class='mycard-img' style='background-image:url(\"$v\");background-size:cover;background-position: center 0'><input type='file' name='img'></div>";
                }
                elseif($k != "id") {
                    echo "<div class='mycard-info'><label>$k</label><input type='text' name='$k' class='input-label' placeholder='" . $v . "'></div>";
                }
                elseif($k == 'id') {
                    echo "<input type='hidden' name='id' value='$v'>";
                    echo "<input type='hidden' name='page' value='$page'>";
                }
            }
            echo "<div class='mycard-inputs'><input name='edit' type='submit'><input name='dlt' type='submit' value='Supprimer'></div>";
            echo "</form></div>";
        }

    ?>
    </div>
    <div class="c-right">
        <ul class="nav-right">
            <li><a href="?page=<?=$page?>&action=add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Ajouter un nouveau element</a></li>
            <li><a href="?page=<?=$page?>&action=dlt"><i class="fas fa-minus"></i>&nbsp;&nbsp;Supprimer tout</a></li>
        </ul>
    </div>
</div>
<?php endif ?>
   
</div>