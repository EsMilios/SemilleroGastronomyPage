<?php
include("../php/connect.php");

    $name = $_POST['nameU'];
    $lastName = $_POST['lastU'];
    $email = $_POST['emailU'];
    $password = $_POST['passwordU'];

    $sql = "INSERT INTO users (nameU, lastName, email, passwordU ) VALUES ('$name', '$lastName', '$email', '$password')";

    $ejecutar = mysqli_query($varConexion, $sql);

    if($ejecutar){
        header ('location: ../html/index.html');
    }
?>