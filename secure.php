<?php
session_start();
if (!$_SESSION == ''){
    $email = $_SESSION['userEmail'];
    $userID = $_SESSION['userid'];
    setcookie('userEmail', $email);
    setcookie('userid', $userID)
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

    <div class="flex">

        <section id="images">
            <img src="./imgs/index1.png" alt="placeholder">
            <img src="./imgs/index2.png" alt="placeholder">
            <img src="./imgs/index3.png" alt="placeholder">
            <img src="./imgs/index4.png" alt="placeholder">
        </section>

        <div class="flex1">
            <header id="header">
                <div class="headerlogo">
                    <img src="imgs/LT-interiors_logo.png" alt="logo">
                    <h1>Interiors</h1>
                </div>
                <div class="headertext">
                    <p>
                        Deskundig advies voor al uw interieurvragen. Reserveer nu en plan simpel en snel een tijd die voor u
                        uitkomt.
                    </p>
                    <a href="reserveringen.php">Reserveringen</a>
                </div>
            </header>
        </div>

    </div>

<?php
} else {
    header('location: ./login.php');
}
require_once 'include/footer.php';
?>