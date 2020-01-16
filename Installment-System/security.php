<?php
    session_start();
    include "assets/php/database.php";
    if(isset($_POST["submit"])){
        //user info like username password
        $username = $_POST["admin_username"];
        $password = $_POST["admin_password"];

        $check_if_correct = mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'"); //query for checking username and password
        if(mysqli_num_rows($check_if_correct)>0){
            $_SESSION["userpassed"] = "securitypassed";
            header("location:main.php");
        }else {
            echo "<center>Wrong Username Or Password.</center>";
        }
    }
    
    if(isset($_GET["logout"])){
        session_destroy();
        header("location:security.php");
    }

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="assets/css/loginform.css">
    </head>
    <body>
        <div class="center">
            <div class="login-form">
                <form method="post">
                LOGIN
                    <table>
                        <tr>
                            <td><input type="text" name="admin_username" Placeholder="Enter Your Username..." class="username"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="admin_password" placeholder="Enter Your Password..." class="password"></td>
                        </tr>
                        <tr>
                            <td><center><button name="submit">login</button></center></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>