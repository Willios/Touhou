<?php

function dbConnect(){
    try
    {
        // $db = new PDO('mysql:host=promo-str35.codeur.online;dbname=williamv_;charset=utf8', 'williamv', 'tXXz8Jhh4T27gg==');
        $db = new PDO('mysql:host=localhost;dbname=Games;charset=utf8', 'root', 'toto');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
function getAll($dev,$kind,$years){
	
    $db = dbConnect();

    // $filter = $db->prepare("SELECT * FROM TouhouProject WHERE years ? ? OR kind ? ? OR dev ? ?");
    // $filter->execute([$whereY,$years,$whereK,$kind,$whereD,$dev]);

    $filter = $db->prepare("SELECT * FROM TouhouProject WHERE years LIKE ? AND kind LIKE ? AND dev LIKE ? ");
    $filter->execute([$years,$kind,$dev]);

    //$filter->debugDumpParams();

	return $filter;
}

function firstLetter($letter){
	
    $db = dbConnect();
    $req = $letter . '%';

    $firstLetter = $db->prepare("SELECT * FROM Characters WHERE `Charaname` LIKE ? ");
    $firstLetter->execute([$req]);

	return $firstLetter;
}

function allYears() {

    $db = dbConnect();

    $filterYears = $db->query("SELECT DISTINCT(`years`) FROM `TouhouProject` WHERE 1 ORDER BY `TouhouProject`. `years` ASC ");

    return $filterYears;

}

function allKind() {

    $db = dbConnect();

    $filterKind = $db->query("SELECT DISTINCT(`kind`) FROM `TouhouProject` WHERE 1 ORDER BY `TouhouProject`.`kind` ASC ");

    return $filterKind;

}
function getMail($postMail){

    $db = dbConnect();

    $addMail = $db->prepare("INSERT INTO Newsletter (id,email) VALUES ('0',?)");
    $addMail->execute(array($postMail));

    return $addMail;
}
