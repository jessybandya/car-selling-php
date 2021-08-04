<?php
	require "init.php"
?>
<?php
	$msg = "";
	if (isset($_POST['submit']))
	{
		$isLoggedIn  = false;
		$con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test');
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		
		$sql = $con->query("SELECT id, password,name,LAST_LOGIN,LOGIN_COUNT FROM test.users WHERE email='$email'");
		if ($sql->num_rows > 0)
		{
			$data = $sql->fetch_array();
			$LAST_LOGIN = date('m/d/Y H:i:s', time());
			$LOGIN_COUNT = $data['LOGIN_COUNT']+1;
			$sql2 = $con->query("UPDATE test.users SET LAST_LOGIN = '$LAST_LOGIN' WHERE email ='$email'");
			$sql3 = $con->query("UPDATE test.users SET LOGIN_COUNT = '$LOGIN_COUNT' WHERE email ='$email'");
			if (password_verify($password, $data['password']))
			{
				$isLoggedIn  = true;
				$_SESSION['user'] =$data['id'];
				$_SESSION['name'] =$email;
				$_SESSION['email'] =$email;
				$_SESSION['admin'] =false;
				$_SESSION['clearance'] =0;
				$msg = "login successfull...";
				header('Location: /index.php');
				
			} else
			{
				$isLoggedIn  = false;
				$_SESSION = array();
				$msg = "wrong username or password...";
				
				
			}
		} else
			$_SESSION = array();
			$msg = "Please check your inputs!";
		 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login africanmachines.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="africanmachines.css" rel="stylesheet" type="text/css">

    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
    
</head>
<body>
<?php
	require "header.php";
?><php>
	
	<?php
//		echo $msg.'<br>';
//		echo "mail ".$email.'<br>' ;
//		echo "pass ".$password.'<br>';
//		echo "isLoggedIn ".$isLoggedIn.'<br>';
		
	?><php>
<div class="login-form">
    <form action="/login.php" method="post">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="email" name="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center"><a href="/signup.php">Create an Account</a></p>
</div>
        <br><br><br><br>
		<?php
			require "footer.php"
		?><php>
</body>
</html>