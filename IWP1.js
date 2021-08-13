var modal = document.getElementById("bg-modal");
var modal1 = document.getElementById("bg-modal1");
var modal2=document.getElementById("vp-modal");
// Get the button that opens the modal
var bt = document.getElementById("b2");
var bt1= document.getElementById("b1");
var bt2=document.getElementById("btn");
/var vp=document.getElementById("v1");/
// Get the <span> element that closes the modal
var spa = document.getElementsByClassName("close")[0];
var spa1 = document.getElementsByClassName("close1")[0];
/var spa2=document.getElementsByClassName("close2")[0];/
// When the user clicks on the button, open the modal
bt.onclick = function() {
 modal.style.display = "flex";
}
bt1.onclick = function() {
 modal1.style.display = "flex";
}
bt2.onclick=function()
{
modal.style.display="flex";
}
/*vp.onclick = function() {
 modal2.style.display = "flex";
}*/

// When the user clicks on <span> (x), close the modal
spa.onclick = function() {
 modal.style.display = "none";
}
spa1.onclick = function() {
 modal1.style.display = "none";
}
/*spa2.onclick = function() {
 modal2.style.display = "none";
}*/
// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
 if (event.target == modal) {
 modal.style.display = "none";
 }
}*/
//document.getElementById("enroll").disabled=true;
function signupval()
{
var usern=document.getElementById("uname");
var eid=document.getElementById("email");
var p=document.getElementById("password");
var cp=document.getElementById("cpassword");
var phn=document.getElementById("pnum");
var mobilecheck=/^[789][0-9]{9}$/;
if(usern.value.length<3||usern.value.length>20)

{
document.getElementById("userer").innerHTML="username length should be between 3
and 20";
document.getElementById("userer").style.color="red";
return false;
}
if(p.value.length>6 || cp.value.length>6)
{
 if(p.value!=cp.value)
 {
document.getElementById("cpe").innerHTML="password and confirm password should be
same";
document.getElementById("cpe").style.color="red";
return false;
 }
 if(p.value===cp.value)
 {
document.getElementById("cpe").innerHTML="";
//document.getElementById("cpe").style.color="red";
 
 }
 
 
 
}
else if(p.value.length<6)
{
alert("password length must be greater than 6");
return false;
}

else if(cp.value.length<6)
{
alert("confirm password length must be greater than 6");
return false;
}
if(!(mobilecheck.test(phn.value)))
{
document.getElementById("perror").innerHTML="invalid phone number";
document.getElementById("perror").style.color="red";
return false;
}
}
function cv()
{
var fn=document.getElementById("fname");
var ln=document.getElementById("lname");
/*if(fn.value.length>8)
{
document.getElementById("erfn").innerHTML=" ";

}*/
if(fn.value.length<8)
{
document.getElementById("erfn").innerHTML=" *length of first name should be greater
than 8";
document.getElementById("erfn").style.color="red";
return false;
}
 
/*if(ln.value.length>8)
{
document.getElementById("erln").innerHTML=" ";
console.log(ln.value);
}*/
if(ln.value.length<8)
{
document.getElementById("erln").innerHTML=" *length of last name should be greater
than 8";
document.getElementById("erln").style.color="red";
console.log(ln.value);

return false;
}
}
