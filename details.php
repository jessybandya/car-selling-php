<?php
	require "init.php";
?><php>
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
    <link href="africanmachines.css" rel="stylesheet" type="text/css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
        }

        .header {
            text-align: center;
            padding: 32px;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            -ms-flex: 16.66%; /* IE10 */
            flex: 16.66%;
            max-width: 16.66%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }
        @media screen and (max-width: 1600px) {
            .column {
                -ms-flex: 20%;
                flex: 20%;
                max-width: 20%;
            }
        }
        @media screen and (max-width: 1200px) {
            .column {
                -ms-flex: 25%;
                flex: 25%;
                max-width: 25%;
            }
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 900px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 350px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
    </style>

</head>


<body>
<?php
	require "header.php"
?><php></php>



    <div class="container">
        <div class='card border-0 ' style='border-radius: 8px'>
            <div class="modal-body row">
            <div class="col-md-6">
                <!-- Your first column here -->
				<?php
					if (isset($_GET['link']))
					{
						$image = $_GET['link'];
						$split=explode("_",$image)[0];
						$entry=explode("uploads/",$split)[1];
						$con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test');
						$sql = $con->query("SELECT VEHICLE_ID,MAKE,MODEL,YEAR,MILAGE,TRANSMISSION,PRICE,IMAGES_NUM,EXT,ENGINE_CAPACITY,VIEWS_NUM FROM test.vehicles WHERE VEHICLE_ID like '$entry'");
						if ($sql->num_rows > 0)
						{
							$row = $sql->fetch_array();
							{
								$PRICE = $row['PRICE'];
								$VIEWS_NUM = $row['VIEWS_NUM']+1;
								$sql2 = $con->query("UPDATE test.vehicles SET VIEWS_NUM = '$VIEWS_NUM' WHERE VEHICLE_ID like '$entry'");
								$IMAGES_NUM = $row['IMAGES_NUM'];
								$VEHICLE_ID = $row['VEHICLE_ID'];
								$image = '/uploads/'.$row['VEHICLE_ID'].'_'.'0'.'.'.$row['EXT'];
								$make = $row['MAKE'].' '.$row['MODEL'];
								$year = $row['YEAR'];
								$milage = $row['MILAGE'];
								$text = "A brief description of the car";
								$cc = $row['ENGINE_CAPACITY'];
								$tx = $row['TRANSMISSION'];
								$var = array_rand(array_flip(array(1, 2, 3, 4, 5, 6, 7)), 1);
								$dmy = array_rand(array_flip(array('d', 'm', 'w')), 1);
								
								echo "
                                        <div class='card border-0 '>
                                            <div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
                                                <ol class=\"carousel-indicators\">
                                                    <li data-target=\"#carouselExampleIndicators\" data-slide-to='0' class=\"active\"></li>
                                     ";
								$counter = 1;
								while($counter < $IMAGES_NUM)
								{
									echo"
                                        <li data-target=\"#carouselExampleIndicators\" data-slide-to='$counter'></li>
                                    ";
									$counter = $counter+1;
								}
								echo "</ol>
                                                
                                               
                                                <div class=\"carousel-inner\">
                                                
                                                
                                 ";
								
								$image = '/uploads/'.$entry.'_'.'0'.'.'.$row['EXT'];
								echo"
                                        <div class=\"carousel-item active\">
                                            <img class='card-img-top  img-fluid  border-0' style='border-radius: 7px' src=$image width='150' height='150' alt='0.image'>
                                        </div>
                                    ";
								$counter = 1;
								while($counter < $IMAGES_NUM)
								{
									$image = '/uploads/'.$entry.'_'.$counter.'.'.$row['EXT'];
									echo"
                                        <div class=\"carousel-item \">
                                            <img class='card-img-top  img-fluid  border-0' style='border-radius: 7px' src=$image width='150' height='150' alt='$counter.image'>
                                        </div>
                                    ";
									$counter = $counter+1;
								}
								echo"
                    
                                    </div>
                                        <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
                                            <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                                            <span class=\"sr-only\">Previous</span>
                                        </a>
                                        <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
                                            <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                                            <span class=\"sr-only\">Next</span>
                                        </a>
                                    
                                    </div>
                                </div>
                                
                            <script>
                                $('.carousel').carousel({
                                  interval: 250
                                })
                            </script>
                        ";
							}
						}
						
					}
				
				
				?>
            </div>
            <div class="col-md-6 ">
                <!-- Your second column here -->
				<?php
					echo "
                        <p class='card-text'>
                            <strong>Make:</strong>   $make<br>
                            <strong>Year:</strong>  $year<br>
                            <strong>Transmission:</strong>   $tx<br>
                            <strong>Engine Capacity:</strong>   $cc cc<br>
                            <strong>Mileage:</strong>   $milage miles<br>
                            <strong>Price: </strong>$$PRICE<br>
                        </p>
                        <div class=\"bd-format\" >
                            <button type=\"button\" class=\"btn btn-secondary\">Favourites</button>
                            <button type=\"button\" class=\"btn btn-secondary\">Request Invoice</button>
                        </div>
                    "
				?>
            </div>
        </div>
        </div>
    </div>




<hr>
<br>
	<?php
		$con = new mysqli('34.74.199.136', 'root', 'Himalayas96','test');
		$sql = $con->query("SELECT VEHICLE_ID,MAKE,MODEL,YEAR,MILAGE,TRANSMISSION,PRICE,IMAGES_NUM,EXT,DESCRIPTION FROM test.vehicles WHERE 1");
		if ($sql->num_rows > 0)
		{
			$count = $sql->num_rows;
			$grid_start = "
                <div class='container-fluid'>
                    <div class='row'>
            
            ";
			$column0 = "<div class='column'>
            
            ";
			$column1 = "
            </div>
                <div class='column'>
	        
	        ";
			$column2 = "
	        </div>
                <div class='column'>
	        ";
			$column3 = "
	        </div>
                <div class='column'>
	        ";
			$column4 = "
	        </div>
                <div class='column'>
	        ";
			$column5 = "
	        </div>
                <div class='column'>
	        ";
			$grid_end = "
            </div>
            </div>
            </div>
            ";
			$n = $count/6;
			while ($count>0)
			{
				$row = $sql -> fetch_assoc();
				$VEHICLE_ID = $row['VEHICLE_ID'];
				$image = '/uploads/'.$row['VEHICLE_ID'].'_'.'0'.'.'.$row['EXT'];
				$make = $row['MAKE'];
				$year = $row['YEAR'];
				$milage = $row['MILAGE'];
				$text = $row['PRICE'];
				$var = array_rand(array_flip(array(1, 2, 3, 4, 5, 6, 7)), 1);
				$dmy = array_rand(array_flip(array('d', 'm', 'w')), 1);
				$card = "
                    <div class='card border-secondary ' style='border-radius: 0px' >
                                    <a href= '/details.php?link=$image'>
                                        <img class='card-img-top img-fluid  ' style='object-fit: cover;border-radius: 7px' src=$image alt='Card image'>
                                    </a>
                                        <div class='card-block'>
                                            <h6 class='card-title' style='text-align:center'>
                                                <B>$make,</B> $year
                                                <small class='text-muted'>
                                                   $var$dmy
                                                 </small>
                                            </h6>
                                            <p class='card-text' style='text-align:center'>
                                                <small class='text-muted'>
                                                   <B>$$text</B>
                                                 </small>
                                                
                                             </p>
                                        </div>
                                    </div>
                                    <br>
                ";
				
				if($count <$n)
				{
					$column0 = $column0.$card;
				}
                elseif($count < 2*$n)
				{
					$column1 = $column1.$card;
				}
                elseif($count <3*$n)
				{
					$column2 = $column2.$card;
				}
                elseif($count < 4*$n)
				{
					$column3 = $column3.$card;
				}
                elseif($count < 5*$n)
				{
					$column4 = $column4.$card;
				}
                elseif($count < 6*$n)
				{
					$column5 = $column5.$card;
				}
				$count = $count-1;
			}
			$grid = $grid_start.$column0.$column1.$column2.$column3.$column4.$column5.$grid_end;
			
		}
		echo "$grid";
	?><php></php>
 
	
	<?php
		require "footer.php"
	?><php>

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/search.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap-4.4.1.js"></script>
</body>

</html>