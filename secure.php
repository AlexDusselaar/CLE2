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
            <a class="logo-text" href="./index.php">Interiors</a>
        </div>
        <a href="./reserveren.php">Reserveren</a>
    </div>
    <div class="login">
        <a href="./index.php">uitloggen</a>
    </div>
</nav>

    <div class="flex">

        <section id="images">
            <img src="https://placehold.co/300x300" alt="placeholder">
            <img src="https://placehold.co/300x300" alt="placeholder">
            <img src="https://placehold.co/300x300" alt="placeholder">
            <img src="https://placehold.co/300x300" alt="placeholder">
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
                    <a href="reserveren.php">Reserveren</a>
                </div>
            </header>
        </div>

    </div>

<?php
require_once 'include/footer.php';
?>