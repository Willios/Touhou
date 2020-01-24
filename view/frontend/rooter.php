<?php 

require('../../controller/controller1.php');

// Si une action a été définie
if (isset($_GET['action'])) {
    // Et que cet action est 'filter' ( utiliser dans "games.php' ligne 12 )
    if ($_GET['action'] == 'filter') {
        // Si l'un d'entre eux a été choisi
        if (isset($_POST["devTeam"]) || isset($_POST["kind"]) || isset($_POST["years"])) {
            // Et qu'il est différent de la valeur par défaut
            if ($_POST["devTeam"] != "defaultDT" || $_POST["kind"] != "defaultKoG" || $_POST["years"] != "defaultY") {
                // Si c'est différent de a valeur par défaut , afficher le contenu choisi
                if ($_POST["devTeam"] != "defaultDT") {
                    
                    $dev = $_POST["devTeam"];

                }
                else {

                    $dev = "%";
        
                }
            
                if ($_POST["kind"] != "defaultKoG") {
            
                    $kind = $_POST["kind"];

                    
                }
                else {

                    $kind = "%";

                    
                }
            
                if ($_POST["years"] != "defaultY") {
            
                    $years = $_POST["years"];

                    
                }
                else {

                    $years = "%";

                    
                } 
                displayInfo($dev,$kind,$years);
                } 

            else {
                
                require('games.php');
            }
        }
    }

    // Si l'action est 'addMail' ( utiliser dans "home.php' ligne 23 ) , récupérer l'adresse mail taper
    if ($_GET['action'] == 'addMail') {
        $news = htmlspecialchars($_POST["email"]);
        newsletter($news);
    }
    // Si l'action est 'add' ( utiliser dans "addnewentry.php' ligne 11 ) , ajouter le jeux dans la bdd
    if ($_GET['action'] == 'add') {
        add($_POST);
        echo "New entry successfully add";
    }
    

    // Si l'action 'filterLetter' a été éffectuer ( ligne 19 et 22 de la page chara.php ) , afficher le contenu récuperer dans la bdd
} elseif (isset($_GET['filterLetter'])) {

    filterLetter($_GET['filterLetter']);

}
