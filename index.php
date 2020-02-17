<?php

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}


?>

<!DOCTYPE html>
<head>
    <title>PayTM Karo</title>
</head>
<body>


<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
// Configure environment
env: 'sandbox',
client: {
sandbox: 'demo_sandbox_client_id',
production: 'demo_production_client_id'
},
// Customize button (optional)
locale: 'en_US',
style: {
size: 'small',
color: 'gold',
shape: 'pill',
},
// Set up a payment
payment: function (data, actions) {
return actions.payment.create({
transactions: [{
amount: {
total: '0.01',
currency: 'USD'
}
}]
});
},
// Execute the payment
onAuthorize: function (data, actions) {
return actions.payment.execute()
.then(function () {
// Show a confirmation message to the buyer
window.alert('Thank you for your purchase!');
});
}
}, '#paypal-button');
</script>
<p>Welcome to index</p>
<a href="index.php?logout=true">Logout</a>
</body>
</html>
