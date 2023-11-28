<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-green-500 p-4 text-white">
        <div class="container mx-auto flex justify-between ">
            <div>
            <img src="./imgs/p.png" class="h-32 "></div>
            <div class="">
          <a href="panier.php">  <img src="./imgs/icons8-panier-48.png" class="mt-5"></a>
            </div>
        </div>
    </nav>

    

    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-8 text-center">Featured Plants</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
               
                
                    <?php
                include 'conn.php';
                    $requete = "SELECT * FROM plante";
                    $query = mysqli_query($conn, $requete);
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="./imgs/'.$row["image"].'" alt="Plant 2" class="w-full h-32 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold mb-2">nom plante:'.$row["nom"].'</h3>
                        <p class="text-green-500 font-bold mt-2">prix'.$row["prix"].'dh</p>
                        </div>';

                     }
               ?>
                

            
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Plant Shop. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
