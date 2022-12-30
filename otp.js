function otp_error()
{
  $(document).ready(function(){
  
  $("#server_side_warning").css("display","block");
  $("#server_side_warning").text("Wrong OTP please try again");
  });

}
function check_otp()
{
  var otp=document.otp_form.otp.value;
  if(otp.length===5&&otp.match(/^[0-9]+$/))
  {
    return true;
  }
  else
  {
     $(document).ready(function(){
     $("#top_warning").css("display","inline-block");
     });
     return false;
  }
}