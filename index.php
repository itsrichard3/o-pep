<?php
session_start();
include 'conn.php';
if (isset($_POST['submit'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $reqq = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, role_id) VALUES ('$nom','$prenom','$email','$password',null)";
    $query = mysqli_query($conn, $reqq);
    $_SESSION['email'] = $email;
    header('Location: role.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>o'pep</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <header class="bg-[url('./imgs/rr.jpg')] bg-cover h-screen opacity-90">
        <div class="bg-white w-full flex justify-center">
            <img src="./imgs/p.png" class="h-32">
        </div>
        <div>
            <form class="flex items-center flex-col gap-5 bg-green-800 opacity-80 mx-auto pt-10 mt-20 w-5/12 rounded-md" method="post">
                <h1 class="text-white text-lg">sign up</h1>

                <input name="nom" type="text" class="w-7/12 border-black rounded-lg" placeholder="nom">
                <input name="prenom" type="text" class="w-7/12 border-black rounded-lg" placeholder="prenom">
                <input name="email" type="text" class="w-7/12 border-black rounded-lg" placeholder="email">
                <input name="password" type="password" class="w-7/12 border-black rounded-lg" placeholder="password">
                <button name="submit" class="mb-5 bg-green-400 rounded-2xl w-32 text-stone-950" type="submit"> registre </button>
                <p class="text-white">already have account <a href="login.php">log in</a></p>
            </form>
        </div>
    </header>
</body>

</html>