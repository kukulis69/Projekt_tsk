<?php
session_start();
require_once 'connect.php';

$id = $_GET['id'];
$description = $_POST['description'];
$name = $_POST['name'];
$priority = $_POST['priority'];

$sql = "INSERT INTO tasks (projectID, ID, name, description, priority, status, startDate, modifiedDate) VALUES ($id, NULL, '$name', '$description', '$priority', 'todo', now(), now())";
mysqli_query($connect, $sql);
header('Location: ../tasks.php');
