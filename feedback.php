<?php
require_once('config.php');

session_start();


  ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <?php

    if(isset($_POST['create'])){


        $feedback= $_POST[('feedback')];

        $sql = "UPDATE users SET feedback = ? WHERE firstname = ?;"
;
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$feedback,'Priyansh']);

        if($result){
            echo "<script>alert('Sent Successfully')</script>";
        }
        else{
            echo "<script>alert('Cannot connect to the Server')</script>";
        }

    }

	?>


            <?php
            require_once ('php/header.php');
        ?>
    	<form action="feedback.php" method="post" name = "register" onsubmit="return validateFeedback()" >
    		<div class="container">
                <div class = "row">
                    <div class = "col-sm-12">
                        <br />
    					<h3>Feedback</h3>
    					<textarea name = "feedback" rows = "4" cols = "50" required></textarea>
                        <br />
                        <input class = "btn btn-primary" type="submit" name="create" value="Send" />
                    </div>
                </div>
            </div>
        </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
