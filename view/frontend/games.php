<?php 
//ini_set('display_errors', 1);
//Requête header et controller
require('header.php');
require_once('../../controller/controller1.php');
//Variable déclarer
$dYears = displayYears();
$dKind = displayKind();

?>

<div class="d-flex opacity flex-row flex-wrap col-md-10 offset-md-1 my-4">
<form class="col-md-12 my-4" action="rooter.php?action=filter" method="post">
    <div class="col-md-12 my-1 d-flex justify-content-center" id="flexSelect">
        <select name="years" class="form-control offset-md-1 col-md-2">
            <option value="defaultY">Years</option>
            <!-- Boucle afficher année -->
            <?php while ($dataYears = $dYears->fetch()) { ?>

            <option value="<?php echo $dataYears["years"]; ?>"><?php echo $dataYears["years"]; ?></option>
            <!-- Fermeture boucle -->
            <?php } $dYears->closeCursor(); ?>

        </select>

        <select name="kind" class="form-control col-md-2 mx-4">
            <option value="defaultKoG">Kind of Game</option>
            <!-- Boucle afficher type de jeu -->
            <?php while ($dataKind = $dKind->fetch()) { ?>

            <option value="<?php echo $dataKind["kind"]; ?>"><?php echo $dataKind["kind"]; ?></option>
            <!-- Fermeture boucle -->
            <?php }$dKind->closeCursor(); ?>

        </select>
        <select name="devTeam" class="form-control col-md-2">
            <option value="defaultDT">Dev Team</option>
            <option value="Official">Official</option>
            <option value="FanMade">FanMade</option>
        </select>
        <button type="submit" class="btn btn-primary offset-md-1">Research</button>
    </div>
</form>
<?php 
//Affichage des données des jeux dans la page.
if(isset($display)) {
    error_log("enter display");
    while ($data = $display->fetch()){ 
        
        ?>
            <div class=" mouseHover col-md-12 test rounded border bg-secondary my-2">
                <h1 class=" col-md-12 test m-4 text-center text-dark"><?php echo htmlspecialchars($data['title']); ?></h1>
                <div class="d-flex col-md-12 flex-row flex-nowrap">
                    <div class="test col-md-10"><p><?php echo htmlspecialchars($data['descri']); ?></p></div>
                    <div class="test col-md-2"><img class="container-fluid" src="<?php echo htmlspecialchars($data['img']); ?>"></div>
                </div>
                <div class="col-md-12 ml-3">
                    <h4>Characters in this game :<br></h4>
                    <div class="text-warning">
                    <?php 
                    $cdisplaycpGames = charPerGames($data['id']);
                    for ($i=0;$i < count($cdisplaycpGames); $i++) {
                        echo htmlspecialchars(" - " .$cdisplaycpGames[$i]['Charaname'])."<br>";
                    }?>
                </div>
            </div>
        </div>
    <?php 
        } $display->closeCursor();
    } else {
?>

<div class="col-md-12 rounded border text-center my-4"></div>
<div class="d-flex justify-content-center col-md-12"><img src="../../public/css/search2.png" class="py-2 " alt="search"></div>
<div class="d-flex justify-content-center col-md-12 mb-1"><p>Here you'll find the list of all Touhou shooting and Fanmade games . Ganbaru !</p></div>

<?php 
}
//Requête footer
require('footer.php'); ?>
