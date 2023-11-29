<?php
include 'conn.php';


if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
    $image = $_GET['image'];
    $prix = $_GET['prix'];
    $categorie = $_GET['categorie'];
    
    $req = "INSERT INTO `plante` (`nom`, `image`, `prix`, `categorie_id`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $req);
    mysqli_stmt_bind_param($stmt, "ssii", $nom, $image, $prix,$categorie);
    $execute = mysqli_stmt_execute($stmt);
    
}
if (isset($_GET['enregestre'])) {
    $cat = $_GET['cate'];
    
    
    $reqq = "INSERT INTO catégorie (`nom`) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $reqq);
    mysqli_stmt_bind_param($stmt, "s", $cat, );
    $execute = mysqli_stmt_execute($stmt);

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

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-green-700 p-4">
                <h1 class="text-white text-2xl font-semibold">Main Content</h1>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-emerald-400 p-4 ">
                <form  method="GET" class="flex flex-col gap-8 ">
                    <h1>ajouter une plante</h1>
                    <input name="nom" type="text" class=" w-60 border-black rounded-lg" placeholder="entre plante name"> </input>
                    <input name="image" type="file" class=" w-7/12 border-black rounded-lg" placeholder="entre image"> </input>
                    <input name="prix" type="text" class=" w-60 border-black rounded-lg" placeholder="entre le prix de la plante"> </input>
                    <label>Choose a categorie:</label>

                    <select name="categorie" class="w-60 ">
                        <?php
                        $sql = "select * from  catégorie  ";
                        $requet = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($requet)) {

                        ?>

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nom'] ?></option>


                        <?php
                        }
                        ?>

                    </select>
                    <button type="submit" class=" text-white mb-5 bg-green-400 rounded-2xl w-60 text-stone-950" name="submit" value="TRUE"> ajouter une plante </button>
                </form>
                <form method="GET" class="flex flex-col gap-8 ">
        <h1>ou Ajouter une categorie</h1>
        <input type="text" name="cate" placeholder="nouvelle categorie" class=" w-60 border-black rounded-lg"></input>
        <button type="submit" class=" text-white mb-5 bg-green-400 rounded-2xl w-60 text-stone-950" name="enregestre" > ajouter une categorie</button>
    </form>

            </main>
        </div>
    </div>
   
</body>

</html>