<?php

require('../../model/model.php');

function displayInfo($dev,$kind,$years) {

    $display = getAll($dev,$kind,$years);

    require('games.php');

}
function displayYears() {

    $displayYears = allYears();
    return $displayYears;
   
}

function displayKind() {

    $displayKind = allKind();
    return $displayKind;
   
}

function newsletter($news) {

    $email = getMail($news);
    require('home.php');

}

function filterLetter($letter) {

    $currentpage = (int)($_GET['page'] ?? 1);
    $perpage = 5;
    $offset = $perpage * ($currentpage -1 );
    $pages = nbrPages($letter."%",$perpage);

    $displayChara = firstLetter($letter."%",$perpage,$offset);
    require('chara.php');

}
function add($array){

    $add = addEntryDb ($array);
    require('addnewentry.php');
}

