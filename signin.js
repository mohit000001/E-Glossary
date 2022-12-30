function tech_error()
{
  $(document).ready(function(){
  
  $("#server_side_warning").css("display","block");
  $("#server_side_warning").text("deu to the some technical problem the process was not successfull try again or try after some time ,thank you");
  });

}
function userid_error(data)
{
  $(document).ready(function(){
  
  $("#server_side_warning").css("display","block");
  $("#server_side_warning").html("<span>hello, dear customer you have already a account with <span id='ser_id'>"+data+"</span> userid if your forgot you password so please go to <a href='login.php'>login</a> page and click on forgotton password. if not so try a diffrent userid ,thank you.</span>");
  });

}
function check_form()
{
  var name=document.signin_form.full_name.value;
  var userid=document.signin_form.userid.value;
  var gender=document.signin_form.gender.value;
  var dob=document.signin_form.dob.value;
  var add=document.signin_form.address.value;
  var pass=document.signin_form.pass.value;
  var tc=document.signin_form.tc.checked;
  
 if(name!==""&&name.length<30&&name.match(/^[A-Za-z\s]+$/))
  {
  
      $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
	
  }
  else
  {
    $(document).ready(function(){
	$("#name_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
  }
 if(userid!==""&&userid.length<40&&userid.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
 {
    $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
 }
else
 {
   if(userid.length===10&&userid.match(/^[0-9]+$/))
	{
      
    }
   else
   {
      $(document).ready(function(){
	$("#userid_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
   }
}
if(gender!="")
{
   $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
}
 else
   {
      $(document).ready(function(){
	$("#gender_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
   }
var data=dob.split("/");   
if(data[2]<2005&&data[2]>1899&&dob.match(/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/))
{
   $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
}
 else
   {
      $(document).ready(function(){
	$("#dob_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
   }

 if(add!=""&&add.length<100&&add.length>20)
  {
    $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
  } 
  else
  {
     $(document).ready(function(){
	$("#address_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
  }
 if(pass!=""&&pass.length<16&&pass.length>4)
  {
    $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
  } 
  else
  {
     $(document).ready(function(){
	$("#password_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
  }
 if(tc==true)
  {
    $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
	return true;
  } 
  else
  {
     $(document).ready(function(){
	$("#tc_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
  }
}
/*function aish()
{
var aish="";
var a=setInterval(mohit,10);
function mohit()
{
 
  var nam=document.signin_form.full_name.value;
  if(nam.match(/^[A-Za-z]+$/)||nam=="")
  {
    aish=document.signin_form.full_name.value;
  }
  else
  {
    document.signin_form.full_name.value=aish;
  }

}
}
function right()
{
    $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
	
}
 function wrong(str)
{
    str="'#"+str+"_warning'";
    $(document).ready(function(){
	$(str).css("display","inline-block");
	});
	window.scroll(0,250); 
} 

 if(name!==""&&name.length<30&&name.match(/^[A-Za-z]+$/))
  {
  
      $(document).ready(function(){
	$("#name_warning").css("display","none");
	$("#userid_warning").css("display","none");
	$("#gender_warning").css("display","none");
	$("#dob_warning").css("display","none");
	$("#address_warning").css("display","none");
	$("#password_warning").css("display","none");
	$("#tc_warning").css("display","none");
	});
	
  }
  else
  {
    $(document).ready(function(){
	$("#name_warning").css("display","inline-block");
	});
	window.scroll(0,250); 
   return false;
  }

function mohit()
{
  var x=check_form();
  alert(x)
}*/