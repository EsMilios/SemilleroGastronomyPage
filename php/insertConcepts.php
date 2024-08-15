<?php
include("connect.php");

$words = $_POST['wordConcepts'];
$des = $_POST['descriptionConcepts'];

$revisar = getimagesize($_FILES["imageConcepts"]["tmp_name"]);

if ($revisar !== false) {
    $image = $_FILES['imageConcepts']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));

    if ($revisar !== false) {
        $image = $_FILES['imageConcepts']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

        $sql = "INSERT INTO concepts (imgConcepts, titleConcepts, descriptionConcepts) VALUES ('" . $imgContenido . "','" . $words . "','" . $des . "')";
        $result = $varConexion->query($sql);

        if ($result) {
            header('location: concepts.php');
        } else {
            echo "¡Ups! Ocurrió un error al subir el archivo de audio.";
        }
    }
}
?>
