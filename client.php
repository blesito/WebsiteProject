<!DOCTYPE HTML> 
<html>
<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Prototype</title>
</head>
<head>
<div class="topnav">
            <a href="index.php">Home</a>
        </div>
</head>
    <body>
        <div>
            <form class="searchBar" action="client.php" method="post">
                <input type="search" placeholder="Search Case Number" name="searchCase" />
                <input type="submit" value="Search" name="search" />
            </form>   

            <?php 

            $connection = mysql_connect('localhost','root',' ');
            $db = mysqli_select_db($connection,'law');

            if (isset($_POST['search'])) {  
                
                $CASE_NUMBER = $_POST['CASE_NUMBER'];

                $query = "SELECT * FROM cases where CASE_NUMBER='$CASE_NUMBER' ";
                $query_run = mysqli_query($connection, $query);

                while($row = mysql_fetch_array($query_run))  
                {
                   ?>
                        <form action="" method="POST">

                        <input type="text" name="CASE_NUMBER" value="<?php echo $row['CASE_NUMBER']?>"/>
                        <input type="text" name="TITLE" value="<?php echo $row['TITLE']?>"/>
                        <input type="text" name="BRANCH" value="<?php echo $row['BRANCH']?>"/>
                        <input type="text" name="INCIDENT" value="<?php echo $row['INCIDENT']?>"/>
                        <input type="text" name="DATE" value="<?php echo $row['DATE']?>"/>

                        
                        
                        
                        </form>
                   <?php
                }
            }
            ?> 

        </div>

    </body>
</html>