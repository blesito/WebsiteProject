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
                <a href="cases.php">Cases</a>
                <a href="#">Files</a>
                <a href="login.php">Logout</a>
            </div>
      

    </body>
</html>


<?php

$host = "localhost";
$user = "root";
$password ="root";
$database = "law";

$CASE_NUMBER = "";
$TITLE = "";
$BRANCH = "";
$INCIDENT = "";
$DATE = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['CASE_NUMBER'];
    $posts[1] = $_POST['TITLE'];
    $posts[2] = $_POST['BRANCH'];
    $posts[3] = $_POST['INCIDENT'];
    $posts[4] = $_POST['DATE'];

    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM cases WHERE CASE_NUMBER = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $CASE_NUMBER = $row['CASE_NUMBER'];
                $TITLE = $row['TITLE'];
                $BRANCH = $row['BRANCH'];
                $INCIDENT = $row['INCIDENT'];
                $DATE = $row['DATE'];

            }
        }else{
            echo 'No Data For This Case Number';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `cases`(`CASE_NUMBER`, `TITLE`, `BRANCH`, 'INCIDENT', 'DATE') VALUES ('$data[0]','$data[1]',$data[2],$data[3],$data[4])";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `cases` WHERE `CASE_NUMBER` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `cases` SET `TITLE`='$data[1]',`BRANCH`='$data[2]',`INCIDENT`=$data[3],`DATE`=$data[4] WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>

    
    <body>
    <center>
        <form action="cases.php" method="post">
            <input type="text" name="CASE_NUMBER" placeholder="CASE NUMBER" value="<?php echo $CASE_NUMBER;?>"><br><br>
            <input type="text" name="TITLE" placeholder="TITLE" value="<?php echo $TITLE;?>"><br><br>
            <input type="text" name="BRANCH" placeholder="BRANCH" value="<?php echo $BRANCH;?>"><br><br>
            <input type="text" name="INCIDENT" placeholder="INCIDENT" value="<?php echo $INCIDENT;?>"><br><br>
            <input type="text" name="DATE" placeholder="DATE" value="<?php echo $DATE;?>"><br><br>

            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </center>
    </body>
</html>
