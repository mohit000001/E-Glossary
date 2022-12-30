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
 <link href="orders_middle.css" rel="stylesheet" type="text/css"/>
 
 <script src="orders.js"></script>
 
</head>
<body onload="aish()">
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
<div id="orders_head">
<div id="htitle">your orders history</div>
</div>

<?php 
  class histroy
  {
    private $conn;
	
	function display()
	{
	  $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
	  if($this->conn->connect_error)
	  {
	    trigger_error($this->conn->connect_error,E_USER_ERROR);  
	  }
	  else
	  {
	    $myarr=explode(",",$_COOKIE["market"]);
	    $sql="select * from orders where userid='$myarr[1]'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
	      echo "<table>
</thead>
<tr>
<th>transation id</th><th>product details</th><th>order date </th><th>total</th><th>payment method</th><th>payment status</th><th>delavary status</th>
</tr>
</thead>
<tbody>";
		  while($data=$result->fetch_assoc())
		  {
		   $dd=explode(" ",$data["order_date"]);
		   $mm=explode("-",$dd[0]);
		   $dat="Date : ".$mm[2]."/".$mm[1]."/".$mm[0]."<br>Time : ".$dd[1];
		      $p="<ol>";
		   $value=explode(",",$data["pro_qua"]);
		   foreach($value as $x)
		   {
		     $p=$p."<li>".$x."</li>";
		   }
		   
		   if($data["dev_status"]!=="order cancelled"&&$data["dev_status"]!=="dilver successfully")
		   {
			
		    echo "<tr><td>".$data["id"]."</td><td class='product_details'>".$p."</td><td>".$dat."</td><td class='total'>Rs. ".$data["total"]."</td><td>".$data["pay_method"]."</td><td class='total'>".$data["pay_status"]."</td><td>".$data["dev_status"]."<br><br><button onclick='cancell(".$data["id"].")' class='cancell_button'>cancell order</button></td></tr>";
		   
		   }
		   else
		   {
		    echo "<tr><td>".$data["id"]."</td><td class='product_details'>".$p."</td><td>".$dat."</td><td class='total'>Rs. ".$data["total"]."</td><td>".$data["pay_method"]."</td><td class='total'>".$data["pay_status"]."</td><td>".$data["dev_status"]."</td></tr>";
		   }
		  
		  }
		  echo "</tbody></table>";
		}
		else
		{
		  echo "<div id='no_his'>no order history in your account, thank you.</div>" ;
		
		}
	  
	  }
	
	}
  
  }

$his=new histroy();
$his->display();
?>

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
 
 
 

