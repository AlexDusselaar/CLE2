<?php
require_once 'include/header.php';
?>

    <section id="login">
        <h2>Log in</h2>
        <div class="block">
            <form action="reserveren.php">
                <div class="formfield">
                    <label for="name">Naam</label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="formfield">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password">
                </div>

                <button class="button" type="submit">Log in</button>
            </form>
            <h3>Of log in met:</h3>
            <!-- social media icons -->

            <h3>Nog geen account?</h3>
            <a href="register.php" class="button">Maak een account aan</a>
        </div>
    </section>

</body>

<?php
require_once 'include/footer.php';
?>