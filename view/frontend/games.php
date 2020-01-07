<?php 
ini_set('display_errors', 1);
require('header.php'); ?>

<form action="rooter.php?action=filter" method="post">
    <div class="col-md-11 my-1 d-flex">
        <select name="years" class="form-control col-md-2">
            <option value="defaultY">Years</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
        </select>
        <select name="kind" class="form-control offset-md-2 col-md-2">
            <option value="defaultKoG">Kind of Game</option>
            <option value="VSSG">Vertical-Scrolling Shooter</option>
            <option value="FG">Fighting Game</option>
            <option value="PlatG">Platform</option>
            <option value="PuzzG">Puzzle</option>
            <option value="RaceG">Racing</option>
            <option value="RhythmG">Rhythm</option>
            <option value="SportG">Sports</option>
            <option value="StratG">Strategy</option>
            <option value="VSG">Visual Noval</option>
            <option value="FBG">Flash Browser</option>
            <option value="MG">Mobile Games</option>
            <option value="UG">Unsorted</option>
        </select>
        <select name="devTeam" class="form-control offset-md-2 col-md-2">
            <option value="defaultDT">Dev Team</option>
            <option value="Offi">Official</option>
            <option value="FMG">FanMade</option>
        </select>
        <button type="submit" class="btn btn-primary offset-md-1">Research</button>
        </div>
    <div class="col-md-11 rounded border text-center my-2" id="nopadding">
</form>

<?php 


if (isset($display)) {
     while ($data = $display->fetch()){

         if ($data['years'] == $_POST["years"]) {
            
             echo htmlspecialchars($data['title']);
             echo htmlspecialchars($data['descri']);
             echo htmlspecialchars($data['img']);
         }
        
         ?>

        <?php
    }
     $display->closeCursor();
 } else {
    ?>

    <div><img src="../../public/css/search2.png" class="py-2 img-fluid" alt="search"></div>
    <div class="col-md-12 mb-1"><p>Here you'll find the list of all Touhou shooting and Fanmade games . Ganbaru !</p></div>

 <?php
}
?>

<?php require('footer.php'); ?>
