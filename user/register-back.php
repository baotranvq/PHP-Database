<?php
    session_start();
    require_once('../model/connect.php');
    if (isset($_POST['submit'])){
        if (isset($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        if (isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if (isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if (isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if (isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }

        $sql = " INSERT INTO users (fullname, username, password,email,phone,address) VALUES  ('$fullname','$username','$password','$email','$phone','$address')";
        $res = mysqli_query($conn,$sql);
        if ($res){
            header("location:../Template/?rs=success");
            exit();
        }else{
            header("location:../Template/?rf=fail");
            exit();
        }

    }




?>