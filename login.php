<?php
session_start();
include_once 'conn.php';
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $reqq = "select  role_id from utilisateur where email = ?";
    $query = $conn->prepare($reqq);
    $query->bind_param("s", $email);
    $res = $query->execute();

    if ($res) {
        $result = $query->get_result();
        $users = $result->fetch_assoc();
        foreach ($users as $user) {
            if ($user == 2) {
                header("Location: client.php");
            } else {
                header("Location: dashborde.php");
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-[url('./imgs/rr.jpg')] bg-cover h-screen opacity-90">
        <div class="bg-white w-full flex justify-center">
            <img src="./imgs/p.png" class="h-32">
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="bg-emerald-100 w-72 flex flex-col items-center gap-3.5 justify-around mx-auto pt-10 mt-20 opacity-90 rounded-md">

                <input name="email" type="text" class="w-7/12 border-black rounded-lg" placeholder="email">
                <input name="password" type="password" class="w-7/12 border-black rounded-lg" placeholder="password">
                <button name="submit" class="mb-5 bg-green-400 rounded-2xl w-32 text-stone-950" type="submit"> log in </button>

            </div>
        </form>

</body>

</html>