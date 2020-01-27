<?php 
//ini_set('display_errors', 1);
//Requête header et controller
require('header.php');
require_once('../../controller/controller1.php');
//Déclaration variable
$dYears = displayYears();
$dKind = displayKind();

?>

<form class="d-flex flex-column" action="rooter.php?action=add" method="post">
    <div class=" d-flex order-1 justify-content-center mt-4">
        <input class="exampleInputEmail1" type="text" name="title" placeholder="Game title here">
    </div>

    <div class=" d-flex order-6 justify-content-center">
        <textarea class="exampleInputEmail1" style="width:500px;height:350px" id="textEditor" name="descri" placeholder="Description here"></textarea>
    </div>

    <div class=" d-flex order-2 justify-content-center">
        <input class="my-4 exampleInputEmail1" type="url" name="url" placeholder="Image url here">
    </div>
    <div class="d-flex flex-row order-3 justify-content-center my-3">
        <select name="years" class="form-control col-md-1 px-2">
            <option value="defaultY">Years</option>
            <!-- Boucle afficher année -->
            <?php while ($dataYears = $dYears->fetch()) { ?>

            <option value="<?php echo $dataYears["years"]; ?>"><?php echo $dataYears["years"]; ?></option>
            <!-- Fermeture boucle -->
            <?php } $dYears->closeCursor(); ?>
        </select>

        <select name="kind" class="form-control col-md-1 px-2">
            <option value="defaultKoG">Kind of Game</option>
            <!-- Boucle afficher type de jeu -->
            <?php while ($dataKind = $dKind->fetch()) { ?>

            <option value="<?php echo $dataKind["kind"]; ?>"><?php echo $dataKind["kind"]; ?></option>
            <!-- Fermeture boucle -->
            <?php }$dKind->closeCursor(); ?>
        </select>

        <select name="devTeam" class="form-control col-md-1 px-2">
                <option value="defaultDT">Dev Team</option>
                <option value="Official">Official</option>
                <option value="FanMade">FanMade</option>
        </select>
    </div>
    <div class="d-flex order-7 justify-content-center pb-4 my-3">
        <input class="button" type='submit' value='Envoyer'/>
    </div>
</form>

<!-- Requête footer -->
<?php require('footer.php'); ?>