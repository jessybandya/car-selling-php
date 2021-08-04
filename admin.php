<?php
	require "admin_init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>www.africanmachines.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AfricanMachines drive it...">
    <link rel="icon" type="image/png" href="images/icon.jpg"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/amachines.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>
<?php
	$logedin_as_admin = false;
	if(! $logedin_as_admin)
	{
		$msg = "";
		if (isset($_POST['submit']))
		{
			$logedin_as_admin = false;
			$con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test');
			$email = $con->real_escape_string($_POST['email']);
			$password = $con->real_escape_string($_POST['password']);
			$sql = $con->query("SELECT ID,PASSWORD,EMAIL,SECOND_NAME,CLEARANCE FROM test.ADMIN WHERE email='$email'");
			if ($sql->num_rows > 0)
			{
				$data = $sql->fetch_array();
				if (password_verify($password, $data['PASSWORD']))
				{
					$logedin_as_admin  = true;
					$_SESSION['user'] =$data['ID'];
					$_SESSION['admin'] =true;
					$_SESSION['email'] =$email;
					$_SESSION['clearance'] =$data['CLEARANCE'];
					$_SESSION['name'] =$data['SECOND_NAME']." ".$data['FIRST_NAME'];
					$clearance = $_SESSION['clearance'];
					$name = $_SESSION['name'];
					$msg = "login successfull...";
					header('Location: /index.php');
				} else
				{
					$logedin_as_admin  = false;
					$_SESSION = array();
					$msg = "wrong username or password...";
				}
			} else
			{
				$logedin_as_admin  = false;
				$_SESSION = array();
				$msg = "Please check your inputs!";
			}
		}
	}
?><php>


<body>
	<div class="container">
		<?php
            require_once "admin_header.php";
			if(!$logedin_as_admin)
				{
					echo "
					<div class='login-form'>
						<form action='/admin.php' method='post'>
							<h5 class='text-center'>Welcome to MyAdmin</h5>
							<br>
							<div class='form-group'>
								<input type='text' class='form-control' placeholder='email' name='email' required='required'>
							</div>
							<div class='form-group'>
								<input type='password' class='form-control' placeholder='Password' name='password' required='required'>
							</div>
							<div class='form-group'>
								<button type='submit' class='btn btn-primary btn-block' name='submit'>Log in</button>
							</div>
							<div class='clearfix'>
								<p align='center'><a href='mailto:africanmachines@gmail.com'>Contact Support Center?</a></p>
							</div>
						</form>
                            <p class='text-center'><a href='/new_admin.php'>Create an Admin Account</a></p>
                        </div>
                                    ";
				}
			
		?>
		
		
		
		
	</div>
	
	
	
	
	
	
	<?php
		for ($x = 0; $x <= 4; $x++) {
		    echo "<br>";
		}
		require "footer.php"
	?><php>
		
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/search.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap-4.4.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>