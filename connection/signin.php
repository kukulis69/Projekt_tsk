<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$checkUser = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
if (mysqli_num_rows($checkUser) > 0) {
    $user = mysqli_fetch_assoc($checkUser);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login']
    ];
        header('Location:../workspace.php');
    } else {
        header('Location: ../index.php');
    }
?>