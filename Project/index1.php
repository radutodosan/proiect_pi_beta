<?php
include("loggedin.php");

$user_data = check_login($con);

if($user_data == -1){
    $login = "href='login.php'";
    $cart = "href='login.php'";
    $nume = "login"; 
}
else{
    $login = "href='logout.php'";
    $cart = "href='cos.php'";
    $nume = "Hello, $user_data[user_name]";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- fisier CSS -->
    <link rel="stylesheet" type="text/css" href="style1.css?version=1">

</head>
<body>

    
<!-- bara navigatie -->
<header>

        <div id="menu" class="fas fa-bars"></div>

        <a href="index1.php" class="logo"><i class="fas fa-home"></i></a>

        <nav class="navbar">
            <ul>
                <li><a class="active" href="index1.php">Acasa</a></li>
                <li><a href="index2.php">Carti</a></li>
                <li><a href="index3.php">Contact</a></li>
            </ul>
        </nav>

        <div class="dropdown">
            <button class="dropbtn"><i class="fas fa-user"></i></button>
            <div class="dropdown-content">
                <a <?php echo $login ?>><?php echo "$nume" ?></a>
                <a <?php echo $cart ?> class="fas fa-shopping-cart"></a>
                <a href="#">View orders</a>
            </div>
        </div>
    </header>

<!-- HOME -->
<section class="home" id="home">

    <h1>Bun Venit!</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ipsa provident totam? Dolorum, quisquam. Nobis architecto magni velit accusantium, impedit consectetur soluta nemo inventore deleniti modi ea tenetur. Illum, sed.</p>
    <a href="index2.php"><button class="btn">Mai departe</button></a>

</section>

<!-- FOOTER -->
<div class="footer">

    <div class="box-container">
        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-map-marker-alt"></i> Timisoara, UVT </p>
            <p> <i class="fas fa-envelope"></i> examplu@yahoo.com </p>
            <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
        </div>

    </div>

</div>



<!-- jquery cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- JS file -->
<script src="script1.js"></script>

</body>
</html>