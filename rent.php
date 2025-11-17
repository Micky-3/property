<?php
    include_once 'header.php';
?>

<div class="container my-5">
    <h2 class="text-center">Real Estate Properties for Sale</h2>
    <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                    <img src="../image/nh4.jpg" class="card-img-top property-image" alt="Property 1">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Price: $300,000</p>
                    </div>
            </div>

  <!-- Slide 2 -->
            <div class="carousel-item">
                    <img src="../image/nh4.jpg" class="card-img-top property-image" alt="Property 1">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Price: $300,000</p>
                    </div>
            </div>
        </div>
    </div>
</div>
 
 <!-- Carousel Controls -->
 <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
 </a>
 <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
 </a>
 </div>
</div>

<script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js "></script>
<script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js "></script>
<script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "></script>
</body>
</html>
