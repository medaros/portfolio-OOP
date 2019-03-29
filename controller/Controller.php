<?php
namespace controller;
require_once "model/Entity.php";

class Controller {
    
    // Mon entity manger A.K.A entity.php
    private $em;
    public $table;

    public function __construct(){
        // init le class comme object em
        $this->em = new \model\Entity; $this->table = $this->em->tables; 

    }

    public function handler(){
        // je gere mes requetes ici
        
        if (isset($_SESSION['admin'])) {
            $this->actionAdmin();
        }
        // page == connexion => charger la page de connexion
        elseif(isset($_GET['action'])) {
            if($_GET['action'] == "connexion" && !isset($_SESSION['admin'])) $this->loginAdmin();
        } 
        else {
            // sinon charger la page d'accueil
            $this->index();
        }
    }

    public function loginAdmin() {
        if($_POST && $this->em->checkuser($_POST['pin'])) {
            // Stocker toutes les informations de admin sauf le mot de passe dans la session
            foreach($this->em->checkuser($_POST['pin']) as $key => $value) {
                $_SESSION['admin'][$key] = $value;
            }
            // charger l'interface de admin
            $this->r("admin/dashboard.php", "base.php");
        } else {
            // error? redirection a la page de connexion
            $this->r("admin/connexion.php", "base.php");
        }
    }

    public function actionAdmin(){
        // LIST DE PAGES PAR RAPPORT A LA BASE DE DONNEES
        // ACTIONS DANS LA PAGE ADMIN
        extract($_POST);

        // Mettre a jour les informations
        if($_POST && isset($_POST['edit'])) {
            $this->update();
        }
        // Supprimer une carte
        if($_POST && isset($_POST['dlt'])) {
            $this->delete();
        }

        // ajouter une nouvelle carte
        if(isset($_GET['action']) && $_GET['action'] == "add") {
            $this->new();
        }
        // supprimer toutes les cartes
        if(isset($_GET['action']) && $_GET['action'] == "dlt") {
            $this->deleteAll();
        }

        if(isset($_GET['action']) && $_GET['action'] == "deconnexion") {
            // deconnexion
            session_destroy();
            // retour a la page principal
            $this->index();            
        } elseif (isset($_GET['page']) && in_array($_GET['page'], (array)$this->table)){
            // charger la page avec les donnees si notre liste de tableaux contiens $_GET['Page'] 
            // aka la page quon cherche
            $this->r("admin/dashboard.php", "base.php", array(
                "data" => $this->em->select($_GET['page']),
                "page" => $_GET['page']
            ));
        } elseif (!isset($_GET['page']) || !in_array($_GET['page'], (array)$this->table)){
            $this->r("admin/dashboard.php", "base.php", array(
                "data" => $this->em->select("competences"),
                "page" => "competences"
            ));
        } else {
            // pas d'action? chargement de page de base
            $this->r("admin/dashboard.php", "base.php");
        }
    }

    public function index(){
        // function qui permet de charger la page d'accueil avec ses elements
        $this->r("accueil.php", "base.php", array(
            "cv" => $this->em->select("profil"),
            'competences' => $this->em->select($this->table->competences),
            'parcours' => $this->em->select($this->table->parcours),
            'projets' => $this->em->select($this->table->projets),
            'reseaux' => $this->em->select2($this->table->contact)
        ));
    }
    public function new() {
        // appeler la function qui va creer une nouvelle carte
        $page = $_GET['page'];
        $this->em->new($page);
        // unset($_GET);
        header("location: ?page=" . $page);
    }
    public function update() {
        // appeler les functions qui vont faire la mise a jour
        $this->em->update($_POST, $_GET['page']);
        $this->saveImg($_FILES);
    }
    public function saveImg($data) {
        // si le chemin de la photo est pas vide a.k.a photo selected ! :
        if(isset($data['img']['name'])) $this->em->saveImg($data, $_GET['page'], $_POST['id']);
    }
    public function delete() {
        $this->em->delete($_POST["id"], $_POST['page']);
    }
    public function deleteAll() {
        $this->em->delete("", $_GET['page']);
    }

    public function r($child, $parent, $params = array()){

        extract($params);

        ob_start();
        require "views/$child";
        $content = ob_get_clean();

        ob_start();
        require "views/$parent";

        ob_end_flush();

    }

}