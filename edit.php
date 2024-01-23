<?php
/** @var mysqli $db */
require_once "include/connection.php";
session_start();
$userID = $_COOKIE['userid'];
$admin = false;
$index = $_GET['id'];

if ($userID == 1 ){
    $admin = true;
}


if ($admin) {
    $adminQuery = "SELECT * FROM reseveringen where id='$index'";

    $result = mysqli_query($db, $adminQuery)
    or die('Error ' . mysqli_error($db) . ' with query ' . $adminQuery);

} else {
    $query = "SELECT * FROM reseveringen WHERE id='$index' ";

    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);
}

    while ($row = mysqli_fetch_assoc($result)) {
        $naam = $row['naam'];
        $email = $row['email'];
        $datum = $row['datum'];
        $tijd = $row['tijd'];
        $vraag = $row['vraag'];
    }


if (isset($_POST['submit'])) {

    $name = htmlentities($_POST['naam']);
    $email = htmlentities($_POST['email']);
    $date = $_POST['datum'];
    $time = $_POST['tijd'];
    $vraag =htmlentities($_POST['vraag']);

    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "vul een geldige email in";
    }
    if ($name == "") {
        $errors['naam'] = "Vul aub uw naam in";
    }
    if ($date == "") {
        $errors['datum'] = "kies aub een datum";
    }
    if ($time == "") {
        $errors['tijd'] = "kies aub een tijd";
    }
    if ($vraag == "") {
        $errors['vraag'] = "vul in wat uw wilt";
    }
    if (empty($errors)) {
        $updateQuery = "UPDATE reseveringen SET naam='$name', datum='$date', tijd='$time', vraag='$vraag', email='$email' WHERE id='$index'";
        if (mysqli_query($db, $updateQuery)) {
            echo '<script>alert("je resevering is geupdate")window.location.href="./reserveringen.php.php"</script>';
        }
    }
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
    <section id="reserveren">
        <div>
            <h2 class="form">Reseveren</h2>
            <!-- <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut fringilla nec tortor et ullamcorper. Sed pretium nisi et rutrum condimentum. Nulla a feugiat enim, at molestie nisl. Suspendisse eu leo dapibus quam venenatis finibus et non leo. Vivamus urna justo, iaculis vitae ornare at, finibus id risus. Praesent id mauris at ante pellentesque pellentesque. Aliquam erat volutpat. Quisque auctor ultrices porttitor. Proin sit amet fermentum dui, imperdiet tempus eros. Mauris semper enim vitae tellus mattis, quis euismod mi blandit. Suspendisse ex ante, posuere nec odio in, tristique euismod dui. Sed consectetur nunc eget metus porta, a scelerisque massa lobortis. Proin blandit sed sem eget sagittis. Donec porta cursus accumsan. Aenean sed rhoncus ex. Donec faucibus justo et velit posuere laoreet.
            </p> -->

            <section id="form">
                <form action="" method="post">
                    <div class="inputfieldsbg">
                        <div class="flex1">
                            <div class="formfield">
                                <label for="naam">Naam</label>
                                <input id="naam" type="text" name="naam"
                                       value="<?= $naam ?? ''?>" placeholder="voer hier voor- en achternaam in"/>
                                <p>
                                    <?= $errors['naam'] ?? '' ?>
                                </p>
                            </div>

                            <div class="formfield">
                                <label for="vraag">Vraag</label>
                                <textarea id="vraag" name="vraag" rows="7" cols="40"
                                          ><?= $vraag ?? '' ?> </textarea>
                                <p>
                                    <?= $errors['vraag'] ?? '' ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex2">

                            <div class="formfield">
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email"
                                       value="<?= $email ?? '' ?>"/>
                                <p>
                                    <?= $errors['email'] ?? '' ?>
                                </p>
                            </div>

                            <div class="formfield">
                                <label for="datum">Datum</label>
                                <input id="datum" type="date" name="datum"
                                       value="<?= $datum  ?? ''?>"/>
                                <p>
                                    <?= $errors['datum'] ?? '' ?>
                                </p>
                            </div>

                            <div class="formfield">
                                <label for="tijd">Tijd</label>
                                <select id="tijd" name="tijd">
                                    <option value="" disabled selected>Kies een tijd</option>
                                    <option value=<?= $time ?? '15:00' ?>>15:00</option>
                                    <option value=<?= $time ?? '15:30' ?>>15:30</option>
                                    <option value=<?= $time ?? '16:00' ?>>16:00</option>
                                </select>
                                <p>
                                    <?= $errors['tijd'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="submitbuttonbg">
                        <button class="button" type="submit" name="submit">update</button>
                    </div>
                </form>
            </section>

        </div>
    </section>
</main>
<?php require_once 'include/footer.php'?>
