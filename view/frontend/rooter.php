
<?php 

require('../../controller/controller1.php');

if (isset($_GET['action']) && $_GET['action'] == 'filter') {
    displayInfo();
}
