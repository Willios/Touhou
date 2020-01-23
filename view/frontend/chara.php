<?php 

require('header.php'); 
ini_set('display_errors', 1);
?>

<!-- <div class="d-flex opacity flex-row flex-wrap col-md-10 offset-md-1 my-2"> -->
<div class="offset-md-2 col-md-8 d-flex justify-content-center" id="borderBottom">
    <div class="col-md-5 text-center my-4">
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

        <div class="col-md-12  text-center my-2">

        <?php 

        if(isset($displayChara)) {

            while ($data1 = $displayChara->fetch()){ 


                ?>

        <div class="mouseHover offset-md-1 col-md-10 rounded border bg-secondary my-2 myImg">
            <h1 class=" col-md-12 m-2 text-center text-dark"><?php echo htmlspecialchars($data1['Charaname']); ?></h1>
                <div class="d-flex col-md-12 flex-row flex-nowrap">
                    <div class="col-md-12"><p><?php echo htmlspecialchars($data1['descrip']); ?></p>
                </div>
            </div>
        </div>

        <?php 

            } $displayChara->closeCursor(); ?>
            <?php if ($currentpage > 1): ?>
                <a href="rooter.php?filterLetter=<?= $letter ?>&&page=1" class="btn btn-outline-primary">&laquo;</a>
            <?php endif ?>
            <?php if ($currentpage > 1): ?>
                <a href="rooter.php?filterLetter=<?= $letter ?>&&page=<?= $currentpage -1 ?>" class="btn btn-primary">&laquo; Previous</a>
            <?php endif ?>
            <?php if ($currentpage < $pages): ?>
                <a href="rooter.php?filterLetter=<?= $letter ?>&&page=<?= $currentpage +1 ?>" class="btn btn-primary">Next &raquo;</a>
            <?php endif; ?>
             <?php if ($currentpage < $pages): ?>
                <a href="rooter.php?filterLetter=<?= $letter ?>&&page=<?= $pages ?>" class="btn btn-outline-primary">&raquo;</a>
            <?php endif;
        } else { ?>

            <img src="../../public/css/search3.png" class="py-2 img-fluid" alt="alphabet" width="25%">
            <div class="col-md-12 mb-1">

        <?php   
        }
        ?>

            <p class="my-4">All Touhou characters are listed below alphabetically.</p>
        </div>
    </div>

<?php require('footer.php'); ?>