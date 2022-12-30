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

class change_profile
{
  private $conn,$content,$whi;
  
  function __construct($c,$w)
  {
    $this->content=$c;
	$this->whi=$w;
  }
  function login_check()
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
			
			   $check="no";
               $this->conn->close();
			   exit();
			  }
		   }
          else
          {
	
			   $check="no";
               $this->conn->close();
			   exit();
			   
		  }		  
		}
		else
		{
		  
		  exit();
		}
  
  }
  function chan_content()
  {
    $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		 if($this->conn->connect_error)
		 {
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  EXIT();
		 }
	$myarr=explode(",",$_COOKIE["market"]);
	 if($this->whi=="address")
     {
	     // header('Location:home.php');
	   if($this->content!==""&&strlen($this->content)>20&&strlen($this->content)<100)
	   {
	    $sql="update profile set address='$this->content' where userid='$myarr[1]'";
	    $this->conn->query($sql);
		exit();
	   }
	 }	
     if($this->whi=="password")
     {
	   if($this->content!==""&&strlen($this->content)>4&&strlen($this->content)<16)
	   {
	    $sql="update profile set password='$this->content' where userid='$myarr[1]'";
	    if($this->conn->query($sql))
		{
		echo "password changed successfully now you can login with your new password, thank you.";
		}
		else
		{
		  ECHO "due to some techinal error password was not changed try again or try after some time, thank you.";
		}
		exit();
	   }
	 }
  
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["address"])||isset($_POST["pass"]))
 {
    if(isset($_POST["address"]))
	{
    $chan=new change_profile($_POST["address"],"address"); 
	$chan->login_check();
	$chan->chan_content();
	}
	else
	{
	  if(isset($_POST["pass"]))
	  {
       $chan=new change_profile($_POST["pass"],"password");
	   $chan->login_check();
	   $chan->chan_content();
	  }
	  else
	  {
	    // header('Location:home.php');
         exit();
	  }
	} 
 }
 else
 {
  // header('Location:home.php');
   exit();
 }
}
ELSE
{
 // header('Location:home.php');
  exit();
  
}


?>