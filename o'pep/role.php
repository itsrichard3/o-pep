<?php
session_start();
include 'conn.php';
if ($_SESSION['email']) {
    $email = $_SESSION['email'];
}
echo $email;


if (isset($_POST['ROLE'])) {
    $role = $_POST['role'];
    $sql = $conn->prepare("update utilisateur set role_id = ? where email = ?");
    $sql->bind_param("is", $role, $email);
    $sql->execute();
    echo $role;


  
    if ($sql) {
        header("Location: login.php");
    } else {
        echo "Error ";
    }

    $stmt->close();
    $conn->close();
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-[url('./imgs/rr.jpg')] bg-cover h-screen opacity-90">
        <div class="bg-white w-full flex justify-center">
            <img src="./imgs/p.png" class="h-32">
        </div>
        <form action="" method="POST">
            <div class="bg-white w-72 flex flex-col items-center gap-3.5 justify-around mx-auto pt-10 mt-20 opacity-90 rounded-md">
                <p>choisir votre role</p>
                <div class="flex space-x-3">
                    <p>Admin</p>
                    <input type="radio" name="role" value="1">
                </div>
                <div class="flex space-x-3">
                    <p>client</p>
                    <input type="radio" name="role" value="2">
                </div>
                <button type="submit" name="ROLE" class=" text-white mb-5 bg-green-400 rounded-2xl w-32 text-stone-950">valide</button>

            </div>
        </form>
    </header>

</body>

</html>