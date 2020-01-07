<?php
function dbConnect(){
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=Games;charset=utf8', 'root', 'toto');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
function getAll(){
	
    $db = dbConnect();

    $filter = $db->query("SELECT * FROM TouhouProject;");

	return $filter;
}

