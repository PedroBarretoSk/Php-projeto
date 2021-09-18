<?php
    $mysqli = new mysqli('localhost','root','','dswcrud_bd') or die(mysqli_error($mysqli));

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);
        $_SESSION['message'] = "Os dados foram excluídos do sistema!";
        $_SESSION['msg_type'] = "danger";

        header("Location: index.php");
        die();
    }