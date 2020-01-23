<?php 

require('../../controller/controller1.php');

if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'filter') {
    
        if (isset($_POST["devTeam"]) || isset($_POST["kind"]) || isset($_POST["years"])) {

            if ($_POST["devTeam"] != "defaultDT" || $_POST["kind"] != "defaultKoG" || $_POST["years"] != "defaultY") {
    
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

    if ($_GET['action'] == 'addMail') {
        $news = htmlspecialchars($_POST["email"]);
        newsletter($news);
    }
    if ($_GET['action'] == 'add') {
        add($_POST);
        echo "New entry successfully add";
    }

    
} elseif (isset($_GET['filterLetter'])) {

    filterLetter($_GET['filterLetter']);

}
