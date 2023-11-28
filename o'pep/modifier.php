<?php
require 'conn.php';
if (isset($_GET['id']));
$id = $_GET['id'];
$sql = "SELECT * FROM catégorie WHERE id='$id' ";
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($q);
$nom = $row['nom'];



if (isset($_POST['modify'])) {
    $input = $_POST['modify'];
    echo $input;
    $modify = mysqli_query($conn, "UPDATE catégorie SET nom = '$input' where nom= '$nom'");
    header("location: dashboard_mo.php");
    exit();
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashborde</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-green-100">

    <div class="flex h-screen bg-green-200">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-800 text-white p-4">
            <div class="mb-6">
                <img src="./imgs/pr.png" class="h-32">
            </div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="dashborde.php" class="block text-white-400 hover:text-white">Ajouter</a>
                    </li>
                    <li class="mb-2">
                        <a href="dashboard_mo.php" class="block text-white-400 hover:text-white">Modifier</a>
                    </li>
                    <li class="mb-2">
                        <a href="supprimer.php" class="block text-white-400 hover:text-white">Supprimer</a>
                    </li>
                </ul>
            </nav>
        </aside>


        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-green-700 p-4">
                <h1 class="text-white text-2xl font-semibold">Main Content</h1>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-emerald-400 p-4 ">
                <form method="POST" class="flex flex-col gap-8 ">
                    <h1>modifier une categorie</h1>
                    <input type="text" value="<?php echo $nom ?>" name="modify" placeholder="nouvelle categorie" class=" w-60 border-black rounded-lg "></input>
                    <button type="submit"class=" text-white mb-5 bg-green-400 rounded-2xl w-60 text-stone-950"> modifier une categorie</button>

                </form>

            </main>
        </div>
    </div>

</body>

</html>