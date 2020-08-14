<?php include 'header.php'; ?>

<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
<div class="container-fluid text-center" style="margin-top:10em;margin-bottom:10em;">
<h1 class="text-center">Pay Using Razorpay</h1>
<hr>
<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-notes.shopping_order_id="3456"
	data-notes.address="<?php echo $data['notes']['address']?>"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
  <input type="hidden" name="name" value="<?php echo $data['prefill']['name']?>">
  <input type="hidden" name="amount" value="<?php echo $data['amount']?>">
  <input type="hidden" name="contact" value="<?php echo $data['prefill']['contact']?>">
  <input type="hidden" name="purchase_for" value="<?php echo $data['notes']['address']?>">
</form>
</div>
<?php include 'footer.php'; ?>