
	
var modal2=document.getElementById("vp-modal");
var vp=document.getElementById("v1");
var spa2=document.getElementsByClassName("close2")[0];
vp.onclick = function() {
 modal2.style.display = "flex";
}
spa2.onclick = function() {
 modal2.style.display = "none";
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
document.getElementById("erfn").innerHTML=" *length of first name should be greater than 8";
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
document.getElementById("erln").innerHTML=" *length of last name should be greater than 8";
document.getElementById("erln").style.color="red";
return false;
}
}
