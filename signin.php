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
 <link href="signin_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="signin.js"></script>
 
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
 <h1 id="head_of_signin">create a account in ngpmarket to shop now</h1>
 
 <form  accept-charset="utf-8" onsubmit="return check_form()" name="signin_form" id="signin_form_id" method="post" action="new_ac.php" novalidate>

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
 
 <label for="full_name">full name : <input placeholder="your full name" name="full_name" type="text"></label>
 <br><span id="name_warning" class="form_filed_warning">name should only contain charters and must be less than 30 charters</span><br><br>
 
 <label for="userid" id="userid">user id : <input placeholder="Email or Mobile No." name="userid" type="text"></label>
 <br><span id="userid_warning" class="form_filed_warning">your userid is in invalid form or it is blank</span><br><br>
 
 <div id="gender"> sex : male<input value="male" class="gen" name="gender" type="radio"> female<input value="female" class="gen" name="gender" type="radio"></div>
 <br><span id="gender_warning" class="form_filed_warning">must select your gender</span><br>
 
 <label id="date_of_birth" for="date_of_birth">date-of-birth : <input placeholder="dd/mm/yyyy" name="dob" type="text"></label><br>
 <span id="dob_warning" class="form_filed_warning">birth date is in invalid form</span><br>
 
 <label for="address"> address : <textarea  placeholder="your full address with your city and state maximum 100 charters" name="address" type="text" ></textarea></label>
  <br><span id="address_warning" class="form_filed_warning">address must be less than 100 charters and should be greater than 20 charters</span><br><br>
  
  <label for="password"> password : <input type="password" name="pass"></label>
   <br><span id="password_warning" class="form_filed_warning">password must be beetween 5 - 15 charters and should not be blank</span><br>
   
  <label for="tc" id="tc"> <input value="accepted" name="tc" type="checkbox"> <a href="termsaconditions">i agree with all terms and condition of ngpmarket</a></label> 
  <br><span id="tc_warning" class="form_filed_warning">you must accept t&c </span><br>
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

  IF(isset($_SESSION["tech_warn"]))
   {
    
      if($_SESSION["tech_warn"]=="yes")
	  {
	    echo "<script>tech_error();</script>";
        unset($_SESSION["tech_warn"]);
	  }
   
   }
 if(isset($_SESSION["userid_error"]))
  {
    echo "<script>userid_error('".$_SESSION["userid_error"]."');</script>";
    unset($_SESSION["userid_error"]); 
  }
 
?>
 </div>
</body>
</html>
<?php exit();?> 
 
 

