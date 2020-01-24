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

    $filter = $db->prepare("SELECT * FROM TouhouProject WHERE years LIKE ? AND kind LIKE ? AND dev LIKE ? ");
    $filter->execute([$years,$kind,$dev]);

	return $filter;
}

function firstLetter($letter,$perpage,$offset){
	
    $db = dbConnect();

    $firstLetter = $db->prepare("SELECT * FROM Characters WHERE `Charaname` LIKE ? LIMIT $perpage OFFSET $offset");
    $firstLetter->execute([$letter]);

	return $firstLetter;
}
function nbrPages($letter,$paraPerpages) {

    $db = dbConnect();
    
    $int = $db->prepare("SELECT COUNT(id) FROM Characters WHERE `Charaname` LIKE ?");
    $int->execute([$letter]);
    $countElements=(int)$int->fetch(PDO::FETCH_NUM)[0];

    $countPages = ceil($countElements/$paraPerpages);

    return $countPages;
    
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

function totalPagination(){
	
    $db = dbConnect();

    $total = (int)$db->query("SELECT COUNT(id) FROM Characters")->fetch(PDO::FETCH_NUM)[0];
    
    return $total;
    
}

function addEntryDb($array) {

    $db = dbConnect();

    $addDataDb = $db->prepare("INSERT INTO TouhouProject (title,descri,img,years,kind,dev) VALUES (?,?,?,?,?,?)");
    $addDataDb->execute(array_values($array));
}

function charPerGames($id) {

    $db = dbConnect();

    $req = $db->prepare("SELECT t.id AS id_game,c.Charaname
    FROM TouhouProject AS t, Characters AS c, joint AS j
    WHERE t.id = ? AND t.id = j.id_game AND j.id_chara = c.id");
    $req->execute(array($id));
    $cpGames = $req->fetchAll(PDO::FETCH_ASSOC);
    return $cpGames;

}
// ;