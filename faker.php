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

$db->query("INSERT INTO users (namelol) VALUES ('$faker->name')");


// var_dump($faker->name)

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