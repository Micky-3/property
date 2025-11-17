<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <div class="signup-form-form">
            <form class="modal-content animate p-5 bg-secondary border border-light border-3" action="includes/login.inc.php" method="post">
                <h1 class="p-3">LOG-IN DETAILS</h1>
                <div class="container justify-content-center p-5">
                    <input type="text" class="form-control border-0 border-bottom text-dark" placeholder="Enter Username or Email" name="uid" required><br><br>
                    <input type="password" class="form-control border-0 border-bottom" placeholder="Enter Password" name="pwd" required><br><br>

                    <button class="btn btn-info" type="submit" name="submit">Login</button><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div><br>
                <div class="container bg-dark p-3">
                    <?php
                        if (isset($_GET["newpwd"])) {
                            if ($_GET["newpwd"] == "passwordupdated") {
                                echo '<p class="signupsuccess">Your password has been reset!</p>';
                            }
                        }
                    ?>

                    <p class="psw text-light">Don't have an account? <a href="signup.php">Sign up now.</a><span>         </span>Forgot <a href="reset-password.php" class="text-decoration-none">password?</a></p>
                </div>

            </form>
        </div> 
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
            }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>