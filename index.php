<?php
session_start();
require_once 'connection/connect.php';
if (@$_SESSION['user']) {
    header('Location: workspace.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <center>
            <h1>MG Planner</h1>
            <h2>small steps to greatness</h2>
        </center>
    </header>
    <div class="login">
        <div class="loginfields">
            <center>
                <h1>Log in</h1>
            </center>
            <form action="connection/signin.php" method="POST">
                <div class="input-box">
                    <label for="login">Email:</label>
                    <input type="text" name="login">
                </div>
                <div class="input-box">
                    <label for="password">Password:</label>
                    <input type="password" name="password">
                </div>
                <center><button type="submit">Step in</button></center>
            </form>
            <p>Don't have an account?</p>
            <a href="register.php">Register</a>
              <footer>
                <h6><sup>©</sup> POWERED BY BAIBURETTA</h6>
            </footer>
            <script src="js/script.js"></script>
</body>

</html>
            <?php
            if (empty($_POST['login']))
                exit(''); //neivestas login
            if (empty($_POST['pass']))
                exit(''); // neivestas pass

            if (!empty($_POST['email'])) {
                if (!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
                    exit(''); //error msg loginas nera email
                }
            }
            ?>
