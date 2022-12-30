<?php 
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
 <link href="profile_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="profile.js"></script>
 
</head>
<body onkeyup="mohit(event)">
<div id="header_top">
 <img  src="logo_of_site.jpg" id="logo_of_site" height="100px" width="150px" alt="logo of ngp-market"/>
	<nav>
	  <ul>
         <li><a href="home.php">home</a></li>	
         <li><a href="histroy.php">orders</a></li>	
         <li><a href="profile.php">profile</a></li>	
         <li id="signin_button"><a href="signin.php">signin</a></li>	
         <li id="login_button"><a id="login_text" href="logout.php">logout</a></li>			 
	  </ul>
	 
	</nav>
	</div>
 <div id="middle">
 <div id="profile_head">
<div id="htitle">your ngpmarket profile </div><marquee>Your this profile information is fetched when required so it is our kindly request to you that kepp your details upto date you can aslo edit it here, thank you. here Your this profile information is fetched when required so it is our kindly request to you that kepp your details upto date you can aslo edit it here</marquee>
</div>
 <?php
    class lo
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
					  
					   $check="yes";
					   $this->conn->close();
					   
					 }
				  }
			  }
			  else
			  {
			   header('Location:home.php');
			   $check="no";
               $this->conn->close();
			   exit();
			  }
		   }
          else
          {
		     header('Location:home.php');
			   $check="no";
               $this->conn->close();
			   exit();
			   
		  }		  
		}
		else
		{
		  header('Location:home.php');
		  exit();
		}
	  }
	
	}
	$obj=new lo;
    $obj->check_login();
?>
<div id="profile">
<div id="profile_img"><img src="profile.jpg" height="300px" width="400px" alt="temprory profile picture"></div>
<div id="profile_text">your this profile details are applied to all the works you will do at ngpmarket like shopping,
your payment,your address etc.so it's strogly recommended you that you fill your origal details which belong you any 
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
your this profile details are applied to all the works you will do at ngpmarket like shopping,
your payment,your address etc.so it's strogly recommended you that you fill your origal details which belong you any 
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
your this profile details are applied to all the works you will do at ngpmarket like shopping,
your payment,your address etc.so it's strogly recommended you that you fill your origal details which belong you any 
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
your this profile details are applied to all the works you will do at ngpmarket like shopping,
your payment,your address etc.so it's strogly recommended you that you fill your origal details which belong you any 
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
your this profile details are applied to all the works you will do at ngpmarket like shopping,
your payment,your address etc.so it's strogly recommended you that you fill your origal details which belong you any 
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.
goverment approved id card like adhar card. ngpmarket team is with so enjoy at ngpmarket, thank you.

</div>
<div id="profile_contain">

  <?php 
    
	class profile
    {
      private $conn;
	  
	  function pro()
	  {
	    $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		
		if($this->conn->connect_error)
		{
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  exit();
		}
	    else
		{
		  $myarr=explode(",",$_COOKIE["market"]);
		  $sql="select name,gender,birth,address from profile where userid='$myarr[1]'";
		  $result=$this->conn->query($sql);
		  if($result->num_rows==1)
		  {
		    $value=$result->fetch_assoc();
			$dat=explode("-",$value["birth"]);
			$d=$dat[2]."/".$dat[1]."/".$dat[0];
		    echo "<span class='profile_heads'>full name : </span>".$value["name"]."<br><br>";
			echo "<span class='profile_heads'>gender : </span>".$value["gender"]."<br><br>";
			echo "<span class='profile_heads'>date of birth : </span>".$d."<br><br>";
			echo "<span class='profile_heads'>address : <textarea type='text' readonly id='addr'>".$value["address"]."</textarea><button type='button' onclick='change_add_con(5)' id='chan_add'>change address</button><br><span id='address_warning'>the address should be less than 100 charters and grater 20 charters</span><br><br>";
			echo "<span class='profile_heads'>password : <input type='password' readonly id='passw' value='*****************************************************'><button onclick='change_pass(5)' type='button' id='chan_pass'>change password</button><br><span id='pass_de'>password is high secure that's why don't showing here</span><br><span id='password_warning'>password should be less than 16 charters and greater 4 charters</span>";
		  }
		  else
		  {
		   trigger_error("multiple userid are available",E_USER_ERROR);
		    exit();
		  
		  }
		
		}
	  }

	}
    
 $prr=new profile;
 $prr->pro();
  ?>
 
</div>
</div>
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
 <?php exit();?>
 </div>
</body>
</html>
 
 
 

