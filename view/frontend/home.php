<?php require('header.php'); 
ini_set('display_errors', 1); // Pour afficher les erreurs php directement la page en question
?>

<!-- Balise pour la vidéo en background sur la page home.php -->
<div class="video-reponsive">
<video autoplay loop muted="" id="screenWidth" class="video" ><source src="../../public/css/trailer.mp4" type="video/mp4"></video>
</div>

<!-- Division qui gère l'affichage du logo et de la description de Touhou Project -->
<div class="col-md-12 d-flex flex-column">
<div class="d-flex my-5 justify-content-center"><img src="../../public/css/toho.png" width="10%"></div>
        <div class="col-12 my-2">
            <div class="offset-md-1 col-md-10 d-flex justify-content-center mb-1">
                <p id="mediaqueriesText">The Touhou Project (東方Project), also 東方プロジェクト (Touhou Purojekuto) or Project Shrine Maiden, is a Japanese doujin game series that specialises in shoot 'em ups by sole Team Shanghai Alice member ZUN. Generally, it's a series of 2D (with 3D background) vertically-scrolling danmaku shooting games, that also creates related print works and music CDs. There are also six fighting game spinoffs co-produced with Twilight Frontier, called "danmaku action games." The works of Touhou Project are sometimes called the Touhou Series (東方シリーズ Tōhō shirīzu) for convenience.
                <br><br>The Guinness World Records named the Touhou Project as the "worlds most prolific fan-made shooter series."</p>
            </div>
        </div>
    </div>

<!-- Division pour la newsletter -->
    <div class="col-md-12 text-center my-1" id="closeFooter">
        <form action="rooter.php?action=addMail" method="post">
            <div class="form-group my-1 col-md-6 offset-md-3">
                <label for="exampleInputEmail1">NEWSLETTER</label>
                    <div class="col-md-12 d-flex flex-row flex-nowrap">
                        <input  name="email" type="email" class="form-control exampleInputEmail1" id="exampleInputEmail1" placeholder="Enter email">
                        <button type="submit" class="btn btn-primary mx-2">Submit</button>
                    </div>
                <small id="emailHelp" class="form-text">Get the latest news about Touhou development !</small>
            </div>
        </form>
    </div>

<!-- Script JS qui permet a la vidéo en fond de toujours prendre 100% du viewport dynamiquement ( Sans refresh de pâge) -->
<!-- Combiner a un media queries qui supprime l'affichage de la video quand la largeur du viewport est inférieur a 640px voir mainstyle.css -->
<script>

window.addEventListener('resize', pluginWP)

function pluginWP() {
    screenWidth.setAttribute("width",screen.width);
}
pluginWP();


</script>

<?php require('footer.php'); ?>