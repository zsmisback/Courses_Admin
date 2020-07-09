<?php


$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$addedon=$_POST["addedon"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="CxLo29EGTk";

// Salt should be same Post Request 

if(isset($_POST))
{
	$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
	$sql = "INSERT INTO purchases(user_id,purchase_for,purchase_amount,purchase_at,purchase_status,t_id)VALUES('$_POST[firstname]','$_POST[productinfo]','$_POST[amount]','$_POST[addedon]','$_POST[status]','$_POST[txnid]')";
	$result = $conn->query($sql);
	$conn = null;
}

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Thank you for your purchase.<br>You will be redirected to the main website shortly.Please click <a href='index.php'>here</a> if you haven't been redirected.</h4>";
		   }
?>	