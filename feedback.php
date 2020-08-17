<!DOCTYPE html>

<html>
    <head> 
        <title>House Rentals</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/maincss.css">
        <link rel="stylesheet" href="../css/responsive.css" media="screen and (max-width: 960px)">
        <script type="text/javascript" src = "../js/gototop.js"></script>
        <script type="text/javascript" src="../js/checkboxes.js"></script>
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
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            if(!$conn){echo"Error connection to database";}
           
                echo $username;
                
                if (isset($_POST['Submit'])){
                    if (!empty($_POST['username'])&&
                        !empty($_POST['email'])    &&
                        !empty($_POST['phone']) &&
                        !empty($_POST['feedback'])){
          
                        $username = $_POST['username'];
                        $email    = $_POST['email'];
                        $phone = $_POST['phone'];
                        $feedback     = $_POST['feedback'];
                
                        $query    = "INSERT INTO feedback VALUES" . 
                        "('$username', '$email', '$phone', '$feedback')";
                        $result   = $conn->query($query);       

                        if (!$result) echo "INSERT failed: $query<br>" .
                        $conn->error . "<br><br>";
                        else echo"<p><center>Inserted successfully</center></p>";
                        //refresh page
                        header( "Refresh:2; url='feedback.php'");
                    }else{
                        echo "<p><center>Invalid data</center></p>";
                        header( "Refresh:2; url='feedback.php'");
                    }
                }
                
            // This PHP script will only run on post from submit
                if (!empty($_POST['delete'])):
                    if(!empty($_POST['posts'])){
            // loop to retrieve checked values
                        foreach($_POST['posts'] as $selected){
                            $sql = "DELETE FROM client_data WHERE username = '$selected'";
                            if ($conn->query($sql) === TRUE) {
                                echo "Record deleted".$selected." successfully";
                            } else {
                                echo "Error deleting record:".$selected." ".$conn->error;
                            }
                            echo "</br>";
                        }
                    }
                    else{
                        echo "<p><center>No records selected</center></p>";
                }
                //refresh page
                header( "Refresh:2; url='client_logged_in.php'");
                $_SESSION["username"] = $username;
    
            // This PHP script will only run if not post form submit
            else: ?>
            
            
                <br><br><br>
                <fieldset>
                    <legend> Welcome  </legend>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>
                
                <label for="email">Address:</label>
                <input type="text" id="email" name="email"><br>
                
                <label for="phone">Phone No.:</label>
                <input type="text" id="phone" name="phone"><br>
                
                <label for="feedback">Information:</label>
                <textarea type="text" id="feedback" name="feedback" rows="10" cols="30"></textarea><br>
                
                <input type="Submit" name="Submit" value="Submit Feedback" style="margin-left:0px;">
                <br><br><br>
                <fieldset>
            </form>
            
           
           
            
        </form>
    <?php endif; ?>
    
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