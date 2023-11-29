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
                <img src="./imgs/p.png" class="h-32 ">
            </div>
            <div class="">
                <a href="panier.php"> <img src="./imgs/icons8-panier-48.png" class="mt-5"></a>
                <section class="py-12">
        <div class="container mx-auto">
            
            <!-- Main navigation container -->
<nav
  

     <div class="w-[300px] lg:pr-2 mx-auto">
        <form action="" method="post">
        <div class="relative flex w-full flex-wrap items-stretch">
          <input 
            
            type="search"
            name="search"
            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none motion-reduce:transition-none dark:border-neutral-500 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon3" />

          <!--Search button-->
          <button
            class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 motion-reduce:transition-none"
            type="button"
            id="button-addon3"
            data-te-ripple-init>
            Search
          </button> 

    
        </div></form>
      </div>
    </div>
  </div>
</nav>
            </div>
        </div>
    </nav>
    <h2 class="text-3xl font-semibold mb-8 text-center">notre produits</h2>

    <?php
    include 'conn.php';
    session_start();

    if (isset($_POST['ajouter'])) {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $sql = "select id from utilisateur where email = '$email' ";
            $queryEmail = mysqli_query($conn, $sql);
            $resut = $queryEmail->fetch_assoc();
            if ($queryEmail) {
                $id_utilisateur = $resut['id'];
                $id_plant = $_POST["ajouter"];
                $req = "INSERT  INTO pannier (id_plante , id_utilisateur) VALUES ('$id_plant','$id_utilisateur')";
                $query = mysqli_query($conn, $req);
                if ($query) {
                    echo "ajouted";
                }
            }
        }
    }


    ?>

 


            <div >
                 <?php
                   
                 $req_cat = mysqli_query($conn,"select * from catégorie");
                 while ($row = mysqli_fetch_assoc($req_cat)) : ?>
                <a href="?id=<?=$row["id"]?>"> <button class="mb-5 px-2 py-3 bg-green-400 rounded-2xl w-32 text-stone-950"> <?=$row["nom"]?> </button> </a>
                 <?php endwhile; ?>
                <form method="POST" action="" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                         
                    
                    if(isset($_GET["id"])){
                        $id_cat = $_GET["id"];
                        $query = mysqli_query($conn,"select * from plante join catégorie on plante.categorie_id = catégorie.id where catégorie.id = '$id_cat' ");}
                        else{
                            if(isset($_POST["search"])){
                                $nomplante= $_POST["search"];
                                $requete = "SELECT * FROM plante WHERE nom like '$nomplante'";
                                $query = mysqli_query($conn, $requete);
                            }else{
                            $requete = "SELECT * FROM plante";
                            $query = mysqli_query($conn, $requete);
                            }
                        }
                      
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<div class="bg-white p-6 rounded-lg shadow-md">
                            <img src="./imgs/' . $row["image"] . '" alt="Plant 2" class="w-full h-32 object-cover mb-4 rounded">
                            <h3 class="text-xl font-semibold mb-2">nom plante:' . $row["nom"] . '</h3>
                            <p class="text-green-500 font-bold mt-2">prix' . $row["prix"] . 'dh</p>
                            <button value="' . $row["id"] . '" name="ajouter" type="submit" class="mb-5 px-2 py-3 bg-green-400 rounded-2xl w-32 text-stone-950">ajouter au panier</button>
                        
                            </div>';
                        }
                    
                    
                       

                    
                    ?>
                </form>
               


    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 o'pep. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>