<?php require('header.php'); 
ini_set('display_errors', 1);
?>

<div class="col-md-11 text-center my-2" id="nopadding">
    <span class="font-taille-moyen"><u>What is Touhou Project ?</u></span>
    <img src="../../public/css/bordel.jpg" class="py-2 img-fluid" alt="Reimu" width="70%">
    <div class="col-md-12 mb-1">
        <p>The Touhou Project is a series of 2D vertically-scrolling danmaku shooting games made by Team Shanghai Alice, with six fighting game spinoffs co-produced with Twilight Frontier.</p>
    </div>
</div>
<div class="col-md-11 text-center rounded border my-1">
    <form action="rooter.php?action=addMail" method="post">
        <div class="form-group my-1 col-md-6 offset-md-3">
            <label for="exampleInputEmail1">NEWSLETTER</label>
                <div class="col-md-12 d-flex flex-row flex-nowrap">
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                </div>
            <small id="emailHelp" class="form-text">Get the latest news about Touhou development !</small>
        </div>
    </form>
</div>

<?php require('footer.php'); ?> 