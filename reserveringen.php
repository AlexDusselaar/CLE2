<?php
session_start();
if (!$_SESSION == ''){
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LT Interiors</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<nav>
    <div class="navlinks">
        <div class="navlogo">
            <img src="./imgs/LT-interiors_logo.png" alt="logo">
            <a class="logo-text" href="./secure.php">Interiors</a>
        </div>
        <a href="./reserveringen.php">Reserveringen</a>
    </div>
    <div class="login">
        <a href="./index.php"><?php session_unset(); session_destroy();?>uitloggen</a>
    </div>
</nav>

<main>
    <p>Lege pagina :(</p>
</main>

<?php
}
require_once 'include/footer.php';
?>
