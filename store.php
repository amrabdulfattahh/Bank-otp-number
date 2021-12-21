<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "data1";
$conn = new mysqli($host,$dbusername,$dbpassword ,$dbname);
if(mysqli_connect_error())
{
  die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
  $stmt = $conn->query("SELECT * FROM products");

    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>The Generics | Store</title>
            <meta name="description" content="This is the description">
            <link rel="stylesheet" href="styles.css" />
            <script src="store.js" async></script>
        </head>
        <body>
            <header class="main-header">
                <nav class="main-nav nav">
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="store.php">STORE</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="account.html">ACCOUNT</a></li>
                    </ul>
                </nav>
                <h1 class="band-name band-name-large">The Generics</h1>
            </header>
            <section class="container content-section">
                <h2 class="section-header">MUSIC</h2>
                <div class="shop-items">
                  <?php

                    while($stmt_result = $stmt->fetch_object()){
                      $stmt_result = (array)$stmt_result;


                        ?>
                        <div class="shop-item">
                            <span class="shop-item-title"><?php echo $stmt_result["product_name"] ?></span>
                            <img class="shop-item-image" src="Images/<?php echo $stmt_result["product_photo"]?>">
                            <div class="shop-item-details">
                                <span class="shop-item-price"><?php echo $stmt_result["product_price"]?></span>
                                <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                            </div>
                        </div>
                        <?php


                    }
                   ?>

                </div>
            </section>
            <!-- <section class="container content-section">
                <h2 class="section-header">MERCH</h2>
                <div class="shop-items">
                    <div class="shop-item">
                        <span class="shop-item-title">T-Shirt</span>
                        <img class="shop-item-image" src="Images/Shirt.png">
                        <div class="shop-item-details">
                            <span class="shop-item-price">$19.99</span>
                            <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                        </div>
                    </div>
                    <div class="shop-item">
                        <span class="shop-item-title">Coffee Cup</span>
                        <img class="shop-item-image" src="Images/Cofee.png">
                        <div class="shop-item-details">
                            <span class="shop-item-price">$6.99</span>
                            <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </section> -->
            <section class="container content-section">
                <h2 class="section-header">CART</h2>
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">ITEM</span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                </div>
                <div class="cart-items">
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price">$0</span>
                </div>
                <a href="account.html" style="text-decoration: none;" class="btn btn-primary btn-purchase" type="a">PURCHASE</a>
            </section>
            <footer class="main-footer">
                <div class="container main-footer-container">
                    <h3 class="band-name">The Generics</h3>
                    <ul class="nav footer-nav">
                        <li>
                            <a href="https://www.youtube.com" target="_blank">
                                <img src="Images/YouTube Logo.png">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.spotify.com" target="_blank">
                                <img src="Images/Spotify Logo.png">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com" target="_blank">
                                <img src="Images/Facebook Logo.png">
                            </a>
                        </li>
                    </ul>
                </div>
            </footer>
        </body>
    </html>

    <?php


}


 ?>
