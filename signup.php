<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <div class="signup-form-form">
             <form class="modal-content animate p-5 bg-secondary border border-light border-3" action="includes/signup.inc.php" method="post">
                <h1 class="p-3">SIGN-UP DETAILS</h1>
                <div class="container justify-content-center p-5">
                    <input type="text" placeholder="Enter Full name" name="name" class="form-control border-0 border-bottom"><br><br>

                    <input type="text" placeholder="Enter Email Address" name="email" class="form-control border-0 border-bottom"><br><br>

                    <input type="text" placeholder="Enter Username" name="uid" class="form-control border-0 border-bottom"><br><br>

                    <input type="password" placeholder="Enter Password" name="pwd" class="form-control border-0 border-bottom"><br><br>

                    <input type="password" placeholder="Confirm Password" name="pwdrepeat" class="form-control border-0 border-bottom"><br><br>
                    <button class="btn btn-info" type="submit" name="submit">ENTER</button>
                </div>
            </form>
        </div>
        
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "invalidUid") {
                    echo "<p>Choose a proper username!</p>";
                } else if ($_GET["error"] == "invalidEmail") {
                    echo "<p>Choose a proper email!</p>";
                } else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords don't match!</p>";
                } else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                } else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken!</p>";
                } else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up!</p>";
                }
            }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>