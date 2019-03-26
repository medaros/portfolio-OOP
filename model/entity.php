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
    public function update($data) {
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
        $q = $this->getDb()->query("UPDATE $_GET[page] set $sql where id='$id'");
        // Requete de test
        // var_dump("UPDATE $_GET[page] set $sql where id='$id'");
    }
}