<?php

$keyId = 'rzp_test_KBdRKwHnIErHTx';
$keySecret = '8BJY1I1VIQPYK49a7QdxeUrH';
$displayCurrency = 'INR';

require('../config.php');
session_start();

var_dump($_POST);

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

echo "<pre>";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<h3>Thank you for your purchase</h3>
			 <p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
			 <h4>We have received a payment of Rs. " . $_POST['amount'] . ". Thank you for your purchase.<br>You will be redirected to the main website shortly.Please click <a href='../index.php'>here</a> if you haven't been redirected.</h4>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

if(isset($_POST))
{
	
	$conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
	$sql = "INSERT INTO purchases(user_id,purchase_for,purchase_amount,purchase_at,purchase_status,t_id)VALUES('$_POST[name]','$_POST[purchase_for]','$_POST[amount]',NOW(),'success','$_POST[razorpay_payment_id]')";
	$result = $conn->query($sql);
	$sql2 = "SELECT * FROM users WHERE users.user_id = '$_POST[name]'";
	$result2 = $conn->query($sql2);
	$row = $result2->fetch();
	$conn = null;
	
	$to = $row['user_email_address'];
	$content = "<html><body><img src='http://munshiji.org/images/logo.png' width='200px;' />
		<p>Thank you for your purchase. The total amount that you've paid us is Rs.". $_POST['amount'] .". You can view and enjoy your course by <a href='http://munshiji.org/index.php?action=yourcourses'>clicking here</a>. Thank you for being a part of munshiji.
		</body></html>";
	$headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <coolzsm36@gmail.com>';
	  $msg = $content;
	  mail($to,"Thank you for your purchase",$msg,$headers);
	  
}

echo $html;

?>

<script>
window.onload = function(){
   setInterval(function(){
      window.location.assign('../index.php');
   }, 5000);
};
	
</script>