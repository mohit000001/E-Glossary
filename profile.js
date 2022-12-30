function change_add_con(str)
{
  if(str==5)
  {
  document.getElementById("addr").removeAttribute("readonly");
  document.getElementById("chan_add").setAttribute("onclick","change_add_con(10)");
  document.getElementById("chan_add").innerHTML="change";
  document.getElementById("addr").focus();
  }
  if(str==10)
  {
   $(document).ready(function(){
   
     var add=$("#addr").val();
	 if(add!=""&&add.length<100&&add.length>20)
	 {
	   $.post("change_profile.php",{address:add},function(){ window.location.reload();});
	 }
	 else
	 {
	   $("#address_warning").css({"display":"inline-block"});
	 }
   
   });
  }
}

function change_pass(str)
{
  if(str==5)
  {
  document.getElementById("passw").removeAttribute("readonly");
  document.getElementById("chan_pass").setAttribute("onclick","change_pass(10)");
  document.getElementById("chan_pass").innerHTML="change";
  document.getElementById("passw").focus();
  }
  if(str==10)
  {
   $(document).ready(function(){
   
     var x=$("#passw").val();
	 if(x!=""&&x.length<16&&x.length>4)
	 {
	   $.post("change_profile.php",{pass:x},function(data,status){ alert(data); window.location.reload();});
	 }
	 else
	 {
	   $("#password_warning").css({"display":"inline-block"});
	 }
   
   });
  }
}

function mohit(event)
{
   var i=event.keyCode;
   if(i==27)
   {
   var rr=document.createAttribute("readonly");
   var rw=document.createAttribute("readonly");
   document.getElementById("addr").setAttributeNode(rr);
   document.getElementById("chan_add").innerHTML="change address";
   document.getElementById("chan_add").setAttribute("onclick","change_add_con(5)");
   document.getElementById("passw").setAttributeNode(rw);
   document.getElementById("chan_pass").innerHTML="change password";
   document.getElementById("chan_pass").setAttribute("onclick","change_pass(5)");
   window.location.reload();
	 
   }
}
