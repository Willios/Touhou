<?php

require('../../model/model.php');

function displayInfo() {
    $display = getAll();
   
    require('games.php');
}


