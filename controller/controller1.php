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

    $displayChara = firstLetter($letter);

    require('chara.php');

}
