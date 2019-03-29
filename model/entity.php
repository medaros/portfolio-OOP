<?php

namespace model;

class Entity {

    // ce qu'on va recuperer apres dans le controller pour appeller les methods de ENTITY :
    private $db;
    public $tables;

    public function __construct(){
        // Ma connexion a la base de donnes :    // charger les configs du fichier XML de dossier config :

        $xml = simplexml_load_file("config/settings.xml");
        $this->tables = $xml->tables;
        $this->db = new \PDO(
                            "mysql:host=" . $xml->host . 
                            ";dbname=" . $xml->db . 
                            ";charset=utf8;"
                            , $xml->user
                            , $xml->pwd
                    );
                    return $this->db;
    }

    public function getDb(){
        return $this->db;
    }

    public function select($table) {
        $q = $this->getDb()->query("SELECT * FROM " . $table);
        return $q->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function select2($table) {
        $q = $this->getDb()->query("SELECT * FROM " . $table);
        return $q->fetch(\PDO::FETCH_ASSOC);
    }
    public function checkuser($pin){
        htmlspecialchars($pin);//id, user, roles
        $q = $this->getDb()->query("SELECT id, user, roles FROM admin where pin=$pin");
        return $q->fetch();
    }
    public function update($data, $page) {
        // Enlever le dernier element de array
        array_pop($data);
        // Guarder id dans une variable
        $id = $data['id'];
        // Enlever le premier element de array aka ID
        array_shift($data);
        // Variable qui va stocker les differents parametres
        $sql = "";
        // Boucler sur data et stocker ses donnees dans la var SQL
        foreach($data as $d =>$v) {
            // Si l'element ne contiens aucune valeur on le stock pas
            if(!empty($v)) {
                $sql .= "$d = '$v',";
            }
        }
        // Enlever le dernier comma
        $sql = substr($sql, 0, -1);
        // Lancer la requete qui va faire les mises a jour
        $q = $this->getDb()->query("UPDATE $page set $sql where id='$id'");
        // Requete de test
        // var_dump("UPDATE $_GET[page] set $sql where id='$id'");
    }
    public function saveImg($data, $page, $id) {
        $link = "views/img/projets/" . $data['img']['name'];
        
        if(move_uploaded_file($data['img']['tmp_name'], $link)) {
            $q = $this->getDb()->query("UPDATE $page set shot='$link' where id='$id'");
        }
    }
    public function new($data) {
        // $DATA : $tableau
        // GET les noms de chaque champs de la table $data
        $t = $this->getDb()->query("DESCRIBE $data");
        $r = $t->fetchAll();

        // pour le insert 
        // $fields : les champs
        // $values : les valeurs de chaque champs 
        $fields = array();
        $values = array();
        // dynamiser le process : 
        // stocker chaque key d'array $r => ($r[$res][0]) dans fields aka noms du champs
        // stocker chaque value d'array $r => ($val[0]) dans les rangees aka cellules
        foreach($r as $res => $val) {
            // on va pas stocker les id
            if($val[0] !== "id") {
                $fields[] = $r[$res][0];
                // si on est sur la page projets je rajoute une image par defaut (no.png)
                if($val[0] == "shot") {
                    $values[] = 'views/img/no.png';
                } else {
                    // on va donner une valeur par defaut pour chaque cellule et ca va etre
                    // nom de table -s c'est a dire ex:=> competences devient competence
                    $values[] = substr("$data", 0, -1);
                }
            }
            
        }
        // var_dump($values);
        $sql = "INSERT INTO $data (" . implode(",", $fields) . ") VALUES ('" . implode("','", $values) . "')";
        // var_dump("INSERT INTO $data (\"" . implode("\",\"", $fields) . "\") VALUES (\"" . implode("\",\"", $values) . "\")");
        // Lancer la requete insert qui va ajouter une ranger vide dans la db
        $q = $this->getDb()->query($sql);
    }
    public function delete($data, $page) {
        // Lancer la requete qui va faire la suppression d'une rangee ou tout si $data = all
        if($data == "") {
            var_dump("DELETE FROM " . $page); // La function qui va supprimer tout le contenu de la table aka $page
            // $q = $this->getDb()->query("DELETE FROM $page");
        } else {
            $q = $this->getDb()->query("DELETE FROM $page where id='$data'");
        }
    }
}