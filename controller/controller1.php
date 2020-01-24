<?php

require('../../model/model.php');

// Fonction qui récupère les données pour les afficher sur la vue 'games.php"
function displayInfo($dev,$kind,$years) {

    $display = getAll($dev,$kind,$years);

    require('games.php');

}

// FOnction qui récupère les années de création de jeux dans la bdd pour les affichers dans notre 'select' dans la vue "games.php"
function displayYears() {

    $displayYears = allYears();
    return $displayYears;
   
}

// Fonction qui récupère le type de jeux dans la bdd pour les affichers dans notre 'select' dans la vue "games.php"
function displayKind() {

    $displayKind = allKind();
    return $displayKind;
   
}

// Fonction qui va permettre d'insérer l'email taper par l'utilisateur dans la vue "home.php" pour la newsletter , dans la bdd
function newsletter($news) {

    $email = getMail($news);
    require('home.php');

}

// Fonction qui gère la pagination du contenu afficher dans la vue "chara.php"
function filterLetter($letter) {

    $currentpage = (int)($_GET['page'] ?? 1);
    $perpage = 5;
    $offset = $perpage * ($currentpage -1 );
    $pages = nbrPages($letter."%",$perpage);

    $displayChara = firstLetter($letter."%",$perpage,$offset);
    require('chara.php');

}

// Fonction qui gère l'ajout d'un nouveau jeu dans la bdd , dans la vue "addnewentry.php"
function add($array){

    $add = addEntryDb ($array);
    require('addnewentry.php');
}

