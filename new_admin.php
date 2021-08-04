<?php
	require_once "admin_init.php"
?>
<?php
	$msg = "";
	if (isset($_POST['submit'])) {
		$con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test' );
		
		$first_name = $con->real_escape_string($_POST['first_name']);
		$last_name = $con->real_escape_string($_POST['last_name']);
		$clearance = $con->real_escape_string($_POST['clearance']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$admin_email = $con->real_escape_string($_POST['admin_email']);
		$admin_password = $con->real_escape_string($_POST['admin_password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);
		
		if ($password != $cPassword)
		{
			$msg = "Please Check Your Passwords!";
//			header('Location: /new_admin.php');
		} else {
			$sql = $con->query("SELECT PASSWORD,CLEARANCE FROM test.ADMIN WHERE email='$admin_email'");
			if ($sql->num_rows > 0) {
				$data = $sql->fetch_array();
				$admin_clearance = $data['CLEARANCE'];
				if (password_verify($admin_password, $data['PASSWORD']))
				{
					if ($admin_clearance > 3) {
						$hash = password_hash($password, PASSWORD_BCRYPT);
						$con->query("INSERT INTO test.ADMIN (FIRST_NAME,SECOND_NAME,EMAIL,PASSWORD,CLEARANCE) VALUES ('$first_name','$last_name','$email','$hash','$clearance');");
						$msg = "You have been registered!";
						header('Location: /admin.php');
					}else {
						$msg = "$admin_email is not authorised to register admin accounts!";
//						header('Location: /new_admin.php');
					}
				} else {
					$msg = "wrong username or password";
//					header('Location: /new_admin.php');
				}
			}else{
				$msg = "$admin_email is not authorised to register admin accounts!";
//				header('Location: /new_admin.php');
			}
			
			
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <meta name="description" content="AfricanMachines drive it...">
    <link rel="icon" type="image/png" href="images/icon.jpg"/>
    <title>Register Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #FFFFFF;
            font-family: 'Roboto', sans-serif;
        }
        .form-control {
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }
        .form-control:focus {
            background: #e2e2e2;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        .signup-form {
            width: 400px;
            margin: 30px auto;
        }
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form h2  {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .signup-form hr  {
            margin: 0 -30px 20px;
        }
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }
        .signup-form .row div:first-child {
            padding-right: 10px;
        }
        .signup-form .row div:last-child {
            padding-left: 10px;
        }
        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #3598dc;
            border: none;
            min-width: 140px;
        }
        .signup-form .btn:hover, .signup-form .btn:focus {
            background: #2389cd !important;
            outline: none;
        }
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover {
            text-decoration: none;
        }
        .signup-form form a {
            color: #3598dc;
            text-decoration: none;
        }
        .signup-form form a:hover {
            text-decoration: underline;
        }
        .signup-form .hint-text  {
            padding-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
	require "admin_header.php";
?><php>

    <div class="signup-form">
<!--        echo "<h2 align='center'>$msg</h2>-->
<!--        first_name $first_name <br>-->
<!--        last_name $last_name<br>-->
<!--        clearance $clearance<br>-->
<!--        email $email<br>-->
<!--        password $password<br>-->
<!--        cPassword $cPassword<br>-->
<!--        admin_email $admin_email<br>-->
<!--        admin_password $admin_password<br>-->

        ";
        <form  method="post" action="/new_admin.php">
			<?php
				echo "<h2 align='center'>$msg</h2>
                        ";
			?>
            <h2 align="center">Register Admin</h2>
            <p align="center">Fill in this form to register an admin account!</p>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Exmple@gmail.com" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="cPassword" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" name="terms" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <hr>
            <p align="center">Authorize the transaction above! </p>
            <div class="form-group">
                <input type="password" class="form-control" name="clearance" placeholder="clearance" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="admin_email" placeholder="Admin Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="admin_password" placeholder="Admin Password" required="required">
            </div>
            <div class="form-group">
                <p align="center"><input class="btn btn-outline-light" name="submit" type="submit" value="Register"></p>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href="#">Login here</a></div>
    </div>

</body>
</html>