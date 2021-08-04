
<div class="container">
    
    <!-- Navbar with search bar and nav right-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="/index.php">
            <span><img data-holder-rendered="true" src="/images/logo.JPG" width="150" height="47" alt="logo"></span>
        </a>
        <a> </a>
<!--        <a><b>..Africanmachines</b></a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link  " href="https://www.africanmachines.com">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item active">
                    <a class="nav-link  " href="/about.php">About <span class="sr-only">(current)</span></a>
                </li>
                
                
                
                <?php
	                $admin = false;
                ?>
	            <?php if(isset($_SESSION['user']))
	            {
	                $name = $_SESSION['name'];
		             $email = $_SESSION['email'];
		             $admin = $_SESSION['admin'];
		
		            if($admin)
		            {
			            echo "
                            <li class='nav-item dropdown active'>
                                <a class='nav-link dropdown-toggle  px-4' href='#' id='navbarDropdown' role='button'
                                   data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Operations
                                </a>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='/add_vehicle.php'>Add vehicle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='#'>edit vehicle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='#'>remove vehicle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='#'>Dashboard</a>
                                </div>
                            </li>
                            
                            <li class='nav-item dropdown active'>
                        <a class='nav-link dropdown-toggle  px-4' href='#' id='navbarDropdown' role='button'
                           data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <strong>$email</strong>
                        </a>
	                 
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='#'>account</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='#'>profile</a>
                            <div class='dropdown-divider'></div>
			            ";
			
		            }else{
			            echo "
                            <li class='nav-item dropdown active'>
                                <a class='nav-link dropdown-toggle  px-4' href='#' id='navbarDropdown' role='button'
                                   data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Services
                                </a>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='#'>Sell</a>
                                    <a class='dropdown-item' href='#'>Buy</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='/news.html'>news</a>
                                </div>
                            </li>
                          
                           
                            
                            <li class='nav-item dropdown active'>
                        <a class='nav-link dropdown-toggle  px-4' href='#' id='navbarDropdown' role='button'
                           data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            $email
                        </a>
	                 
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='#'>account</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='#'>profile</a>
                            <div class='dropdown-divider'></div>
			            
			            ";
		            }
		            
		            
		            if($admin)
		            {
			            echo "
                            <a class='dropdown-item' href='/admin_logout.php'>logout</a>
                            </div>
                        </li>
			            
			            ";
		                
                    }else{
			            
			            echo "
                            <a class='dropdown-item' href='/logout.php'>logout</a>
                            </div>
                        </li>
			            
			            ";
                    }
		
	            }else
	            
	            {
	                if($admin)
                    {
	                    echo"
                        <li class=\"nav-item active\">
                            <a href=\"/admin.php\" class=\"nav-link px-4\">login</a>
                        </li>
                        ";
                    }
	                else{
		                
		                echo"
                        <li class=\"nav-item active\">
                            <a href=\"/login.php\" class=\"nav-link px-4\">login</a>
                        </li>
                        ";
	                    
                    }
	                
	            }
	            ?>
            </ul>
<!--            <form class="form-inline my-2 my-lg-0">-->
<!--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--            </form>-->
        </div>
    </nav>
    <!-- Navbar with search bar nav right -->

</div>
<hr><br>
