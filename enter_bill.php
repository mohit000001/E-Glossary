<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
set_error_handler("ngpmarkey_error_report");
echo $_GET["meth"];
function ngpmarkey_error_report($no,$mess,$file,$line,$content)
{
   echo "<b>ERROR : [$no] $content, $mess in <mark>$file</mark> on line <b>$line</b>";
   error_log(" [NEW] Error: [$no] $content, $mess in $file on $line \n",3,"serverside_error_report.log");
   return false;
}

class bill_entery
{
  private $conn,$pro_qua,$method;
 
  function __construct($p,$m)
  {
    $this->pro_qua=$p;
    $this->method=$m;
  }
  function check_login()
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
    
 
  function execute()
  {
    $total="";
    $p_q=explode(",",$this->pro_qua);
	$product_quantity=array(count($p_q)-1);
	$this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
	if($this->conn->connect_error)
	{
	  trigger_error($this->conn->connect_error,E_USER_ERROR);
	  exit();
	}
	$i=0;
	foreach($p_q as $data)
	{
	   $aa=explode("_",$data);
	   $sql="select product_name,product_price,product_avail from products where id='$aa[0]'";
	   if($result=$this->conn->query($sql))
	   {
	    if($result->num_rows==1)
		{
		  $ee=$result->fetch_assoc();
		  $product_quantity[$i]=$ee["product_name"]."=".$aa[1];
		  $total=$total+($ee["product_price"]*$aa[1]);
		}
		$mines=$ee["product_avail"]-$aa[1];
	   $sql="update products set product_avail='$mines' where id='$aa[0]'";
       $this->conn->query($sql);	   
	   }
	 $i++;  
	}
	date_default_timezone_set("Indian/Antananarivo");
	$or_date=date("Y-m-d h:i:s");
	$myarr=explode(",",$_COOKIE["market"]);
	$sql="select address from profile where userid='$myarr[1]'";
	$r=$this->conn->query($sql);
	$da=$r->fetch_assoc();
	$address=$da["address"];
	$p="";
	$y=9;
	foreach($product_quantity as $da)
	{
	 if($y==9)
	 {
	  $p=$da;
	  $y=6;
	 }
	 else
	 {
	   $p=$p.",".$da;
	 }
	 
	}
    $sql="insert into orders(userid,address,pro_qua,total,pay_status,pay_method,dev_status,order_date) values('$myarr[1]','$address','$p','$total','done','$this->method','dilver successfully','$or_date')";
	if($this->conn->query($sql))
	{
	  header('Location:histroy.php');
	  exit();
	}
  }
}

if(isset($_GET["pro"])&&isset($_GET["meth"]))
{
 $bill=new bill_entery($_GET["pro"],$_GET["meth"]);
 $bill->check_login();
 $bill->execute();
}
else
{
  header('Location:home');
  exit();
}
 ?>