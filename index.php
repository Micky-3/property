<?php
    include_once 'header.php';
?>
    <div class="text-light text" id="search">

        <div class="mx-5 p-3" id="inp">
            <?php
                if (isset($_SESSION["useruid"])){
                    echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
                }
            ?>

            <h1>Agents.   Tours.  Loans.  Homes.</h1>
            <form class="d-flex">
                <input type="text" class="form-control-me-2" placeholder="Enter an address, neighbourhood, city or ZIP code">
                <button type="button" class="btn"><i class="fa fa-search fs-1" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    
    <!-- <div class="container-fluid" id="flat">
        <h1>Flats and Apartments for sale</h1>
        <div class="m-1 gap-3 row">
            <div class="col border border-secondary border-3">
                <h6>Luxury And Spacious Mini Flat, Work Is Ongoing</h2>
                <div class="image-container"><img src="../image/rm1.jpeg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Mini flat (room and parlour) for rent</h4>
                <p>Magodo Estate, Ketu</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/h2.jpeg" alt="" class="image float-start mx-3"></div>
                    <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/nh3.jpeg" alt="" class="image float-start mx-3"></div>
                    <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
        </div>
        <div class="m-1 gap-3 row">
            <div class="col border border-secondary border-3">
                <h6>Luxury And Spacious Mini Flat, Work Is Ongoing</h2>
                    <div class="image-container"><img src="../image/nh4.jpg" alt="" class="image float-start mx-3"></div>
                    <h6 class="text-danger">Mini flat (room and parlour) for rent</h4>
                <p>Magodo Estate, Ketu</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/nh5.jpg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/nh6.jpg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
        </div>
        <div class="m-1 gap-3 row">
            <div class="col border border-secondary border-3">
                <h6>Luxury And Spacious Mini Flat, Work Is Ongoing</h2>
                    <div class="image-container"><img src="../image/nh7.jpg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Mini flat (room and parlour) for rent</h4>
                <p>Magodo Estate, Ketu</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/nh8.jpg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
            <div class="col border border-secondary border-3">
                <h6>4 Bedroom Flat</h2>
                    <div class="image-container"><img src="../image/nh9.jpg" alt="" class="image float-start mx-3"></div>
                <h6 class="text-danger">Flat / apartment for rent</h4>
                <p>Ibeju-Lekki, Lagos</p>
                <hr>
                <h4 class="text-danger">N500,000</h4>
                <hr>
                <i class="fa fa-bath" aria-hidden="true"> 3</i>
                <i class="fa fa-bed" aria-hidden="true"> 3</i>
            </div>
        </div>
    </div>
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> -->


    <div class="row mb-5 gap-1 justify-content-center text-light text-center p-5" id="three">
        <div class="three col-3">
            <img src="../image/homepage-spot-agent-lg-1.webp" data-bs-toggle="tooltip" alt="" title="Available">
            <h4>Buy a home</h4>
            <h6>A real estate agent can provide you with a clear breakdown of costs so that you can avoid surprise expenses.</p>
            <button class="btn btn-outline-primary" type="button">Find a local agent</button>
        </div>
        <div class="three col-3">
            <img src="../image/homepage-spot-rent-lg-1.webp" alt="">
            <h4>Rent a home</h4>
            <h6>We’re creating a seamless online experience – from shopping on the largest rental network, to applying, to paying rent.</p>
            <button class="btn btn-outline-primary" type="button">Find rentals</button>
        </div>
    </div>
    <div class="text-center">
        <h4>About MJ Property's Recommendations</h4>
        <pre>Recommendations are based on your location and search activity, such as the homes you've viewed and saved and the filters your've used. We use this information
            to bring similar homes to your attention, so you don't miss out.</pre>
    </div>
    <div class="row text-center pb-5">
        <div class="col-3">
            <h3>Real Estates</h3>
        </div>
        <div class="col-3">
            <h3>Rentals</h3>
        </div>
        <div class="col-3">
            <h3>Mortgage Rates</h3>
        </div>
        <div class="col-3">
            <h3>Browse Homes</h3>
        </div>
    

<?php
    include_once 'footer.php'
?>