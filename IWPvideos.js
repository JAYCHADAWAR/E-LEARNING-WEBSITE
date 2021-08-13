var modal2=document.getElementById("vp-modal");
var vp=document.getElementById("v1");
var spa2=document.getElementsByClassName("close2")[0];
vp.onclick = function()
{
 modal2.style.display = "flex";
}
spa2.onclick = function() {
 modal2.style.display = "none";
}
var x=document.getElementById("myvideo");
function playthevideo(file)
{
myvideo.src=file;
}