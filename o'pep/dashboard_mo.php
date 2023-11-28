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
                <table border="1" class="w-11/12">
                    <tr>
                        <th>nom</th>

                    </tr>
                    <?php
                    include 'conn.php';
                    $requete = "SELECT * FROM catégorie ";
                    $query = mysqli_query($conn, $requete);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id'];
                        echo "<tr>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo '<td><a href="modifier.php?id=' . $id . '">modifier</a></td>';

                        echo "</tr>";
                    }





                    ?>
                </table>

            </main>
        </div>
    </div>

</body>

</html>