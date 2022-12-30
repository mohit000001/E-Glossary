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
class signin_from
{
  private $conn,$name,$id,$gender,$dob,$add,$pass,$tc;
  
  function __construct($n,$i,$s,$d,$a,$p,$t)
  {
    $this->name=$n;
	$this->id=$i;
    $this->gender=$s;
    $this->dob=$d;
    $this->add=$a;
    $this->pass=$p;
    $this->tc=$t;	
  }
  function start_val()
  {
    $arr=explode("/",$this->dob);
    settype($arr[2],'int');
    if(preg_match("/^[A-Za-z\s]+$/",$this->name)&&$this->name!==""&&strlen($this->name)<30&&$this->id!==""&&strlen($this->id)<40&&$arr[2]>1889&&$arr[2]<2006&&preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/",$this->dob)&&$this->add!==""&&strlen($this->add)>20&&strlen($this->add)<100&&$this->pass!==""&&strlen($this->pass)>4&&strlen($this->pass)<16&&$this->tc=="accepted")
     {
        if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->id)||(preg_match("/^[0-9]+$/",$this->id)&&strlen($this->id)==10)&&$this->gender=="male"||$this->gender=="female")
	    {
		 $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		
		 if($this->conn->connect_error)
		 {
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  $_SESSION["tech_warn"]="yes";
	      header('location:signin.php');
		  exit();
		 
		 }
		else
		{
		  $sql="select userid from profile";
		  $r=$this->conn->query($sql);
		  while($data=$r->fetch_assoc())
		   {
		     if($data["userid"]==$this->id)
			  {
			    $_SESSION["userid_error"]=$this->id;
                header('location:signin.php');
				exit();
			  }
		   
		   }
		  $err=explode("/",$this->dob);
          $dat=$err[2]."-".$err[1]."-".$err[0];		  
		  $sql="insert into temp_profile(name,userid,gender,dob,address,password,tc) values('$this->name','$this->id','$this->gender','$dat','$this->add','$this->pass','$this->tc')"; 
		  if($this->conn->query($sql))
		  {
		    $_SESSION["ngpmarket_id"]=$this->id;
		    header('Location:otp.php');
			exit();
		  }
		  else
		  {
		    $_SESSION["tech_warn"]="yes";
	        header('location:signin.php');
	        exit();
		  }
		}
	   
	 }
	else
    {
	 
	  $_SESSION["tech_warn"]="yes";
	  header('location:signin.php');
	  exit();
	
	}	
	}
	else
	{
	  
	   $_SESSION["tech_warn"]="yes";
	   header('location:signin.php');
	  exit(); 
	}
	
  }


} 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["gender"])&&isset($_POST["tc"]))
 {
  $obj=new signin_from($_POST["full_name"],$_POST["userid"],$_POST["gender"],$_POST["dob"],$_POST["address"],$_POST["pass"],$_POST["tc"]);

  $obj->start_val();
 }
 else
 {
  $_SESSION["tech_warn"]="yes";
  header('location:signin.php');
  exit();
 }
}
ELSE
{
 $_SESSION["tech_warn"]="yes";
 header('location:signin.php');
 exit();
}
exit();
?>
