var pro=new Array();
function done()
{
 var x=document.payment_form.payment_option.value;
 var y=document.getElementsByTagName("input")[0].checked;
 if(x=="")
 {
  alert("please select payment method :")
  return false;
 }
 if(y==false)
 {
   alert("please tic that option which is given below of your bill that is our condition")
    return false;
 }
 if(x!=""&&y!=false)
  {
      //var z=pro.length;
	  //pro[z]=x;
	  window.open("enter_bill.php?pro="+pro+"&meth="+x,"_self");
	  //pro.splice(z,1);
  }
}