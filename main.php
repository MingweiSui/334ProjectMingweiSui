<!DOCTYPE html>

<html>
    <head> 
        <title>House Rentals</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1， maximum-scale = 1, user-sclable = 0">
        <link rel="stylesheet" type="text/css" href="../css/maincss.css">
        <link rel="stylesheet" href="../css/responsive.css" media="screen and (max-width: 960px)">
        <script src = "../js/gototop.js"></script>
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
            <nav>
            <ul  class="menu">
		        <li class = "left"><a href="main.php">Home</a></li>
		        <li class = "left"><a href="aboutus.php">About Us</a></li>
	        	<li class = "left"><a href="feedback.php">FeedBack</a></li>
		        <li class = "left"><a href="joinus.php">Join Us</a></li>
		        <li class = "left"><a href="stats.php">Statistic</a></li>
		        <li class = "right"><a href="admin_login.php">Admin</a></li>
		        <li class = "right"><a href="client_logged_in.php">Upload your place</a></li>
	    	</ul>
	    	</nav>
        </div>  
        
        <div class="wrapper">
            <form style = "padding: 1%" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Filter: 
            <div class="block">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br>
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
            <input style = "width: 10%" type="Submit" name="Submit" value="Set">
            </div>
            </form>
            
            <form style = "padding: 1%" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                Enter username and password to delete a post.
            <div class="block">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br>
            </div>
            <div class="block">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password"><br>
            </div>
            <input style = "float: right; width: 30%;" type="Submit" name="delete" value="Delete">
            
            <?php

                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                if(!$conn){echo"Error connection to database";}
                
                if (!empty($_POST['delete'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "SELECT username, password FROM client";
                    $result = $conn->query($sql);
                    $temp = false;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if($username == $row["username"]){
                                if($password == $row["password"]){
                                    $temp = true;
                                }
                            }
                        }
                
                    }
                    if(!$temp){
                            echo "Wrong Password!";
                            echo $username;
                    }else{
                        $sql = "DELETE FROM client_data WHERE username='$username'";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record deleted".$selected." successfully";
                        } else {
                            echo "Error deleting record:".$selected." ".$conn->error;
                        }
                         $sql = "DELETE FROM client WHERE username='$username'";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record deleted".$selected." successfully";
                        } else {
                            echo "Error deleting record:".$selected." ".$conn->error;
                        }
                        header( "Refresh:1; url='main.php'");
                    }
                }





                $sql = "SELECT username, phone, address, city, allowpets,roomtype,info FROM client_data";
                $result = $conn->query($sql);
                if(isset($_POST['Submit'])){
                    $username = $_POST['username'];
                    $city     = $_POST['city'];
                    $allowpets     = $_POST['allowpets'];
                    $roomtype     = $_POST['roomtype'];
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($username == "" || $username == $row["username"]){
                                if($city == "" || $city == $row["city"]){
                                    if($allowpets == "" || $allowpets == $row["allowpets"]){
                                        if($roomtype == "" || $roomtype == $row["roomtype"]){
                                    
                                    echo "
                        <table style='width:100%'>
                        <tr>
                            <th style='width:40%'>Username: ".$row["username"]."</th>
                            <td rowspan = '7'>Information: <br>".$row["info"]."</td>
                        </tr>
                        <tr>
                            <th>Phone Number: ".$row["phone"]."</th>
                        </tr>
                        <tr>
                            <th>Address:".$row["address"]."</th>
                        </tr>
                        <tr>
                            <th>City:".$row["city"]."</th>
                        </tr>
                        <tr>
                            <th>If allowed pets:".$row["allowpets"]."</th>
                        </tr>
                        <tr>
                            <th>Room Type:".$row["roomtype"]."</th>
                        </tr>
                        <tr>
                        </tr>
                        </table>
                        <hr>
                        ";
                        
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                }else{
                    if ($result->num_rows > 0) {
                     // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "
                        <table style='width:100%'>
                        <tr>
                            <th style='width:40%'>Username: ".$row["username"]."</th>
                            <td rowspan = '7'>Information: <br>".$row["info"]."</td>
                        </tr>
                        <tr>
                            <th>Phone Number: ".$row["phone"]."</th>
                        </tr>
                        <tr>
                            <th>Address:".$row["address"]."</th>
                        </tr>
                        <tr>
                            <th>City:".$row["city"]."</th>
                        </tr>
                        <tr>
                            <th>If allowed pets:".$row["allowpets"]."</th>
                        </tr>
                        <tr>
                            <th>Room Type:".$row["roomtype"]."</th>
                        </tr>
                        <tr>
                        <th></th>
                        </tr>
                        </table>
                        <hr>";
                }
            } else {
                echo "0 results";
            }
        }
        
        
        

// This PHP script will only run if not post form submit
   ?>
            </form>
             
            
           
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