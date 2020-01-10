<?php

// require "init.php";
require "vendor/autoload.php";

$db = new mysqli('127.0.0.1','root','toto','Games');

if (!$db) {
        die("PAS LOG DU TOUT");
}
    // } else {
    //     die("Je suis log");
    // }

$faker = Faker\Factory::create();

// $query = "INSERT INTO `users` (`name`,`username`,`city`,`state`,`country`,`email`,`company`) VALUES ('$faker->name','$faker->userName','$faker->city','$faker->state','$faker->country','$faker->email','$faker->company')";



for ($i=0 ; $i<200 ; $i++) {

    $random = $faker->numberBetween($min = 1996, $max = 2019);

    $a=array("Official","FanMade");
    $random_keys=array_rand($a);

    $b=array("Vertical-ScrollingShooter","FightingGame","Platform","Puzzle","Racing","Rhythm","Sports","Strategy","VisualNoval","FlashBrowse","MobileGames","Unsorted");
    $random_bkeys=array_rand($b);

    $c=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","W","Y","Z");
    $random_ckeys=array_rand($c);

    var_dump($c[$random_ckeys]);

    // $db->query("INSERT INTO TouhouProject (id,title,descri,img,years,kind,dev) VALUES ('0','$faker->bs','$faker->text','$faker->imageUrl()','$random','$b[$random_bkeys]','$a[$random_keys]')");

    $db->query("INSERT INTO Characters (id,Charaname,descrip) VALUES ('0','$faker->name','$faker->text')");

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creation </title>
</head>
<body>
    <p>Fake Records Created.</p>
    <a href="index.php"><button>Want to create more?</button></a>
</body>
</html>