<?php
    $mysqli = new mysqli('localhost','root','','dswcrud_bd') or die(mysqli_error($mysqli));

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $location = $_POST['location'];

        $mysqli->query("UPDATE data SET name = '$name', location = '$location' where id=$id") or die($mysqli->error);
        $_SESSION['message'] = "Os dados foram atualizados no sistema!";
        $_SESSION['msg_type'] = "success";

        header("Location: index.php");
        die();
    }