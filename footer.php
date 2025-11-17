    </div>
    <footer class="p-5 text-center text-light bg-dark">
        <div class="mt-3">
            <div>
                <h3>Contact Info</h3>
                <p>Call Us +2348112575414</p>
                <p>Email: mjproperty@gmail.com
                </p>
            </div>
        </div>
        <hr>
        <p class="text-center">copyright © 2025 MJ Property. All rights reserved</p>
    </footer>
</body>
</html>
<?php
 if(isset($_SESSION['show_loginModal'])):
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('id02').style.display = 'none';
        document.getElementById('loginModal').style.display = 'block';
    }):
</script>
<?php
unset($_SESSION['show_loginModal']);
?>
<?php endif; ?>