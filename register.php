<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "include/connection.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_escape_string($db,$name);
    mysqli_escape_string($db,$email);
    mysqli_escape_string($db,$password);


    $errors = [];
    if ($name == ""){
        $errors['name'] = "vul aub uw naam in";
    }
    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $errors['email'] = "vul aub een geldige email in";
    }
    if (!$password == "") {
        if (strlen($password)!=8 ) {
            $errors['password'] = "wachtwoord moet groter zijn dan 8 letters";
        }
    } else {
        $errors['password'] = "vul aub een wachtwoord in";
    }
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    if (empty($errors)) {
        $query = "INSERT INTO users (naam, email, wachtwoord)
                    VALUES('$name', '$email', '$passwordHashed')";
        $result = mysqli_query($db, $query);
        header('Location: ./login.php');
        exit();
    }
}
?>


<?php
require_once 'include/header.php';
?>
    <main>
    <section id="register">
        <h2>Registreren</h2>
        <div class="block">
            <form action="" method="post">

                <div class="formfield">
                    <label for="name">Naam</label>
                    <input  id="name" type="text" name="name"
                            value="<?= $name ?? '' ?>"
                            placeholder="voer hier uw voor-en achternaam in"/>
                </div>
                <p class="help is-danger">
                    <?= $errors['name'] ?? '' ?>
                </p>

                <div class="formfield">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="<?= $email ?? '' ?>"
                           placeholder="voer hier uw email in"/>
                </div>
                <p class="help is-danger">
                    <?= $errors['email'] ?? '' ?>
                </p>

                <div class="formfield">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" name="password"
                           value="<?= $password ?? '' ?>"
                           placeholder="voer hier een wachtwoord in"/>
                </div>

                <p class="help is-danger">
                    <?= $errors['password'] ?? '' ?>
                </p>

                <button class="button" type="submit" name="submit">Aanmaken</button>

                <h3>Heeft u al een account?</h3>
                <a href="login.php" class="button">Inloggen</a>

            </form>
        </div>
    </section>
    </main>

<?php
require_once 'include/footer.php';
?>