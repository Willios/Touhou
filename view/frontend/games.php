<?php 
ini_set('display_errors', 1);
require('header.php');
require_once('../../controller/controller1.php');

$dYears = displayYears();
$dKind = displayKind();

?>

<form class="col-md-12" action="rooter.php?action=filter" method="post">
    <div class="col-md-12 my-1 d-flex justify-content-center" id="flexSelect">
        <select name="years" class="form-control col-md-2">
            <option value="defaultY">Years</option>

            <?php while ($dataYears = $dYears->fetch()) { ?>

                        <option value="<?php echo $dataYears["years"]; ?>"><?php echo $dataYears["years"]; ?></option>

            <?php } $dYears->closeCursor(); ?>

        </select>

        <select name="kind" class="form-control col-md-2 mx-4">
            <option value="defaultKoG">Kind of Game</option>

            
            <?php while ($dataKind = $dKind->fetch()) { ?>

            <option value="<?php echo $dataKind["kind"]; ?>"><?php echo $dataKind["kind"]; ?></option>

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

if(isset($display)) {

    while ($data = $display->fetch()){ 
        
        ?>

            <h1 class="rounded border col-md-12 m-2 text-center"><?php echo htmlspecialchars($data['title']); ?></h1>
            <div class="d-flex col-md-12 flex-row flex-nowrap">
            <div class="col-md-10"><p><?php echo htmlspecialchars($data['descri']); ?></p></div>
            <div class="col-md-2"><img class="container-fluid" src="<?php echo htmlspecialchars($data['img']); ?>"></div>
            </div>

    <?php 
        } $display->closeCursor();
    } else {
?>

<div class="col-md-12 rounded border text-center my-2" id="nopadding"></div>
<div class="d-flex justify-content-center col-md-12"><img src="../../public/css/search2.png" class="py-2 " alt="search"></div>
<div class="d-flex justify-content-center col-md-12 mb-1"><p>Here you'll find the list of all Touhou shooting and Fanmade games . Ganbaru !</p></div>

<?php 
}
?>

<?php require('footer.php'); ?>
