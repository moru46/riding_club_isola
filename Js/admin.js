// Get the modal
var modal1 = document.getElementById("modal1");
var modal2 = document.getElementById("modal2");
var modal3 = document.getElementById("modal3");



// Get the button that opens the modal
var money = document.getElementById("money");
var training = document.getElementById("training");
var user = document.getElementById("user");


// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("chiudi")[0];
var span2 = document.getElementsByClassName("chiudi")[1];
var span3 = document.getElementsByClassName("chiudi")[2];


// When the user clicks on the button, open the modal 
money.onclick = function() {
  modal1.style.display = "block";
 // aggiornaSoldi();
}
user.onclick = function() {
  modal3.style.display = "block";
}
training.onclick = function() {
  modal2.style.display = "block";
  //aggiornaAllenamenti();
}



// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}
span3.onclick = function() {
  modal3.style.display = "none";
}