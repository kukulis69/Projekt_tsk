<?php
session_start();
if (@$_SESSION['user']) {
    header('Location: workspace.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
</head>

<body>
    <form action="connection/signup.php" method="POST" enctype="multipart/form-data">
        <label>REGISTRATION</label><br>
        <input type="email" name="login" placeholder="Enter Your email">
        <br>
        <input type="password" name="password" placeholder="Create the password">
        <br>
        <input type="password" name="password_confirm" placeholder="Repeat the password"><br>
        <button type="submit">Join up!</button>
        <h3>Registered user?</h3>
        <a href="index.php">Back to Login</a>
        <?php
        if (empty($_POST['login']))
            exit(''); //error login missing
        if (empty($_POST['pass']))
            exit(''); //error pass missing
        if ($_POST['pass'] != $_POST['pass_again'])
            exit(''); //error pass not match

        $link = mysqli_connect("localhost", "root", "imone") or die($link);

        require_once("connection/connect.php");
        $query = "SELECT COUNT(*) FROM userlist WHERE login = '$_POST[login]'";
        $usr = mysqli_query($link, $query);
        if (!$usr)
            exit("Error - " . mysqli_error($usr));
        $total = mysqli_fetch_assoc($usr, 0);
        if ($total > 0) {
            exit(""); //error user already exist
        }
        if (!empty($_POST['login'])) {
            if (!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
                exit(''); // error you need input email
            }
        }
        if (!empty($_POST['password'])) {
            if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['password'])) {
                exit(''); // pass dont have special symbol, number, small or big letter
            }
        }
        ?>
    </form>
</body>

</html>