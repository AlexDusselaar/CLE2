<?php
require_once 'include/header.php';
?>

    <section id="register">
        <h2>Registreren</h2>
        <div class="block">
            <form action="reserveren.php">

                <div class="formfield">
                    <label for="name">Naam</label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="formfield">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>

                <div class="formfield">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password">
                </div>

                <button class="button" type="submit">Aanmaken</button>

                <h3>Heeft u al een account?</h3>
                <a href="login.php" class="button">Inloggen</a>

            </form>
        </div>
    </section>

    </body>

<?php
require_once 'include/footer.php';
?>