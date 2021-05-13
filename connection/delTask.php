<?php

include "connect.php";

$id = $_GET['id'];

$del = mysqli_query($connect, "DELETE FROM tasks where ID = '$id'");

if ($del) {
    mysqli_close($connect);
    header('Location: ../tasks.php');
    exit;
} else {
    echo "Error deleting record " . mysqli_error($connect);
}
