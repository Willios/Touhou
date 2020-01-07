//Déclaration des constantes
const cc = document.getElementById("myCanvas");
const ctx = cc.getContext("2d");
const cases = 50;
const colonnes = 15;
const lignes = 11;
const hauteur = lignes*cases, largeur = colonnes*cases;
const murChance = 0.55;
const bonusChance = 0.5;
const frame = 40;
const posX = 0, posY = 0;
const mur = document.getElementById("mur");
const murCass = document.getElementById("murCass");
const bomb = document.getElementById("bomb"), bomb2 = document.getElementById("bomb2"), blastC = document.getElementById("blastC"), blastRL = document.getElementById("blastRL"), blastUD = document.getElementById("blastUD");
const home = document.getElementById("home");
const sol = document.getElementById("sol"), powerUp = document.getElementById("powerUp");
const spriteP1 = document.getElementById("spriteP1"), spriteP2 = document.getElementById("spriteP2");
const pOWin = document.getElementById("sakuWin"), pTWin = document.getElementById("cirWin"), pTWinR = document.getElementById("cirWinR"), pOWinR = document.getElementById("sakuWinR");
//Déclaration des tableaux vide
let board = [];
let bombeListe = [];
let bonusListe = [];
let explosionListe = [];
// page pour le menu
home.onload = () => menu()
function menu() {
    ctx.drawImage(home, 0, 0, largeur, hauteur);
    //effacer le jeu pendant que le menu est affiché
    cc.addEventListener('click', loading); // démarre le jeu par un clic
}
menu(); // dessine le menu

