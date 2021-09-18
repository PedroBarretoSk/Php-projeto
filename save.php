<?php
    session_start();

    $mysqli = new mysqli('localhost','root','','dswcrud_bd') or die(mysqli_error($mysqli));

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $mysqli->query("INSERT INTO data(name, location) VALUES('$name','$location')") or die($mysqli->error);

        $_SESSION['message'] = "Os dados foram salvos no sistema!";
        $_SESSION['msg_type'] = "success";

        header("Location: index.php");
        die();
    }