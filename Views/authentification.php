<?php
session_start();

$users = [
    "admin" => "1234",
    "user" => "0000"
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] == $password) {

        $_SESSION['user'] = $username;

        header("Location: catalogue_voitures.php");
        exit();

    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style/style1.css">
</head>
<body>

<div class="login-container">
    <form method="POST" class="login-form">
        <h2>Connexion</h2>

        <?php if ($error) { ?>
            <p style="color:red;"><?= $error ?></p>
        <?php } ?>

        <input type="text" name="username" placeholder="Nom utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">Se connecter</button>
    </form>
</div>style

</body>
</html>