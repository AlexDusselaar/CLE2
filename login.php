<?php
/** @var mysqli $db */
require_once 'include/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];


    $errors = [];
    if ($email == "") {
        $errors['email'] = "vul aub uw email in";
    }
    if ($pass == "") {
        $errors['password'] = "vul aub uw wachtwoord in";
    }



    $query = "SELECT * FROM users WHERE 'email=$email'";
    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);

    if (mysqli_num_rows($result) === 1) {

        $getPassword = "SELECT * FROM users WHERE 'wachtwoord'";
        $verify = mysqli_query($db, $query);
        if (password_verify($pass,$verify))  {
           header('location /secure.php');
        } else {
            $errors[]= "wachtwoord en/of email zijn incorrect";
        }
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
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="<?= $email ?? '' ?>" />
                </div>
                <p class="help is-danger">
                    <?= $errors['email'] ?? '' ?>
                </p>

                <div class="formfield">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" name="password" value="<?= $pass ?? '' ?>" />
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