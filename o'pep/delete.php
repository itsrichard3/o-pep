<?php
include 'conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM plante WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {

        header("location:supprimer.php");
    }
}
