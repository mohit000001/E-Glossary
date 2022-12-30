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
if(!isset($_SESSION["ngpmarket_id"]))
{
  header('Location:signin.php');
  exit();
}
class account
{
  private $conn,$otp,$id,$check;
  
   function __construct($o,$i)
   {
     $this->otp=$o;
	 $this->id=$i;
   
   }
   function check_val()
   {
    
     settype($this->otp,'int');
     if($this->id!=""&&strlen($this->id)<40&&$this->otp!=""&&strlen($this->otp)==5&&preg_match("/^[0-9]+$/",$this->otp)&&$this->otp==21454)
	 {
	    if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->id)||(preg_match("/^[0-9]+$/",$this->id)&&strlen($this->id)==10))
		{
             $this->enter_data();
		
		}
		else
		{
		  $_SESSION["otp_error"]="yes";
          header('Location:otp.php');
          exit();
		}
	 
	 }
	 else
	 {
	    $_SESSION["otp_error"]="yes";
        header('Location:otp.php');
        exit();
	 
	 }
   
   }
   function enter_data()
   {
     $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
	 if($this->conn->connect_error)
	 {
	   trigger_error($this->conn->connect_error,E_USER_ERROR);
	   exit();
	 
	 }
	 else
	 {
	    $sql="select * from temp_profile where userid='$this->id'";
		$r=$this->conn->query($sql);
		if($r->num_rows==1)
		{
		  $data=$r->fetch_assoc();
		  date_default_timezone_set("Indian/Antananarivo");
	      $ac_date=date("Y-m-d h:i:s");
		  $n=$data["name"];
		  $u=$data["userid"];
		  $g=$data["gender"];
		  $d=$data["dob"];
		  $a=$data["address"];
		  $p=$data["password"];
		  $t=$data["tc"];
		  $sql="insert into profile(name,userid,gender,birth,address,password,tc,ac_date) values('$n','$u','$g','$d','$a','$p','$t','$ac_date')";
		  if($this->conn->query($sql))
		  {
		    $this->delete_data();
		  }
		  else
		  {
		   $_SESSION["otp_error"]="yes";
            header('Location:otp.php');
            exit(); 
		  }
	    }
		else
		{
		    $_SESSION["otp_error"]="yes";
             header('Location:otp.php');
             exit(); 
		}
	 
	 }
   
   }
  function delete_data()
  {
    $sql="delete from temp_profile where userid='$this->id'";
	if($this->conn->query($sql))
	{
	  $this->login();
	}
	else
	{
	 $_SESSION["otp_error"]="yes";
     header('Location:otp.php');
      exit(); 
	}
  
  } 
  function login()
  {
    setcookie("market","",time()-84000,"/");
    $sql="delete from login_system where login='$this->id'";
    if($this->conn->query($sql))
	{
	  $cook="bfasda6s4f5sd64g5dfghf15h45fgh15fg1hb,".$this->id;
	  $sql="insert into login_system(userid,login) values('$this->id','$cook')";
	  if($this->conn->query($sql))
	  {
	   setcookie("market",$cook,time()+84000,"/");
	   if(isset($_SESSION["ngpmarket_id"]))
	   {
        unset($_SESSION["ngpmarket_id"]);	   
	   }
	   header('Location:home.php');
	   exit();
	  }
	}
  }  

}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["otp"])&&isset($_POST["username"]))
 {
 $obj=new account($_POST["otp"],$_POST["username"]);
 $obj->check_val();
 }
 else
 {
  $_SESSION["otp_error"]="yes";
  header('Location:otp.php');
  exit();
 }
}
ELSE
{
  $_SESSION["otp_error"]="yes";
  header('Location:otp.php');
  exit();
}
 
 
 
 ?>