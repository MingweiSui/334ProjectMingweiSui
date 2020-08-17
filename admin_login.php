<!DOCTYPE html>
<html>
    <head> 
        <title>House Rentals</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/maincss.css">
        <link rel="stylesheet" href="../css/responsive.css" media="screen and (max-width: 960px)">
        <script src = "../js/gototop.js"></script>
    </head>
    <body>
        <button class="myBtn" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <header>
            <div class="wrapper">
                <a href="main.php">
                    <img class = "HRB_Logo" border="0" src="../images/HRB_Logo.png" alt="House Rental Best Logo"/>
                </a>

                <h1>House Rental Best</h1>
                <h2>Here to find your home</h2>
            </div>
        </header>
        <div class="wrapper">
            <ul  class="menu">
		        <li class = "left"><a href="main.php">Home</a></li>
		        <li class = "left"><a href="aboutus.php">About Us</a></li>
	        	<li class = "left"><a href="feedback.php">FeedBack</a></li>
		        <li class = "left"><a href="joinus.php">Contact Us</a></li>
		        <li class = "left"><a href="stats.php">Statistic</a></li>
		        <li class = "right"><a href="admin_login.php">Admin</a></li>
		        <li class = "right"><a href="client_logged_in.php">Upload your place</a></li>
	    	</ul>
        </div>  
        
        
            
        <div class="wrapper">
            <?php
            if(!empty($_POST['submit'])){
                echo $username;
                if ('admin' == $_POST['username'] && 'admin' == $_POST['password']){
                    header("refresh:0;url=managersite.php");
                }else{
                    echo "Wrong ID or Password";
                    header("refresh:2;url=admin_login.php");
                }
            }
        ?>
            
            
            <fieldset>
                <legend> Manager Login </legend>
                <br><br><br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="block">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"><br>
                    </div>
                    <div class="block">
                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password"><br>
                    </div>
                    <input type="submit" name="submit" value="Submit">
                </form>
                <br><br><br>
            </fieldset>
            
            
            
            
            
            
            
            
        </div>
            

            
            
            
            
            
            
            
            
        <footer>
            <div class="wrapper">
                <h3 class = "footer">
                    <br><br>
                    Create By: Mingwei Sui<br>
                    University of Windsor<br><br>
                    For Learning To Create Website<br>
                    No Commercial Purpose<br>
                    <br><br>
                </h3>
            </div>
        </footer>
        
    </body>
</html>