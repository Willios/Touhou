<?php require('header.php'); ?>

<div class="col-md-12 text-center centerViewport">
    <header id="time" class="clock" style="text-align: center; color: white; margin-bottom: 30px; font-size: 5em; display: none;"></header>
    <canvas id="myCanvas" width="750" height="550">
        <img id="home" src="../../public/js/IMG/home.png" alt="home" style="display: none;">
        <img id="mur" src="../../public/js/IMG/mur.png" width="50" height="50" style="display:none;">
        <img id="sol" src="../../public/js/IMG/bgg.jpeg" width="1000" height="500" style="display:none;">
        <img id="spriteP1" src="../../public/js/IMG/player1.png" width="50" height="50" style="display:none;">
        <img id="spriteP2" src="../../public/js/IMG/player2.png" width="50" height="50" style="display:none;">
        <img id="murCass" src="../../public/js/IMG/murCass.png" width="50" height="50" style="display:none;">
        <img id="bomb" src="../../public/js/IMG/bomb.png" width="50" height="50" style="display:none;">
        <img id="bomb2" src="../../public/js/IMG/bomb2.png" width="50" height="50" style="display:none;">
        <img id="blastC" src="../../public/js/IMG/blastCentre.png" width="9" height="9" style="display:none;">
        <img id="blastRL" src="../../public/js/IMG/blastRightLeft.png" width="50" height="9" style="display:none;">
        <img id="blastUD" src="../../public/js/IMG/blastUpDown.png" width="50" height="9" style="display:none;">
        <img id="endBlastUp" src="../../public/js/IMG/blastUp.png" style="display: none;">
        <img id="endBlastRight" src="../../public/js/IMG/blastRight.png" style="display: none;">
        <img id="endBlastDown" src="../../public/js/IMG/blastDown.png" style="display: none;">
        <img id="endBlastLeft" src="../../public/js/IMG/blastLeft.png" style="display: none;">
        <img id="powerUp" src="../../public/js/IMG/powerUp.png"style="display:none;">
        <img id="bombUp" src="../../public/js/IMG/bombUp.png" style="display:none;">
        <img id="sakuWinR" src="../../public/js/IMG/SakuyaWinsRound.png" style="display: none,">
        <img id="cirWinR" src="../../public/js/IMG/CirnoWinsRound.png" style="display:none;">
        <img id="sakuWin" src="../../public/js/IMG/SakuyaWins_game.png" style="display: none;">
        <img id="cirWin" src="../../public/js/IMG/CirnoWins_game.png" style="display: none;">
    </canvas>
    <script src="../../public/js/BombermanV5.js"></script>
</div>
<div class="col-md-12 mb-1"></div>

<?php require('footer.php'); ?>
