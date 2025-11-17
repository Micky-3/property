<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <div class="signup-form-form">
            <form class="modal-content animate p-5 bg-secondary border border-light border-3" action="includes/reset-request.inc.php" method="post">
                <h1 class="p-3">RESET YOUR PASSWORD</h1>
                <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
                <div class="container justify-content-center p-5">
                    <input type="text" class="form-control border-0 border-bottom" placeholder="Enter Your Email Address" name="email" required><br><br>

                    <button class="btn btn-info" type="submit" name="reset-request-submit">Receive new password by email address</button><br>
            </form>
            
            <?php
                if (isset($_GET["reset"])) {
                    if ($_GET["reset"] == "success") {
                        echo "<p>Check your e-mail!</p>";
                    }
                }
            ?>
        </div> 
    </section>

<?php
    include_once 'footer.php';
?>