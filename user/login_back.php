<?php
    session_start();
    require_once('../model/connect.php');

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = ('$password')";
        $res = mysqli_query($conn,$sql);

        $row = mysqli_num_rows($res);
        if($row > 0)
        {
            $_SESSION['usernameAdmin'] = $username; //khoi tao session co admin
            while($row = mysqli_fetch_assoc($res)) {
                $_SESSION['id-Admin'] = $row['id'];
            }

            header('location:../Template/?');
        }
        else 
        {
            $_SESSION['error'] = 'ten dang nhap hoac mat khau khong hop le';

            header('location:../Template/?error=wrong');
            die("");
            exit();
        }
    }