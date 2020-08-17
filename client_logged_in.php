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
                
                if (isset($_POST['Submit'])){
                    if (!empty($_POST['username'])&&
                        !empty($_POST['password'])    &&
                        !empty($_POST['phone'])    &&
                        !empty($_POST['address']) &&
                        !empty($_POST['city'])     &&
                        !empty($_POST['allowpets'])     &&
                        !empty($_POST['roomtype'])     &&
                        !empty($_POST['info'])){
          
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $phone    = $_POST['phone'];
                        $address = $_POST['address'];
                        $city     = $_POST['city'];
                        $allowpets     = $_POST['allowpets'];
                        $roomtype     = $_POST['roomtype'];
                        $info     = $_POST['info'];
                
                        $query    = "INSERT INTO client_data VALUES" . 
                        "('$username', '$phone', '$address', '$city', '$allowpets', '$roomtype', '$info')";
                        $result   = $conn->query($query);    
                        
                        $query1    = "INSERT INTO client VALUES" . "('$username', '$password')";
                        $result1   = $conn->query($query1);  
                        
                        if (!$result || !$result1) echo "INSERT failed or Username exists!";
                        else echo"Inserted successfully";
                        //refresh page
                        header( "Refresh:2; url='client_logged_in.php'");
                    }else{
                        echo "<p><center>Invalid data</center></p>";
                        header( "Refresh:2; url='client_logged_in.php'");
                    }
                }
                
                if (isset($_POST['update'])){
                    if (!empty($_POST['username'])&&
                        !empty($_POST['password'])    &&
                        !empty($_POST['phone'])    &&
                        !empty($_POST['address']) &&
                        !empty($_POST['city'])     &&
                        !empty($_POST['allowpets'])     &&
                        !empty($_POST['roomtype'])     &&
                        !empty($_POST['info'])){
          
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $phone    = $_POST['phone'];
                        $address = $_POST['address'];
                        $city     = $_POST['city'];
                        $allowpets     = $_POST['allowpets'];
                        $roomtype     = $_POST['roomtype'];
                        $info     = $_POST['info'];
                
                        $query    = "UPDATE client_data SET phone='$phone', 
                        address='$address',city='$city',allowpets='$allowpets',
                        roomtype='$roomtype',info='$info' WHERE username='$username'";
                        $result   = $conn->query($query);    
                        
                        $query1    = "UPDATE client SET password = '$password' WHERE username='$username'";
                        $result1   = $conn->query($query1);  
                        
                        if (!$result || !$result1) echo "Update failed or Username exists!";
                        else echo"Update successfully";
                        //refresh page
                        header( "Refresh:2; url='client_logged_in.php'");
                    }else{
                        echo "<p><center>Data not fully entered!</center></p>";
                        header( "Refresh:2; url='client_logged_in.php'");
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
            
            <p align = "middle">
                <br><br><br>
                <fieldset>
                    <legend> Create your new post </legend>
                    
                    
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                Username is unique!
                <div class="block">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>
                </div>
                <div class="block">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password"><br>
                </div>
                <div class="block">
                <label for="phone">Phone No.:</label>
                <input type="text" id="phone" name="phone"><br>
                </div>
                <div class="block">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address"><br>
                </div>
                <div class="block">
                <label for="city">City:</label>
                <input type="text" id="city" name="city"><br>
                </div>
                <div class="block">
                <label for="allowpets">Allow Pets:</label>
                <select name="allowpets">
                    <option></option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select><br>
                </div>
                <div class="block">
                <label for="roomtype">Room Type:</label>
                <select name="roomtype">
                    <option></option>
                    <option value="Bachelor">Bachelor</option>
                    <option value="One Room Apt">One Room Apt</option>
                    <option value="Two Rooms Apt">Two Rooms Apt</option>
                    <option value="Three Rooms Apt">Three Rooms Apt</option>
                    <option value="One Room in a House">One Room in a House</option>
                    <option value="One Entire House">One Entire House</option>
                </select><br>
                </div>
                <div class="block">
                <label for="info">Information:</label>
                <textarea type="text" id="info" name="info" rows="10" cols="30"></textarea><br>
                </div>
                <input type="Submit" name="Submit" value="Create New Post">
                <input type="Submit" name="update" value="Update a Post">
                <br><br><br>
                <fieldset>
            </form>
            </p>
           
           
            
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