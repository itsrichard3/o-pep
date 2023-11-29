<?php
include "./conn.php";

if (isset($_GET["idPanier"])) {
    $idPanier = $_GET["idPanier"];
    $requete = "DELETE from pannier where id = '$idPanier' ";
    $query = mysqli_query($conn, $requete);
    if ($query) {
        header("Location: panier.php");
    }
}
