<?php
include 'conn.php';
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "select id from utilisateur where email = '$email' ";
    $queryEmail = mysqli_query($conn, $sql);
    $resut = $queryEmail->fetch_assoc();

    if ($queryEmail) {
        $id_utilisateur = $resut['id'];

        $req = "SELECT * FROM pannier where id_utilisateur= '$id_utilisateur'";
        $queryuser = mysqli_query($conn, $req);
    }
}

if (isset($_POST['checkout'])) {
    $checkout = $conn->prepare("SELECT * FROM pannier WHERE id_utilisateur = ? ");
    $checkout->bind_param("i", $id_utilisateur);
    $checkout->execute();
    $result = $checkout->get_result();

    //command 
    $command = $conn->prepare("INSERT INTO commonde (IDuser,IDplant) VALUES (?,?)");
    $command->bind_param("ii", $id_utilisateur, $IDPLANTRESULT);

    while ($row = $result->fetch_assoc()) {
        $IDPLANTRESULT = $row['id_plante'];

        $command->execute();
    }

    //delete 
    $delete = $conn->prepare("DELETE FROM pannier WHERE id_utilisateur = '$id_utilisateur'");
    $delete->execute();
    header("location: commande.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pannier</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>




<body class="font-sans bg-green-100">
    <table class=" border border-black table-auto w-11/12">
        <tr class="border border-black">
            <th class="border border-black">nom</th>
            <th class="border border-black">image</th>
            <th class="border border-black">prix</th>
            <th class="border border-black">categorie</th>
            <?php
            include 'conn.php';
            while ($rest =    $resutPanier = $queryuser->fetch_assoc()) {

                $id_Plant = $rest['id_plante'];

                $requete = "SELECT * FROM plante where id = '$id_Plant'";
                $query = mysqli_query($conn, $requete);
                while ($row = mysqli_fetch_assoc($query)) {

                    echo "<tr>";
                    echo '<td class="w-44 border border-black mx-auto">' . $row['nom'] . '</td>';
                    echo '<td><img class="w-44 border border-black mx-auto" src="./imgs/' . $row['image'] . '"></td>';
                    echo '<td class="w-44 border border-black mx-auto">' . $row['prix'] . '</td>';
                    echo '<td class="w-44 border border-black mx-auto">' . $row['categorie_id'] . '</td>';
                    echo '<td><a href="deletePanier.php?idPanier=' . $rest['id'] . '">supprimer</a></td>';
                }
            }

            ?>
            <form action="" method="POST">
                <button type="submit" name="checkout" class="mb-5 px-2 py-3 bg-green-400 rounded-2xl w-32 text-stone-950"> checkout</button>
            </form>

</body>

</html>