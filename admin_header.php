<div class="container">

    <!-- Navbar with search bar and nav right-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="/index.php">
            <img class="navbar-brand" src="images/navlogo.JPG" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
				
				<?php
					if (isset($_SESSION['user'])) {
						$name = $_SESSION['name'];
						$email = $_SESSION['email'];
						$admin = $_SESSION['admin'];
						
						echo "
                            <li class='nav-item active'>
                                <a class='nav-link  ' href='https://www.africanmachines.com'>
                                    Home
                                    <span class='sr-only'>
                                        (current)
                                    </span>
                                </a>
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
                                    <a class='dropdown-item' href='/admin_logout.php'>logout</a>
                                </div>
                            </li>
	                    
	             
                        ";
						
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

