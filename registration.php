<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div>
	<?php

    if(isset($_POST['create'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = sha1($_POST[('password')]);
        $address= $_POST[('address')];

        $sql = "INSERT INTO users (firstname,lastname,email,phonenumber,password,address) VALUES (?,?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname,$lastname,$email,$phonenumber,$password,$address]);

        if($result){
            echo "Saved Successfully";
        }
        else{
            echo "There were errors while saving";
        }

    }

	?>
</div>

<div>
	<form action="registration.php" method="post" name = "register" onsubmit="return validateRegistrationForm()" >
		<div class="container">
            <div class = "row">
                <div class = "col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
                    <hr class = "mb-3" />
					<label for="firstname"><b>First Name</b></label>
					<input class = "form-control" type="text" name="firstname" required>

					<label for="lastname"><b>Last Name</b></label>
					<input class = "form-control" type="text" name="lastname" required>

					<label for="email"><b>Email Address</b></label>
					<input class = "form-control" type="email" name="email" required>

                    <label for="address"><b>Delivery Address</b></label>
					<input class = "form-control" type="text" name="address" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class = "form-control" type="number" name="phonenumber" required>

					<label for="password"><b>Password</b></label>
					<input class = "form-control" type="password" name="password" required>

                    <label for="password"><b>Confirm Password</b></label>
					<input class = "form-control" type="password" name="confirm_password" required>

                    <hr class = "mb-3" />
					<input class = "btn btn-primary" type="submit" name="create" value="Sign Up" >
                </div>
                </div>
			</div>
	</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type = "text/javascript">
function validateRegistrationForm(){
var password = document.register.password;
var confirm_password = document.register.confirm_password;
if (password.value.length<6)
{
    alert("Please give a Password more than 5 characters");
    password.focus();
    return false;
}

 if ((password.value)!=(confirm_password.value))
{
    alert("Your password does not match");
    confirm_password.focus();
    return false;
}

return true;
}


</script>
</body>
</html>
