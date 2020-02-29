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

            $connection = mysql_connect('localhost','root','root');
            $db = mysqli_select_db($connection,'law');

            if (isset($_POST['search'])) {

                $id = $_POST['CASE_NUMBER'];

                $query = "SELECT * FROM cases WHERE CASE_NUMBER = '$id' ";
                $query_run = mysqli_query($connection, $query);

                while($row = mysql_fetch_array($query_run));
                {
                    ?>
                        <form action="" method="POST">
                        
                    <?php
                }
            }
                ?>

        </div>

    </body>
</html>