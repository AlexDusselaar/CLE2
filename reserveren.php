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
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>reseveren</title>
</head>
<section class="section">
    <div class="container content">
        <h2 class="title">reseveren</h2>

        <section class="columns">
            <form class="column is-6" action="" method="post">

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">naam</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="name" type="text" name="naam"
                                       value="<?= $naam ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['naam'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="datum">datum</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="datum" type="date" name="datum"
                                       value="<?= $datum ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['datum'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="tijd">tijd</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="tijd" type="time" name="tijd" value="<?= $tijd ?? '' ?>"/>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['tijd'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">reseveer</button>
                    </div>
                </div>
            </form>
        </section>

    </div>
</section>
<?php require_once 'include/footer.php'?>
