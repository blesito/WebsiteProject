<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
    <body>
        <div id="login"> 
            <h1>Sign In</h1>
            <form class="login" action="admin.php" method="post">
                <input type="text" placeholder="Username" name="user" required/>
                <input type="password" placeholder="Password" name="pass" required/>
                <input type="submit" name="submit" value="Login" />


                <?php
                
                $username = $_POST['user'];
                $password = $_POST['pass'];

                $username = stripcslashes($username);
                $password = stripcslashes($password);
                $username = mysql_real_escape_string($username);
                $password = mysql_real_escape_string($password);

                mysql_connect("localhost","root","");
                mysql_select_db('law');

                $rslt = mysql_query("select * from login where username ='$username' and password = '$password'")
                            or die("failed to query database".mysql_error());
                $row =  mysql_fetch_array($rslt);
                if($row['username']== $username && $row['password']== $password){
                    echo 'Login successful! welcome'.$row['username'];
                } else {
                    echo'incorrect username or password!';

                }




                
                
                ?>
            </form>

        </div>
    </body>
</html>