function loading(){
    cc.removeEventListener('click', loading); // empêche de repartir dans le menu avec le clic
    class Player{
        constructor(image, pX, pY, keyLeft, keyRight, keyUp, keyDown, keyBomb, playerNum, bombeCount){
            this.image = image, this.pX = pX, this.pY = pY, this.keyLeft = keyLeft, this.keyRight = keyRight, this.keyUp = keyUp, this.keyDown = keyDown, this.keyBomb = keyBomb;
            this.playerNum = playerNum, this.bombActif = false, this.timer = 0, this.score = 0, this.power = 2, this.bombeCount = bombeCount;
        }
        //Méthode permettant d'avoir les différent condition pour les collisions ainsi que tout ce qui concerne la pose de la bombe avec une touche. 
        moveOnKey(keycode, dodgeX, dodgeY){
            //Condition pour vérifier la sortie du canvas, la colissions des joueurs et tout ce qui n'est pas égal aux bonus ou au vide. ( Gauche )
            if (keycode == this.keyLeft && this.pX && ((board[this.pY][this.pX-1] == 0) || (board[this.pY][this.pX-1] == 50) || (board[this.pY][this.pX-1] == 60) ||(board[this.pY][this.pX-1] >= 100 && board[this.pY][this.pX-1] <= 113)) && !(this.pX-1 == dodgeX && this.pY == dodgeY) ){
                this.pX -= 1;
            }
            //Condition pour vérifier la sortie du canvas, la colissions des joueurs et tout ce qui n'est pas égal aux bonus ou au vide. ( Droite )
            else if (keycode == this.keyRight && this.pX < colonnes-1 && ((board[this.pY][this.pX+1] == 0) || (board[this.pY][this.pX+1] == 50) || (board[this.pY][this.pX+1] == 60) ||(board[this.pY][this.pX+1] >= 100 && board[this.pY][this.pX+1] <= 113)) && !(this.pX+1 == dodgeX && this.pY == dodgeY)){
                this.pX += 1;
            }
            //Condition pour vérifier la sortie du canvas, la colissions des joueurs et tout ce qui n'est pas égal aux bonus ou au vide. ( Haut )
            else if (keycode == this.keyUp && this.pY && ((board[this.pY-1][this.pX] == 0 ) || (board[this.pY-1][this.pX] == 50) || (board[this.pY-1][this.pX] == 60) ||(board[this.pY-1][this.pX] >= 100 && board[this.pY-1][this.pX] <= 113)) && !(this.pX == dodgeX && this.pY-1 == dodgeY)){
                this.pY -= 1;
            }
            //Condition pour vérifier la sortie du canvas, la colissions des joueurs et tout ce qui n'est pas égal aux bonus ou au vide. ( Bas )
            else if (keycode == this.keyDown && this.pY < lignes-1 && ((board[this.pY+1][this.pX] == 0) || (board[this.pY+1][this.pX] == 50) || (board[this.pY+1][this.pX] == 60) ||(board[this.pY+1][this.pX] >= 100 && board[this.pY+1][this.pX] <= 113)) && !(this.pX == dodgeX && this.pY+1 == dodgeY)){
                this.pY += 1;
            } 
            //Instanciation des bombes poser par le joueur
            else if (keycode == this.keyBomb && this.bombeCount != 0) {
                board[this.pY][this.pX] = 3;
                this.bombeCount--;
                let bombe = new Bombe(this.pX, this.pY, this.power, this.bombeCount, this);
                bombeListe.push(bombe);
            }
            if (board[this.pY][this.pX] == 50) {
                board[this.pY][this.pX] = 0;
                if(this.power < colonnes){
                    this.power++;
                }
            }
            if (board[this.pY][this.pX] == 60) { //bonus bombe
                board[this.pY][this.pX] = 0;
                this.bombeCount++;
            }
        }
        //Dessine les players
        draw(){
            ctx.drawImage(this.image, this.pX*cases, this.pY*cases, cases, cases)
        }
    }
    //Création de la classe Bombe ilyas: ajout de bombeCount et idPlayer
    class Bombe{
        constructor(pX, pY, power, bombeCount, idPlayer){
            this.pX = pX, this.pY = pY, this.power = power, this.timer = 0, this.bombeCount = bombeCount, this.idPlayer = idPlayer;
        }
        //Méthode Timer pour la bombe
        bombTimer(){
            this.timer++;
            if (this.timer >= frame*1.5){
                board[this.pY][this.pX] = 4;                
            }
            if (this.timer >= frame*2){
                this.timer = 0;
                this.explode();
                bombeListe = bombeListe.filter(bombe => !(bombe.pX == this.pX && bombe.pY == this.pY));
            } 
        }
        // Méthode explode pour la bombe vérifiant les différent élément de notre tableau de jeu ainsi que la création des bonus selon l'endroit où explose la bombe.
        explode(){
            board[this.pY][this.pX] = 101;
            for(let i = 1; i <= this.power; i++){
                if(board[this.pY][this.pX-i] == 2){
                    let random = Math.random();
                    if(random <= bonusChance){
                        if(random <= bonusChance/2){
                        board[this.pY][this.pX-i] = 60   
                        }else{
                            board[this.pY][this.pX-i] = 50
                        }
                    }else if(random > bonusChance){
                        board[this.pY][this.pX-i] = 0
                    }
                    break;
                } else if(board[this.pY][this.pX-i] == 1){
                    break;
                } else {
                    let boom = new Explosion(this.pY, this.pX-i, "left", this.power, i);
                    explosionListe.unshift(boom);
                }
            }
            for(let i = 1; i <= this.power; i++){
                if(board[this.pY][this.pX+i] == 2){
                    let random = Math.random();
                    if(random <= bonusChance){
//                        if (random <= bonusChance){
                            if(random <= bonusChance/2){
                                board[this.pY][this.pX+i] = 60   
                            }else{
                                board[this.pY][this.pX+i] = 50
                            }        
//                        } 
                    }else if(random > bonusChance){
                        board[this.pY][this.pX+i] = 0
                    }
                    break;
                } else if(board[this.pY][this.pX+i] == 1){
                    break;
                } else {
                    let boom = new Explosion(this.pY, this.pX+i, "right", this.power, i);
                    explosionListe.unshift(boom);
                }
            }
            for(let i = 1; i <= this.power; i++){
                if(this.pY-i >= 0 && board[this.pY-i][this.pX] == 2){
                    let random = Math.random();
                    if(random <= bonusChance){
//                        if (random <= bonusChance){
                            if(random <= bonusChance/2){
                                board[this.pY-i][this.pX] = 60   
                            }else{
                                board[this.pY-i][this.pX] = 50
                            }    
//                    }
                    }else if(random > bonusChance){
                        board[this.pY-i][this.pX] = 0
                        }
                    break;
                }else if(this.pY-i >= 0 && board[this.pY-i][this.pX] == 1){
                    break;
                } else if (this.pY-i >= 0) {
                    let boom = new Explosion(this.pY-i, this.pX, "up", this.power, i);
                    explosionListe.unshift(boom);
                }
        }
            for(let i = 1; i <= this.power; i++){
                if(this.pY < lignes-i && board[this.pY+i][this.pX] == 2){
                    let random = Math.random();
                    if(random <= bonusChance){
                        if(random <= bonusChance/2){
                            board[this.pY+i][this.pX] = 60   
                        }else{
                            board[this.pY+i][this.pX] = 50
                        }
                    } else if(random > bonusChance){
                        board[this.pY+i][this.pX] = 0
                    }
                    break;
                } else if(this.pY < lignes-i && board[this.pY+i][this.pX] == 1 ){
                    break;
                } else if (this.pY < lignes-i) {
                    let boom = new Explosion(this.pY+i, this.pX, "down", this.power, i);
                    explosionListe.unshift(boom);
                }
            }
            let boom = new Explosion(this.pY, this.pX, "center", this.power, i);
            explosionListe.unshift(boom);
            this.idPlayer.bombeCount++;// réincrementer bombeCount
        }
    }
    class Explosion {
        constructor(positionY, positionX, direction, maxPower, power,) {
            this.X = positionX;
            this.Y = positionY;
            this.dir = direction;
            this.max = maxPower;
            this.pow = power;
            this.timer = 0;
        }
        kaboom() {
            this.timer++;
            if (this.dir == "left") {
                if (this.max == this.pow) {
                    board[this.Y][this.X] = 110;
                }else {
                    board[this.Y][this.X] = 100;
                }
            }
            else if (this.dir == "up") {
                if (this.max == this.pow) {
                    board[this.Y][this.X] = 111
                }else {
                    board[this.Y][this.X] = 102
                }
            }
            else if (this.dir == "right") {
                if (this.max == this.pow) {
                    board[this.Y][this.X] = 112
                }else {
                    board[this.Y][this.X] = 100
                }
            }else if (this.dir == "down") {
                if (this.max == this.pow) {
                    board[this.Y][this.X] = 113
                }
                else {
                    board[this.Y][this.X] = 102
                }
            }else {
                board[this.Y][this.X] = 101;
            }
            if (this.timer == frame/2) {
                this.timer = 0;
                board[this.Y][this.X] = 0;
                explosionListe.pop();
            }
        }
    }
    //Création des deux objets players
    var player1 = new Player(spriteP1, posX, posY, 81, 68, 90, 83, 32, 1, 1), player2 = new Player(spriteP2, colonnes-1, lignes-1, 37, 39, 38, 40, 96, 2, 1);
    //Fonction fessant appelle a la méthode pour les mouvement du joueur
    document.onkeydown = function(e){
        let keyPressed = e.keyCode;
        player1.moveOnKey(keyPressed, player2.pX, player2.pY);
        player2.moveOnKey(keyPressed, player1.pX, player1.pY);
    }
    //Fonction pour créer le tableau de jeu avec les différent élément préenregistrer. 
    function createBoard(){
        bombeListe = [];
        bonusListe = [];
        explosionListe = [];    
        board = [];
        for(l=0; l<lignes; l++){
            board.push([]);
            for(c=0; c<colonnes; c++){
                if(l%2 == 1 && c%2 == 1) {
                    board[l].push(1);
                } else if (Math.random() <= murChance && !(l <= 1 && c <= 1) && !(l >= lignes-2 && c >= colonnes-2)){
                    board[l].push(2);
                } else {
                    board[l].push(0);
                }
            }
        }
    }
    //Function permettant de dessiner tout les éléments demander selon leurs numéros attribuer
    function drawBoard(){
        for(l=0; l<board.length; l++){
            for(c=0; c<board[l].length; c++){
                var colX = c*cases, colY = l*cases
                if(board[l][c] == 1){                
                    //Mur indes
                    ctx.drawImage(mur, colX, colY, cases, cases);
                } else if (board[l][c] == 2){
                    //Mur des
                    ctx.drawImage(murCass, colX, colY, cases, cases);
                } else if (board[l][c] == 3){
                    //Bombe phase de pos
                    ctx.drawImage(bomb, colX, colY, cases, cases);
                } else if (board[l][c] == 4){
                    //Bombe exploser
                    ctx.drawImage(bomb2, colX, colY, cases, cases);
                } else if (board[l][c] == 50) {
                    //Bonus
                    ctx.drawImage(powerUp, colX, colY, cases, cases);
                } else if (board[l][c] == 60) {
                    //Bonus bombecount
                    ctx.drawImage(bombUp, colX, colY, cases, cases);
                } else if (board[l][c] == 101){
                    //explosion du centre
                    ctx.drawImage(blastC, colX, colY, cases, cases);
                } else if (board[l][c] == 100){
                    //explosion horizontale
                    ctx.drawImage(blastRL, colX, colY, cases, cases);
                } else if (board[l][c] == 110){
                    //fin explosion gauche
                    ctx.drawImage(endBlastLeft, colX, colY, cases, cases);
                } else if (board[l][c] == 111){
                    //fin explosion haut
                    ctx.drawImage(endBlastUp, colX, colY, cases, cases);
                } else if (board[l][c] == 102){
                    //explosion verticale
                    ctx.drawImage(blastUD, colX, colY, cases, cases);
                } else if (board[l][c] == 112){
                    //fin explosion droite
                    ctx.drawImage(endBlastRight, colX, colY, cases, cases);
                } else if (board[l][c] == 113){
                    //fin explosion bas
                    ctx.drawImage(endBlastDown, colX, colY, cases, cases);
                }
            }
        }
    }
    
    //Fonction permettant la création du sol. 
    function boardFond() {
        ctx.drawImage(sol, 0, 0, largeur, hauteur);
    }
    
    //Appel de la fonction au dessus pour ne pas avoir a la refresh
    createBoard();
    let prout = 0;
    let clock = 300
    function drawClock(){
        let horloge = document.getElementById('time');
        horloge.innerHTML = "";   
        horloge.innerHTML = clock;
    }
    function decreaseClock(){
        prout++;
        if(prout == 24){
            clock--;
        }
        if(prout == 50){
            prout = 0;
        }
        if(clock == 0){
            clock = 300
            alert("TIME'S UP! Y'ALL SUCK ! ! !")
            nextRound();
        }
    }
    //fonction qui passe au round suivant
    function nextRound(){
        cc.removeEventListener('click', nextRound);
        ctx.clearRect(0 , 0 , largeur, hauteur);
        createBoard();
        player1.pX = 0;
        player1.pY = 0;
        player1.bombeCount = 1;
        player1.power = 2;
        player2.bombeCount = 1;
        player2.power = 2;
        player2.pX = colonnes-1;
        player2.pY = lignes-1;
        clock = 300;
        setInterval(start);
    }
    function drawScore(){
        document.getElementById("p1score").innerHTML = player1.score ;
        document.getElementById("p2score").innerHTML = player2.score ;
    }
//Pour vérifier si le joueur se tient sur une flamme, auquel cas, le joueur meurt
    function checkIfDead(){
        if((board[player1.pY][player1.pX] >= 100 && board[player1.pY][player1.pX] <= 113) 
        && (board[player2.pY][player2.pX] >= 100 && board[player2.pY][player2.pX] <= 113)){
            alert("EVERYBODY DIED! \n YOU ALL SUCK!!!");
            board[player1.pY][player1.pX] = 0;
            board[player2.pY][player2.pX] = 0;
            nextRound();
        }
        if(board[player1.pY][player1.pX] >= 100 && board[player1.pY][player1.pX] <= 113){
            alert("PLAYER 1 DIED!!! YOU SUCK AHAHAH");
            board[player1.pY][player1.pX] = 0;
            nextRound();
            player2.score++;
            if (player2.score ==3){
                endGame();
            }
        }
        if(board[player2.pY][player2.pX] >= 100 && board[player2.pY][player2.pX] <= 113){
            alert("PLAYER 2 DIED!!! YOU SUCK AHAHAH");
            board[player2.pY][player2.pX] = 0;
            nextRound();    
            player1.score++;
            if(player1.score ==3){
                endGame();
            }
        }
    }
    
    function endGame(){
        if(player1.score ==3){
            clearInterval(start);
            ctx.clearRect(0,0,largeur,hauteur);
            ctx.drawImage(pOWin,0,0,largeur,hauteur);
            setTimeout(function(){ location.reload();}, 8000);
        }else if (player2.score ==3){
            clearInterval(start);
            ctx.clearRect(0,0,largeur,hauteur);
            ctx.drawImage(pTWin,0,0,largeur,hauteur);
            setTimeout(function(){ location.reload();}, 8000);
        }
    }

        //Fonction permettant de faire la création de chaque élément et de pouvoir les actualliser ensuite
    function draw(){
        ctx.clearRect(0,0, largeur, hauteur);
        boardFond();
        drawBoard();
        //Dessine les players
        player1.draw();
        player2.draw();
        checkIfDead();
        drawClock();
        decreaseClock();
        drawScore();
        //Parcours le tableau bombeListe et applique pour chaque élément la méthode bombTimer
        for(let i=0; i<bombeListe.length; i++){
            bombeListe[i].bombTimer();
        }
        for (i = explosionListe.length-1; i >= 0; i--) {
            explosionListe[i].kaboom();
        }
    }
    var start = setInterval(draw, 1000/frame);
}