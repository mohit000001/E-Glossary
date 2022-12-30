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
	
class cancell_order
{
  private $conn,$id;
  
  function __construct($i)
  {
    $this->id=$i;
  
  }
  function exe()
  {
      $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		 if($this->conn->connect_error)
		 {
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  EXIT();
		 }
	  $myarr=explode(",",$_COOKIE["market"]);	 
      $sql="select dev_status from orders where userid='$myarr[1]' and id='$this->id'";
	  $qq=$this->conn->query($sql);
	  $ee=$qq->fetch_assoc();
	  if($ee["dev_status"]=="order cancelled"||$ee["dev_status"]=="dilver successfully")
	  {
	      
          exit();
	  }
	  $sql="update orders set dev_status='order cancelled',pay_status='payment returned' where userid='$myarr[1]' and id='$this->id'";
      if($this->conn->query($sql))
       {
	      $myarr=explode(",",$_COOKIE["market"]);
	    $sql="select * from orders where userid='$myarr[1]'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
	      echo "<div id='orders_head'><div id='htitle'>your orders history</div></div><table><thead>
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
	      exit();
	   }
	   }
      else
       {

          exit();
	   }	  
  
  }

}	
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 if(isset($_POST["id"]))
 {
   $cancell=new cancell_order($_POST["id"]);
   $cancell->exe();
 
 }
 else
 {
  exit();
 }
}
ELSE
{
  exit();
}	
	exit();
?>