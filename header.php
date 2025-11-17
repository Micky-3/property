<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Property</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
        }
        .wrapper{
            width: 360px;
            padding: 20px;
        }
        header img {
            height: 40px;
            width: 45px;
            color: aqua;
        }

        #three{
            border: 1px solid;
            position: relative;
            background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0)), url('../image/ah9.webp');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            /* background-color: rgb(0, 0, 0); */
        }
        /* #three::before{
            content: '';
            background: url('image/ah9.webp');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            opacity: 0.5;
            inset: 0;
            position: absolute;
        }
        .three {
            isolation: isolate;
        } */
        #three img{
            height: 150px;
            width: 150px;
        }
        #search {
            min-height: 80vh;
            background: url('../image/estates.jpeg');
            background-size: cover;
            background-attachment: scroll;
            place-content: center;
        }
        #search div{
            background: rgba(70, 61, 61, 0.63);
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .remove-caret::after {
            display: none;
        }
        #inp {
            width: 500px;
            max-width: 100%;
            position: relative;
        }
        #inp h1 {
            font-size: 60px;
            font-weight: 1000;
        }
        #inp input {
            border: 1px solid white;
            border-radius: 10px;
            padding: 1rem;
            width: 100%;
        }
        #inp button {
            position: absolute;
            right: 0;
        }
        .image-container img {
            height: 200px;
            width: 200px;
            transition: transform 0.3s ease-in-out;
        }

        .image-container img:hover {
            transform: scale(1.1);
        }
        #fla {
            border: 1px solid;
            position: relative;
            background-size: cover;
            background-attachment: local;
            background-position: center;
        }
        #flat div {
            border: 1px solid rgb(226, 220, 220);
            transition: transform  0.3s ease, box-shadow 0.3s ease;
        }
        #flat div:hover{
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        @keyframes fadeIn{
            from {
                opacity: 0; transorm: translateY(10px);
            }
            to{
                opacity: 1; transform: translateY(0);
            }
        }

        #flat div{
            animation: fadeIn 0.5s ease-in-out;
        }

        .modal{
            z-index: 999;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }
        
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5px auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */
        }
        .form-control:focus {
            box-shadow: inset 0 -1px 0 #7e7e7e;
        }
        .form-control {
            background-color: inherit;
        }
        /* The Close Button */
        .close {
            /* Position it in the top right corner outside of the modal */
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        
        /* Close button on hover */
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }
        
        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }
        
        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }

            /* Hide the images by default */
            .mySlides {
                display: none;
            }

            /* The dots/bullets/indicators */
            .dot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
                background-color: #717171;
            }

            .property-card {
            margin: 15px;
            }

            .property-image {
                height: 400px;
                object-fit: cover;
            }
            input {

            }
    </style>
</head>
<body>
    <marquee behavior="" direction="" style="background color: pink; color: white; height: 30px;">MJ Property</marquee>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand" data-bs-toggle="tooltip" title="MJ Property"><img src="../image/Real Estate.jpeg" alt=""></a>
                <a href="index.php" class="navbar-brand" data-bs-toggle="tooltip" title="MJ Property">MJ PROPERTY</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ms-5 my-3 gap-5">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle remove-caret" href="buy.php" role="button" data-bs-toggle="dropdown">Buy</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Houses for sale</a></li>
                                <li><a class="dropdown-item" href="#">Lands for sale</a></li>
                                <li><a class="dropdown-item" href="buy.php">Flats and Apartments for sale</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle remove-caret" href="rent.php" role="button" data-bs-toggle="dropdown">Rent</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Houses for Rent</a></li>
                                <li><a class="dropdown-item" href="#">Apartments for Rent</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION["useruid"])) { ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Admin</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="includes/logout.inc.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <div class="btn-group ms-auto">
                            <a class="btn btn-primary" type="button" href="login.php">Log in</a>
                            <a class="btn btn-primary" type="button" href="signup.php">Signup</a>               
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <script>
            document.getElementById("navbar-toggler").addEventListener("click", function(show){
                document.getElementById("collapsibleNavbar").classList.toggle("show")
            })
        </script>
    </header>
    <script src="js/bootstrap.bundle.min.js"></script>


