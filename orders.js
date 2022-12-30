var y=100;
var z=20;
var s=110;

function aish()
{
var x=setInterval(mohit,100);

function mohit()
{

var st=window.y+","+window.z+","+window.s;
var aa="-webkit-linear-gradient(rgb(255,255,25),rgb("+st+"))";
document.getElementById("orders_head").style.background=aa;
window.y=window.y+10;
window.z=window.z+10;
window.s=window.s+10;
if(window.s==250)
{
  window.y=0;
 window.z=10;
window.s=40;

}
}

}
function cancell(str)
{
  $(document).ready(function(){
  
  $.post("cancell_order.php",{id:str},function(data,status){document.getElementById("middle").innerHTML=data;});
  
  });
}