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

class login
{
  private $conn,$userid,$pass;
  
  function __construct($u,$p)
  {
    $this->userid=$u;
	$this->pass=$p;
  }
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
		   }
         	  
		}
	
	  }  
  function check_data()
  {
    if($this->userid!=""&&$this->pass!=""&&strlen($this->userid)<40&&strlen($this->pass)>4&&strlen($this->pass)<16)
	{
	  if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->userid)||(preg_match("/^[0-9]+$/",$this->userid)&&strlen($this->userid)==10))
	  {
	    $this->check_login_with_database();
	  }
	  else
	  {
	    $_SESSION["login_tech"]="yes";
        header('Location:login.php');
        exit();
	  }
	}
	else
	{
	 $_SESSION["login_tech"]="yes";
     header('Location:login.php');
     exit();
	}
  
  }
  function check_login_with_database()
  {
    $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		 
    if($this->conn->connect_error)
	{
	 trigger_error($this->conn->connect_error,E_USER_ERROR);
	 EXIT();
	}
    $sql="select userid,password from profile where userid='$this->userid'";
	
	$ngp=$this->conn->query($sql);
	
	if($ngp->num_rows==1)
	{
	  $data=$ngp->fetch_assoc();
	  if($data["password"]==$this->pass)
	   {
	      $cook="bfasda6s4f5sd64g5dfghf15h45fgh15fg1hb,".$this->userid;
	      $sql="insert into login_system(userid,login) values('$this->userid','$cook')";
	      if($this->conn->query($sql))
	      {
		    setcookie("market",$cook,time()+84000,"/");
			header('Location:home.php');
			exit();
		  }
		  else
		  {
		    $_SESSION["login_tech"]="yes";
            header('Location:login.php');
		    trigger_error("everthing goes correctly last query not executed",E_USER_ERROR);
            exit(); 
		  
		  }
	   }
	   else
	   {
	      $_SESSION["login_tech"]="yes";
          header('Location:login.php');
          exit(); 
	   }
	}
	else
	{
	  $_SESSION["login_tech"]="yes";
      header('Location:login.php');
      exit(); 
	  
	}
  
  
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["userid"])&&isset($_POST["password"]))
 {
  $ngs=new login($_POST["userid"],$_POST["password"]);
  $ngs->check_login();
  $ngs->check_data();
  }
else
 {
   $_SESSION["login_tech"]="yes";
   header('Location:login.php');
   exit();
 }
}
ELSE
{
 $_SESSION["login_tech"]="yes";
 header('Location:login.php');
 exit();

}
?>