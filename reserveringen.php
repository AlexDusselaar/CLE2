<?php
/** @var mysqli $db */
require_once 'include/connection.php';
session_start();
$userID = $_COOKIE['userid'];
$email = $_COOKIE['userEmail'];
$_SESSION['userEmail'] = $email;
$admin = false;
if (!$_SESSION == ''){
    if ($userID == 1 ){
        $admin = true;
    }

if ($admin) {
    $query = "SELECT * FROM reseveringen";

    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);

} else {
    $query = "SELECT * FROM reseveringen WHERE email='$email' ";

    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);
}
    while ($row = mysqli_fetch_assoc($result)) {
        $reseveringen[] = $row;
    }

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
    <div class="reserveringentable">
    <h2>Bekijk reserveringen</h2>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>naam</th>
            <th>datum</th>
            <th>tijd</th>
            <th>vraag</th>
            <th>opties</th>
        </tr>
        </thead>
        <tfoot>
        <!-- <tr>
            <td colspan="6" class="has-text-centered">&copy; My Collection</td>
        </tr> -->
        </tfoot>
        <tbody>
        <?php foreach ($reseveringen as $index => $resevering) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $resevering['naam']?></td>
                <td><?= $resevering['datum'] ?></td>
                <td><?= $resevering['tijd'] ?></td>
                <td><?= $resevering['vraag'] ?></td>
                <td>
                    <div>
                        <a href="edit.php?id=<?= $index + 1 ?>">edit</a>
                        <a href="delete.php">delete</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</main>

<?php
}
else {
    header('location: ./login.php');
}
require_once 'include/footer.php';
?>
