<?php 

require('header.php'); 
ini_set('display_errors', 1);
?>

<div class="row col-md-12 justify-content-center">
    <div class="col-md-5 text-center my-1">
        <p>
            <?php 

            $letters=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
            for ($i=0 ; $i < 26; $i++) {
                if ($letters[$i] == "Q" || $letters[$i] == "V" || $letters[$i] == "X"): ?>
                    <?= $letters[$i]?> -
                
                <?php elseif ($letters[$i] == "Z"): ?>
                    <a href="rooter.php?filterLetter=<?= $letters[$i] ?> "><?= $letters[$i]?></a>

                <?php else : ?>
                    <a href="rooter.php?filterLetter=<?= $letters[$i] ?> "><?= $letters[$i]?></a> -

                <?php endif;
            }
            ?>

        </p>
    </div>
</div>

    <div class="col-md-12 rounded border text-center my-2" id="nopadding">
        <img src="../../public/css/search3.png" class="py-2 img-fluid" alt="alphabet" width="25%">
        <div class="col-md-12 mb-1">

        <?php 
        
        if(isset($displayChara)) {

            while ($data1 = $displayChara->fetch()){ 

                ?>

                    <h1 class="rounded border col-md-12 m-2 text-center"><?php echo htmlspecialchars($data1['Charaname']); ?></h1>
                    <div class="d-flex col-md-12 flex-row flex-nowrap">
                        <div class="col-md-12"><p><?php echo htmlspecialchars($data1['descrip']); ?></p></div>
                    </div>

        <?php 

            } $displayChara->closeCursor(); 
        } 

        ?>


            <p>All Touhou characters are listed below alphabetically.</p>
        </div>
    </div>

<?php require('footer.php'); ?>