<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(!$conn){
    echo"Error connection to database";
}

$result1 = $conn->query("SELECT roomtype ,count(*) as cnt FROM client_data GROUP BY roomtype");
$result2 = $conn->query("SELECT allowpets,count(*) as cnt FROM client_data GROUP BY allowpets");
$result3 = $conn->query("SELECT city,count(*) as cnt FROM client_data GROUP BY city");
$result4 = $conn->query("SELECT roomtype ,count(*) as cnt FROM client_data WHERE city = 'Windsor' GROUP BY roomtype");
$result5 = $conn->query("SELECT roomtype ,count(*) as cnt FROM client_data WHERE city = 'Toronto' GROUP BY roomtype");
$result6 = $conn->query("SELECT roomtype ,count(*) as cnt FROM client_data WHERE city = 'Hamilton' GROUP BY roomtype");
 ?>
 <!DOCTYPE html>

<html>
    <head> 
        <title>House Rentals</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/maincss.css">
        <link rel="stylesheet" href="../css/responsive.css" media="screen and (max-width: 960px)">
        <script src = "../js/gototop.js"></script>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result1->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage of the rooms based on the roomtypes.'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                chart.draw(data, options);
            }</script>
            
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result2->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage that if landlord allows pets.'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                chart.draw(data, options);
            }</script>
            
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result3->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage that areas'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
                chart.draw(data, options);
            }</script>
            
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result4->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage of the rooms type in Windsor.'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                chart.draw(data, options);
            }</script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result5->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage of the rooms type in Toronto.'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
                chart.draw(data, options);
            }</script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    while($row = $result6->fetch_row()){
                        echo "['".$row[0]."', ".$row[1]."],";
                    }
                    ?>
                ]);
                var options = {title: 'Percentage of the rooms type in Hamilton.'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
                chart.draw(data, options);
            }</script>
        
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
            
            
            
            <div id="piechart1" style="width: 100%; height: 100%;"></div>
            <div id="piechart2" style="width: 100%; height: 100%;"></div>
            <div id="piechart3" style="width: 100%; height: 100%;"></div>
            <div id="piechart4" style="width: 100%; height: 100%;"></div>
            <div id="piechart5" style="width: 100%; height: 100%;"></div>
            <div id="piechart6" style="width: 100%; height: 100%;"></div>
        
     
     
     
     
     
     
     
     
           <button class="myBtn" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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