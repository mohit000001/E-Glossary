 $(document).ready(function(){
 var a=$("#search_box").val("");
 });
var x=0;
var ll="no";
var produ=new Array();
function set_products(str)
{
   if(str!="")
    {
	  $(document).ready(function(){ 
	  
	   $.post("get_products.php",{cat:str},function(data,status){document.getElementById("get_product_con").innerHTML=data; if(navigator.userAgent.indexOf('Firefox')!=-1){$(document).ready(function(){$('.product_stoock').css('max-width','170px');});}});
	  
	  });
	}
}
//document.getElementById("quantity").innerHTML="Quantity<select><option value='1'>1</option><option value='1'>1</option><option value='1'>1</option></select>";

function add_to_cart(str)
{
  var y="";
  if(window.ll.match("yes"))
  {
  $(document).ready(function(){
   var t="#"+str;
   var y=$(t).val();
    
   window.produ[x]=str+"_"+y;
   window.x++;
   document.getElementById("cart_terms").innerHTML=window.x;
  
  });
  }
  else
  {
    login_warn();
  }
  
  
}
function checkout()
{
  if(window.ll.match("yes"))
  {
    window.open("bill.php?pro="+produ,"_self");
  }
  else
  {
    login_warn();
  }
}
function search_product(str)
{
  var check=0;
  var products=new Array("1 kg gehu","1 kg rise","1 kg sugar","500gm red leban tea","1 kg mung dal","dettole","wheel","vimbar","fasiya face soap","harpick","parashoot hair oli","dove shampo","bajaj hair oli","bhakti agarbatee","parle-g","fortune","m. d. h. marchi","m. d. h. haldi","m. d. h. dhaniya","horlex");
  var s_result=new Array();
 if(str!=""){
 
  for(i=0;i<20;i++)
  {
    if(products[i].match(str))
	 {
	   s_result[i]=products[i];
	   check=1;
	 }
  }
  $(document).ready(function(){
  $("#serach_result").css("display","block");
   });
    $(document).ready(function(){
  $("#serach_result").empty();
   });
for(i=0;i<s_result.length;i++)
{
  
  if(typeof s_result[i]!=="undefined")
   {
    var temp=s_result[i];
    $(document).ready(function(){
       $("#serach_result").append('<div onclick="set_search_input_value(\''+temp+'\')" class="search_terms">'+s_result[i]+'</div>');
      });
   }

}
}
else
{
  $(document).ready(function(){
  $("#serach_result").css("display","none");
   });
}
if(check==0)
 {
    $(document).ready(function(){
  $("#serach_result").css("display","none");
   });
 }
}
function set_search_input_value(str)
{
   $(document).ready(function(){
   $("#search_box").val(str);
   });

}
function search_product_php()
{
 
 $(document).ready(function(){
 var a=$("#search_box").val();
   $.post("search_product.php",{pro:a},function(data,status){ document.getElementById("get_product_con").innerHTML=data; if(navigator.userAgent.indexOf('Firefox')!=-1){$(document).ready(function(){$('.product_stoock').css('max-width','170px');});}});
 });

}
$(document).ready(function(){
$("body").click(function(){
$("#serach_result").hide();

});
});

function login_warn()
{
  document.getElementById("login_warning").style.display="block";
  window.scroll(0,150);
}

