<?php
    require "init.php";
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AfricanMachines drive it...">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/icon.jpg"/>
    <title>add vehicle</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="/test/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/test/vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/test/css/style.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="/css/amachines.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/test/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/test/vendor/nouislider/nouislider.min.css">
   
</head>
<body>
<?php
	require "header.php"
?><php>
    <?php
	    // Check if form was submited
	    if (isset($_POST['submit'])) {
		    $con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test');
		    // Configure upload directory and allowed file types
		    $upload_dir = 'uploads' . DIRECTORY_SEPARATOR;
		    $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
		
		    // Define maxsize for files i.e 10MB
		    $maxsize = 10 * 1024 * 1024;
		    $VEHICLE_ID = hash('sha256', time());
		    $Make = $con->real_escape_string($_POST['Make']);
		    $Model = $con->real_escape_string($_POST['Model']);
		    $Year = $con->real_escape_string($_POST['Year']);
		    $Mileage = $con->real_escape_string($_POST['Mileage']);
		    $transmission = $con->real_escape_string($_POST['Transmission']);
		    $Description = $con->real_escape_string($_POST['Description']);
		    $Price = $con->real_escape_string($_POST['Price']);
		    $Engine_CC = $con->real_escape_string($_POST['Engine_CC']);
		    // Checks if user sent an empty form
      
		    if (!empty(array_filter($_FILES['files']['name'])))
		    {
			    $number_of_images = count($_FILES['files']['name']);
			    $image_number = 0;
			    // add to database
			    $con->query("INSERT INTO test.vehicles (VEHICLE_ID,MAKE,MODEL,YEAR,MILAGE,TRANSMISSION,PRICE,IMAGES_NUM,EXT,ENGINE_CAPACITY,DESCRIPTION) VALUES ('$VEHICLE_ID','$Make', '$Model', '$Year','$Mileage', '$transmission', '$Price', '$number_of_images','jpg','$Engine_CC','$Description')");
			
			    // Loop through each file in files[] array
                $success = 0;
			    $error = 0;
			    foreach ($_FILES['files']['tmp_name'] as $key => $value)
			    
			    {
				    $file_tmpname = $_FILES['files']['tmp_name'][$key];
				    $file_name = $_FILES['files']['name'][$key];
				    $file_size = $_FILES['files']['size'][$key];
				    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
				    // Set upload file path
                    
                    // add to database
				    $filepath = $upload_dir .$VEHICLE_ID.'_'.$image_number.'.'.$file_ext;
				
				    // Check file type is allowed or not
				    if (in_array(strtolower($file_ext), $allowed_types)) {
					
					    // Verify file size - 10MB max
					    if ($file_size > $maxsize)
						    echo "
                                        <div class='alert alert-danger' role='alert'>
                                          Error: {$file_name} File size [{$file_size}.B] is larger than the allowed limit[$maxsize.B].
                                        </div>
                                     ";
						   
                        if (move_uploaded_file($file_tmpname, $filepath))
                        {
                            $success = $success+1;
                        } else {
	                        $error = $error+1;
                        }
					    
				    } else {
					    $error = $error+1;
					    echo "
                                        <div class='alert alert-warning' role='alert'>
                                          {$file_ext} file type is not allowed
                                        </div>
                                     ";
				    }
				    $image_number = $image_number+1;
			    }
			    if($success > 0)
                {
	                echo "
                                    <div class='alert alert-success' role='alert'>
                                      {$success} Files successfully uploaded
                                    </div>
                                 ";
                }
			    if($error > 0)
			    {
				    echo "
                                    <div class='alert alert-danger' role='alert'>
                                      Error  uploading {$error} Files
                                    </div>
                                 ";
			    }
			    
		    } else
		        {
			
			    // If no files selected
			    echo "
                                        <div class='alert alert-warning' role='alert'>
                                          No files selected
                                        </div>
                                     ";
		        }
	    }


    ?><php>

    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <form  method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-input">
                                <label for="Make" class="required">Make</label>
                                <input type="text" name="Make" id="Make" />
                            </div>
                            <div class="form-input">
                                <label for="Model" class="required">Model</label>
                                <input type="text" name="Model" id="Model" />
                            </div>
                            <div class="form-input">
                                <label for="Year" class="required">Year</label>
                                <input type="text" name="Year" id="Year" />
                            </div>
                            <div class="form-input">
                                <label for="Mileage" class="required">Mileage</label>
                                <input type="text" name="Mileage" id="Mileage" />
                            </div>
                            <div class="form-input">
                                <label for="Price" class="required">Price</label>
                                <input type="text" name="Price" id="Price" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-input">
                                <label for="Transmission" class="required">Transmission</label>
                                <input type="text" name="Transmission" id="Transmission" />
                            </div>
                            <div class="form-input">
                                <label for="Engine_CC">Engine Capacity (CC)</label>
                                <input type="text" name="Engine_CC" id="Engine_CC" />
                            </div>
                            <div class="form-input">
                                <label for="Fuel">Fuel</label>
                                <input type="text" name="Fuel" id="Fuel" />
                            </div>
                            <div class="form-input">
                                <label for="Description">Description</label>
                                <input type="text" name="Description" id="Description" />
                            </div>
                            <div class="form-input">
                                <label for="files[]">Upload files</label>
                                <input type="file" name="files[]" id="files[]" multiple>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                        <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>
	<?php
		require "footer.php"
	?><php>


        <!-- JS -->
        <script src="/test/vendor/jquery/jquery.min.js"></script>
        <script src="/test/vendor/nouislider/nouislider.min.js"></script>
        <script src="/test/vendor/wnumb/wNumb.js"></script>
        <script src="/test/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="/test/vendor/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="/test/js/main.js"></script>
        <script src="/js/jquery-3.4.1.min.js"></script>
        <script src="/js/search.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap-4.4.1.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>