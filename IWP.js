var modal = document.getElementById("bg-modal");
var modal1 = document.getElementById("bg-modal1");
var modal2=document.getElementById("vp-modal");

// Get the button that opens the modal
var bt = document.getElementById("b2");
var bt1= document.getElementById("b1");
var vp=document.getElementById("v1");

// Get the <span> element that closes the modal
var spa = document.getElementsByClassName("close")[0];
var spa1 = document.getElementsByClassName("close1")[0];
var spa2=document.getElementsByClassName("close2")[0];

// When the user clicks on the button, open the modal
bt.onclick = function() {
  modal.style.display = "flex";
}
bt1.onclick = function() {
  modal1.style.display = "flex";
}
vp.onclick = function() {
  modal2.style.display = "flex";
}


// When the user clicks on <span> (x), close the modal
spa.onclick = function() {
  modal.style.display = "none";
}
spa1.onclick = function() {
  modal1.style.display = "none";
}
spa2.onclick = function() {
  modal2.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}