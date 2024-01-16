<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once 'include/connection.php';
    $password = htmlentities($_POST['password']);
    $email = htmlentities($_POST['email']);


    if (!$email == "") {
        mysqli_escape_string($db,$password);
        $query = "SELECT wachtwoord, email FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query)
        or die('Error ' . mysqli_error($db) . ' with query ' . $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $hashedPassword = $row['wachtwoord'];
        }

        if (password_verify($password, $hashedPassword)) {
            header('Location: ./secure.php');
        }

    } else {
            $errors['password'] = "wachtwoord en/of email is incorect";
    }
    if ($password == "") {
        $errors['password'] = "wachtwoord en/of email is incorect";
    }
}
?>

<?php
require_once 'include/header.php';
?>
<main>
    <section id="login">
        <h2>Log in</h2>
        <div class="block">
            <form action="" method="post">
                <div class="formfield">
                    <label for="email">naam</label>
                    <input id="email" type="text" name="email" value="<?= $email ?? '' ?>" />
                </div>

                <div class="formfield">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" name="password" value="<?= $password ?? '' ?>" />
                </div>
                <p class="help is-danger">
                    <?= $errors['password'] ?? '' ?>
                </p>

                <button class="button" type="submit" name="submit">Log in</button>
            </form>
            <h3>Of log in met:</h3>
            <!-- social media icons -->

            <h3>Nog geen account?</h3>
            <a href="register.php" class="button">Maak een account aan</a>
        </div>
    </section>
</main>
</body>

<?php
require_once 'include/footer.php';
?>