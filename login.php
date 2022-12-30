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
 <link href="login_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="login.js"></script>
 
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
 <?php
    class lo
	{
	  protected $conn;
	  
	  public static $check="no";
	   
	   
	  public function check_login()
	  {
	    if(isset($_COOKIE["market"]))
		{
		   header('Location:home.php');
		   exit();
		}
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
					   header('Location:home.php');
					   $this->conn->close();
					   exit();
					 }
				  }
			  }
			  else
			  {
			
               $this->conn->close();
			   exit();
			  }
		   }
          else
          {
		       
               $this->conn->close();
			   
		  }		  
		}
	
	  }
	
	}
	$obj=new lo;
    $obj->check_login();
?>
<form accept-charset="utf-8" name="login_from" id="login_form" action="login_system.php" method="post" novalidate>

<div id="logo_of_login"><img src="logo_of_site.jpg" height="50px" width="100px" alt="login to ngpmarket">ngpmarket login</div>
<div id="serverside_warning">your userid or password is not matching with our database</div>
<input name="userid" placeholder="Your Userid" type="text"><br><br><br>

<input name="password" placeholder="Your Password" type="password"><br><br><br>

<button type="submit" id="login_submit_button">login</button><a id="forgotton" href="forgotton.php">forgotton password</a><br><br>

<div>if you not have any account right now <a id="signin" href="signin.php">click here</a> to make account with ngpmarket. thank you</div> 

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
 if(isset($_SESSION["login_tech"]))
 {
   if($_SESSION["login_tech"]=="yes")
   {
     echo "<script>login_error();</script>";
     unset($_SESSION["login_tech"]);
   }
 
 
 }


?>
 </div>
</body>
</html>
 
 
 

