<?php
    session_start();
    include "assets/php/database.php";
    if(isset($_POST["submit"])){
        $username = $_POST["changeusername"];
        $old = $_POST["oldpassword"];
        $new = md5($_POST["newpassword"]);

        $check_old = mysqli_query($connect,"SELECT admin_password FROM admin");
        if($check_old = md5($old)){
            $update_u_p = mysqli_query($connect,"UPDATE admin SET admin_username='$username',admin_password='$new'");
            if($update_u_p){
                session_destroy();
                header("location:security.php");
            }
        }else{
            echo "WRONG OLD PASSWORD";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
</head>
<body>
<form  method="post">
    <div class="changepassword">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="changeusername"></td>
            </tr>
            <tr>
                <td>Old Password</td>
                <td><input type="text" name="oldpassword"></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="newpassword"></td>
            </tr>
            <tr>
                <td><button name="submit">Change</button></td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>