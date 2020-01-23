var modal = document.getElementById('myModal');
var test = document.getElementsByClassName('test')

var img = $('.myImg');
var content = $("#content");
console.log(test)

$('.myImg').click(function(){
    modal.style.display = "block";
});

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}