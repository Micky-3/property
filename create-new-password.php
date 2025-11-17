<?php
    include_once 'header.php';
?>

    <section class="signup-form">
            <?php
                $selector = $_GET["selector"];
                $selector = $_GET["validator"];

                if (empty($selector)  || empty($validator)) {
                    echo "Could not validate your request!";
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        ?>

                        <form class="modal-content animate p-5 bg-secondary border border-light border-3" action="includes/reset-request.inc.php" method="post">
                            <div class="container justify-content-center p-5">
                                <input type="hidden" class="form-control border-0 border-bottom" value="<?php echo $selector ?>" name="selector" required><br><br>
                                <input type="hidden" class="form-control border-0 border-bottom" value="<?php echo $validator ?>" name="selector" required><br><br>
                                <input type="password" class="form-control border-0 border-bottom" placeholder="Enter a new password..." name="pwd" required><br><br>
                                <input type="password" class="form-control border-0 border-bottom" placeholder="Repeat new password..." name="pwd-repeat" required><br><br>
                                <button type="submit" class="form-control border-0 border-bottom" name="reset-password-submit">Reset password</button>
                            </div>
                        </form>

                        <?php
                    }
                }
            ?>
    </section>

<?php
    include_once 'footer.php';
?>