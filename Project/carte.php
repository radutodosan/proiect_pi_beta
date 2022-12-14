<?php

require_once 'loggedin.php';

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

require_once 'connection.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                <li><a href="index1.php">Acasa</a></li>
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

    <section class="product" id="product">
    <?php
        if(isset($_GET['product'])){
            $stoc_id = $_GET['product'];
            $stoc_data = get_active("stoc", $stoc_id);
            $stoc = mysqli_fetch_array($stoc_data);
            if($stoc){
    ?>
        <div class="image">
            <img src="<?php echo $stoc["img"] ?>" alt="">
        </div>
            <div class ="content">
                <h1><i class="fas fa-book"></i>  <?php echo $stoc["denumire"] ?></h2>
                <h2><i class="fas fa-user"></i>  <?php echo $stoc["autor"] ?></h3>
                <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                            <i>4.5</i>
                        </div>
                <h2>Pret: <?php echo $stoc["pret"] ?> RON</h3>
                <h3>Stoc: <?php echo $stoc["stoc"] ?> </h3>
                
                <form class="addtocart"
                <?php if($user_data == -1){ ?> action="login.php" <?php }else{ ?> method="POST" <?php } ?>
                >
                    <input type="number" name="cantitate" class="addtocartbar" value="1">
                    <button type="submit" class="addtocartbtn"><i class="fas fa-shopping-cart"></i></button>
                </form>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, beatae. Modi quos   excepturi id quibusdam? Molestiae quis nihil non debitis!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, beatae. Modi quos   excepturi id quibusdam? Molestiae quis nihil non debitis!</p>
            </div>
        <?php
            }
            else{
            }
        }
        else{
        }
        if($user_data != -1)
            addtocart($user_data['id']);
    ?>
    </section>


    <!-- FOOTER -->
    <div class="footer">

        <div class="box-container">
            <div class="box">
                <h3>contact info</h3>
                <p> <i class="fas fa-map-marker-alt"></i> Timisoara, UVT </p>
                <p> <i class="fas fa-envelope"></i> example@gmail.com </p>
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