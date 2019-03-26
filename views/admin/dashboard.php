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
     <?php 

        foreach($data as $d) {

            echo "<div class='mycard'><form method='post' action=''>";
            foreach($d as $k => $v) {
                if(strpos($v,".png") || strpos($v, ".jpg")) {
                    echo "<div class='mycard-img' style='background-image:url(\"$v\");background-size:cover'><input type='file'></div>";
                }
                elseif($k != "id") {
                    echo "<div class='mycard-info'><label>$k</label><input type='text' name='$k' class='input-label' placeholder='" . $v . "'></div>";
                }
                elseif($k == 'id') {
                    echo "<input type='hidden' name='id' value='$v'>";
                }
            }
            echo "<div class='mycard-inputs'><input name='edit' type='submit'><input name='dlt' type='submit' value='Supprimer'></div>";
            echo "</form></div>";
        }

    ?>
</div>
   
</div>