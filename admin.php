<!DOCTYPE HTML> 
<html>
<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Prototype</title>
</head>
    <body>
        <div>
            <form action="index.php" method="post">
            </form>
            <div class="sidenav">
                <a name="case"href="#">Cases</a>
                <a href="#">Files</a>
                <a href="#">Logout</a>
            </div>

        <div>

             <?php
            if (isset($_POST['case'])) {
                $servername = "localhost:8889";
                $username = "root";
                $password = "root";
                $dbname = "law";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT cases.CASE_NUMBER,cases.INCIDENT,cases.DATE FROM cases;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "Case Number: " . $row["CASE_NUMBER"]. "<br>Status: " . $row["INCIDENT"]. "<br>Hearing Date: " . $row["DATE"] . "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

            }
                
                ?>
           
        </div>

      

    </body>
</html>