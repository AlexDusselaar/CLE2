<?php
if (isset($_POST['submit'])) {

    echo '<script>alert("je resevering is gemaakt");window.location.href="./index.php"</script>';

    /** @var mysqli $db */
    require_once "include/connection.php";

$naam = htmlentities($_POST['naam']);
$email = htmlentities($_POST['email']);
$datum = $_POST['datum'];
$tijd = $_POST['tijd'];
$vraag =htmlentities($_POST['vraag']);

$errors = [];
if ($naam == "") {
    $errors['game'] = "Vul aub een game naam in";
}
if ($datum == "") {
    $errors['genre'] = "Vul aub game genre in";
}
if ($tijd == "") {
    $errors['link'] = "vul aub steam store link in";
}
if (empty($errors)) {
    $query = "INSERT INTO reseveringen (naam, email, vraag, datum, tijd)
                    VALUES('$naam', '$email','$vraag', '$datum', '$tijd')";
    $result = mysqli_query($db, $query);
}

}
?>


<?php require_once 'include/header.php'?>
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
                               value="<?= $naam ?? '' ?>" placeholder="voer hier voor- en achternaam in"/>
                        <p>
                            <?= $errors['naam'] ?? '' ?>
                        </p>
                    </div>

                    <div class="formfield">
                        <label for="vraag">Vraag</label>
                        <textarea id="vraag" name="vraag" rows="7" cols="40"
                                  value="<?= $vraag ?? '' ?>"
                                  placeholder="zeg hier wat uw wilt doen met uw interieur"></textarea>
                        <p>
                            <?= $errors['vraag'] ?? '' ?>
                        </p>
                    </div>
                </div>

                <div class="flex2">

                    <div class="formfield">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email"
                               value="<?= $email ?? '' ?>" placeholder="voer hier uw email in"/>
                        <p>
                            <?= $errors['email'] ?? '' ?>
                        </p>
                    </div>

                    <div class="formfield">
                        <label for="datum">Datum</label>
                        <input id="datum" type="date" name="datum"
                               value="<?= $datum ?? '' ?>"/>
                        <p>
                            <?= $errors['datum'] ?? '' ?>
                        </p>
                    </div>

                    <div class="formfield">
                        <label for="tijd">Tijd</label>
                        <select id="tijd" name="tijd">
                            <option value="" disabled selected>Kies een tijd</option>
                            <option value=<?= $tijd ?? '15:00' ?>>15:00</option>
                            <option value=<?= $tijd ?? '15:30' ?>>15:30</option>
                            <option value=<?= $tijd ?? '16:00' ?>>16:00</option>
                        </select>
                        <p>
                            <?= $errors['tijd'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

                <div class="submitbuttonbg">
                        <button class="button" type="submit" name="submit">Reseveer</button>
                </div>
            </form>
        </section>

    </div>
</section>
</main>
<?php require_once 'include/footer.php'?>
