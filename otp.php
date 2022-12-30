<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
set_error_handler("ngpmarkey_error_report");

function ngpmarkey_error_report($no,$mess,$file,$line,$content)
{
   echo "<b>ERROR : [$no] $content, $mess in <mark>$file</mark> on line <b>$line</b>";
   error_log(" [NEW] Error: [$no] $content, $mess in $file on $line \n",3,"serverside_error_report.log");
   return false;
}
$what="";
if(!isset($_SESSION["ngpmarket_id"]))
{
  header('Location:signin.php');
  exit();
}
else
{
  if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_SESSION["ngpmarket_id"])&&strlen($_SESSION["ngpmarket_id"])<40&&$_SESSION["ngpmarket_id"]!="")
  {
   $what="email address";
  }
  else
  {
    if(preg_match("/^[0-9]+$/",$_SESSION["ngpmarket_id"])&&strlen($_SESSION["ngpmarket_id"])==10)
	{
	  $what="mobile number";
	}
	else
	{
	   header('Location:signin.php');
       exit();
	}
  }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>ngpmarket a online shop of nagpur city</title>
 
 <meta name="viewport" content="width=device-width,initail-scale=1"> 
 <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 <meta name="robot" content="follow"/>
 <meta name="keyword" content="ngpshop,market,nagpur market"/>
 <meta name="discription" content="nagpur city online market"/>
 <meta name="developer" content="Raj"/>
 
      

 <script src="jquery.min.js"></script> 
 <link rel="stylesheet" href="bootstrap.min.css" media="all" type="text/css"/> 
 <script src="bootstrap.min.js"></script> 

 
 <link href="header.css" rel="stylesheet" type="text/css"/>
 <link href="footer.css" rel="stylesheet" type="text/css"/>
 <link href="otp_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="otp.js"></script>
 
</head>
<body>
<div id="header_top">
 <img  src="logo_of_site.jpg" id="logo_of_site" height="100px" width="150px" alt="logo of ngp-market"/>
	<nav>
	  <ul>
         <li><a href="home.php">home</a></li>	
         <li><a href="histroy.php">orders</a></li>	
         <li><a href="profile.php">profile</a></li>	
         <li id="signin_button"><a href="signin.php">signin</a></li>	
         <li id="login_button"><a id="login_text" href="login.php">login</a></li>			 
	  </ul>
	 
	</nav>
	</div>
	
 <div id="middle">
 <h1 id="head_of_signin">last step to complete your ngpmarket account</h1>
 
 <form  accept-charset="utf-8" onsubmit="return check_otp()" name="otp_form" id="otp_form_id" method="post" action="new_ac_complete.php" novalidate>

 <div id="server_side_warning"></div>
 <?php class lo
	{
	  protected $conn,$pro_name,$pro_price;
	  
	  public static $check="no";
	   
	   
	  public function check_login()
	  {
	    if(isset($_COOKIE["market"]))
		{
		   $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		 if($this->conn->connect_error)
		 {
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  EXIT();
		 }
		  $myarr=explode(",",$_COOKIE["market"]);
		 $sql="select login from login_system where userid='$myarr[1]'";
		  if($result=$this->conn->query($sql))
		   {
		      if($result->num_rows>0)
			  {
			     $row=$result->fetch_assoc();
				  {
				    if($row["login"]==$_COOKIE["market"])
					 {
					  echo"<script>$(document).ready(function(){ $('#login_text').text('logout'); $('#login_text').attr('href','logout.php'); });</script>";
					   $check="yes";
					   $this->conn->close();
					 }
				  }
			  }
			 
		   }
          		  
		}
	
	  }
	
	}
	$obj=new lo;
    $obj->check_login();
	?>
 <div id="otp_details">an otp have been send to your <?php echo "<span id='what'>".$_SESSION["ngpmarket_id"]."</span> ".$what ?> please enter that otp in below box and submit, thank you.</div>
 <br><br><input placeholder="Enter Your OTP Here" name="otp" type="text"><input type="text" name="username" value="<?php echo $_SESSION["ngpmarket_id"];?>" style="visibility:hidden;"><br>
  <span id="top_warning">OTP should only contain numers and it's length must be  of 5 digits</span>  
   <button type="submit" id="submit_button">submit</button>
 </form>
 
 </div>
 
 <div id="footer_bottom">
  <div class="contact_us">
   <span class="heading_of_contact_us">contact us :</span><br><br>
   Ngp-Market office bulding no.10<br>
   opposite of poonam inox threater<br>
   wardhman nagar, nagpur 440008<br><br>
   phone no :- 0712227485 / 225645<br><br>
   Email : ngpmarket@gmail.com<br><br>
   https://www.ngp-market.com<br> <br>  
  </div>
  
 <div class="socail_links">
  <div class="socail_lines_header">follow us on socail media</div>
  <div class="socail_img">
  <a href="www.facebook.com/ngpmarket" target="_blank"><img src="facebook.jpg" height="20px" width="50px" alt="ngpmarket facebook"/></a>
  <a href="www.tiwtter.com/ngpmarket" target="_blank"><img src="tiwtter.jpg" height="20px" width="50px" alt="ngpmarket tiwtter"/></a>
  <a href="www.youtube.com/ngpmarket" target="_blank"><img src="youtube.jpg" height="20px" width="50px" alt="ngpmarket youtube"/></a>
  <a href="www.google.com/ngpmarket" target="_blank"><img src="google.png" height="20px" width="50px" alt="ngpmarket google"/></div></a>
 </div> 
 
 <div class="about_us">
  <div class="about_us_header">about us:</div><br>
  <div id="about_us_text">
   
   ngp-market is a e-commerce company and is a part of Raj Industry.this is a online shop for daily used products like rise,sugar,soapes etc.
   it is just like a kirana shop which is availabe at home.each order is delivar in only 60min succesfully.company
   gives gurentee for each product ,no any dout.ngp-market is cuurently available only for  orange city.   
  </div>
 
 </div>
 
 <div id="copright_info">copright ngpmarket 2016-2017 @ all rights reserve</div>
 <?php 

  IF(isset($_SESSION["otp_error"]))
   {

      if($_SESSION["otp_error"]=="yes")
	  {
	    echo "<script>otp_error();</script>";
        unset($_SESSION["otp_error"]);
	  }
   
   }
 
?>
 </div>
</body>
</html>
<?php exit();?> 
 