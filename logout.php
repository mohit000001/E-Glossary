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

class logout
{
  private $conn;

  function check_login()
  {
    if(!isset($_COOKIE["market"]))
	{
	  header('Location:login.php');
	  exit();
	}
    else
	{
	  $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
	  
	  if($this->conn->connect_error)
	  {
	    trigger_error($this->conn->connect_error,E_USER_ERROR);
        EXIT();		
	  }
      else
       {
	     $arr=explode(",",$_COOKIE["market"]);
		 $sql="select login from login_system where userid='$arr[1]'";
		 if($result=$this->conn->query($sql))
		  {
		    if($result->num_rows==1)
			 {
			    $data=$result->fetch_assoc();
				
				if($data["login"]==$_COOKIE["market"])
				{
				  $sql="delete from login_system where userid='$arr[1]'";
				  if($this->conn->query($sql))
				  {
				    setcookie("market"," ",time()-84000,"/");
					header('Location:home.php');
					exit();
				  }
				  else
				  {
				   
			       header('Location:login.php');
			       trigger_error("everthing correct but last query not executed",E_USER_ERROR);
		           exit();
				  }
				}
				else
				{
				 header('Location:login.php');
		         exit();
				  
				}
			 
			 }
		    else
			{
			
			 header('Location:login.php');
			 trigger_error("more same ids found during logout",E_USER_ERROR);
		     exit();
			}
		  }
		 else
		 {
		   header('Location:login.php');
		   exit();
		 
		 }
		
	   }	   
	}
  }

}
$ngp=new logout();
$ngp->check_login();
exit();



?>