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
 <link href="bill_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="bill.js"></script>
 
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
         <li id="login_button"><a id="login_text" href="logout.php">logout</a></li>			 
	  </ul>
	 
	</nav>
	</div>
 <div id="middle">
 <table>
 <caption>Your Bill,Read Carefully all things</caption>
 <thead><tr>
 <th>product id</th>
 <th>product name</th>
 <th>product quatity</th>
 <th>product price</th>
 <th>price <span style="text-transform:lowercase;">x</span> quantity = total</th></tr>
 </thead>
 <tbody>
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
class bill extends lo
{
   private $id_qua;
   
   function __construct($i)
    {
	  $this->id_qua=$i;
	}
	public function exe()
	{
	  $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		  if($this->conn->connect_error)
		  {
			   trigger_error($this->conn->connect_error,E_USER_ERROR);
			   exit();
		  }
	  $myarry=explode(",",$this->id_qua);
	  $total=0;
	  foreach($myarry as $data)
	  {
	       $id=explode("_",$data);
		   
		   $sql="select product_name,product_price from products where id='$id[0]'";
		   IF($result=$this->conn->query($sql))
		   {
		   $row=$result->fetch_assoc();
		   echo "<tr><td>".$id[0]."</td><td>".$row["product_name"]."</td><td>".$id[1]."<td class='price'>rs. ".$row["product_price"]."</td><td>".$row["product_price"]." <span style='text-transform:lowercase;'>x</SPAN> ".$id[1]." = Rs. ".$row["product_price"]*$id[1]."</td></tr>";                                
	        $total=$total+($row["product_price"]*$id[1]);
		   }
		   ELSE
		   {
		     header('Location:home.php');
             $this->conn->close();
			 exit();
		   }
	  }
	  echo "<tr><td></td><td></td><td></td><td></td><td id='total_amount'>total = rs. ".$total." €</td></tr></tbody></table><br>";
	}
}
IF(isset($_REQUEST["pro"]))
{
$ngp_bill=new bill($_REQUEST["pro"]);
$ngp_bill->exe();
echo "<script>";
 $myarry=explode(",",$_REQUEST["pro"]);
 	 $i=0;
 foreach($myarry as $data)
{

	 echo "window.pro[".$i."]='".$data."'; ";
	 $i++;
}
echo "</script>";
}

else
{
  header('Location:home.php');
  $this->conn->close();
  exit();
}	
?>

<div id="condition_container"><input id="condition"  name="condition" type="checkbox">i have checked my bill carefully.</div>
<br><br><br><form name="payment_form">
<div id="payment_method">
<div id="pay-header">Payment Method :</div><br><br>
<input id="payment_option_offline" value="offline" name="payment_option" type="radio"> case on delavery  <input id="payment_option_online" value="online" name="payment_option" type="radio">online
<br><br><button type="button" onclick="done()" id="bill_submit_button">done</button>
</div></form>

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
 
 
 

