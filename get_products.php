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
 
	 class get_products
	 {
	   private $conn;
	   
	   public function go()
	   {
	     $this->conn=new mysqli("mysql","tempuser","saxud3sldnbsdfsdf","market");
		 if($this->conn->connect_error)
		 {
		  trigger_error($this->conn->connect_error,E_USER_ERROR);
		  EXIT();
		 }
		 $cat=$_POST["cat"];
		 $sql="select * from products where product_cat='$cat'";
		 
		 $result=$this->conn->query($sql);
		 while($row = $result->fetch_assoc()) 
		 {
		 
	        echo "<div class='product'>
  
           <img class='product_image' src='products/".$row["id"].".jpg' height='130px' width='180px' alt='".$row["product_name"]."'/>
	        <span class='product_name'>".$row["product_name"]."</span><span class='quantity'>Quantity<select id='".$row["id"]."'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option></select></span><br><br>
	        <span class='product_dis'>".$row["product_dis"]."</span><br>
	         <span class='product_stoock'>available stock <span class='stook_num'>".$row["product_avail"]."</span></span>
             <span class='off_rate'><s>Rs ".$row["off_price"]."</s></span><span class='product_price'>Rs ".$row["product_price"]."</span>
	        <button class='add_to_cart_button' onclick='add_to_cart(".$row["id"].")' type='button'>add to cart</button>
	       </div>";
	 
          
	     }
		 $this->conn->close();
	 }
  }
    $obj=new get_products;
	$obj->go();
exit();	
	
  ?>