<?php

echo "Thank you for your purchase.You will be redirected to the website shortly.<br>Please click <a href='index.php'>here</a> if you haven't been redirected yet.";
echo"<script>setTimeout(function(){window.location.assign('index.php?action=home'},5000);</script>";
?>