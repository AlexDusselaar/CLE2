<?php
if (isset($_POST['submit'])) {

    echo '<script>alert("je resevering is gemaakt");window.location.href="./index.php"</script>';

    /** @var mysqli $db */
    require_once "include/connection.php";

$naam = $_POST['naam'];
$datum = $_POST['datum'];
$tijd = $_POST['tijd'];

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
    $query = "INSERT INTO reseveringen (naam, datum, tijd)
                    VALUES('$naam', '$datum', '$tijd')";
    $result = mysqli_query($db, $query);
}

}
?>


<?php require_once 'include/header.php'?>

<section>
    <div>
        <h2 class="form">Reseveren</h2>

        <section id="form">
            <form action="" method="post">
            <div class="imputfieldsbg">
                <div class="flex1">
                    <div class="formfield">
                        <label for="naam">Naam</label>
                        <input id="naam" type="text" name="naam"
                               value="<?= $naam ?? '' ?>"/>
                        <p>
                            <?= $errors['naam'] ?? '' ?>
                        </p>
                    </div>

                    <div class="formfield">
                        <label for="vraag">Vraag</label>
                        <textarea id="vraag" name="vraag" rows="7" cols="40" value="<?= $vraag ?? '' ?>"></textarea>
                        <p>
                            <?= $errors['tijd'] ?? '' ?>
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
                               value="<?= $datum ?? '' ?>"/>
                        <p>
                            <?= $errors['datum'] ?? '' ?>
                        </p>
                    </div>

                    <!--
                    <div>
                        <label for="tijd">Tijd</label>
                        <input id="tijd" type="time" name="tijd" value="<?= $tijd ?? '' ?>"/>
                        <p>
                            <?= $errors['tijd'] ?? '' ?>
                        </p>
                    </div> -->

                    <div class="formfield">
                        <label for="tijd">Tijd</label>
                        <select id="tijd" name="tijd">
                            <option value="" disabled selected>Kies een tijd</option>
                            <option value="optie1">optie1</option>
                            <option value="optie2">optie2</option>
                            <option value="optie3">optie3</option>
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
<?php require_once 'include/footer.php'?>
