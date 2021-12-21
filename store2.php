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
}


  ?>

    <?php
    session_start();
    if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['fullname']);
    unset($_SESSION['email1']);
    unset($_SESSION['address']);
    unset($_SESSION['city']);
    header("location: login.php");
      header("location: customer_info.php");
  }
    ?>





    <!DOCTYPE html>
    <html>
        <head>
          <div class="div1">

          </div>
            <title>The Generics | Store</title>
            <meta name="description" content="This is the description">
            <link rel="stylesheet" href="styles.css" />

        </head>
        <body>
            <header class="main-header">
                <nav class="main-nav nav">
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="store.php">STORE</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <?php  if (isset($_SESSION['Username'])) : ?>
                             <p>
                                <a href="profile.php"<strong style="color:white;">
                                   <?php echo $_SESSION['Username']; ?>
                                </strong></a>
                            </p>
                            <p>
                                            <a href="store.php?logout='1'" style="color: white;">
                                                Logout
                                            </a>
                                        </p>

                                    <?php endif ?>
                    </ul>

                </nav>
                <h1 class="band-name band-name-large">The Generics</h1>
            </header>
            <section class="container content-section">
                <h2 class="section-header">MUSIC</h2>


                <?php if (isset($_SESSION['name']) and isset($_SESSION['address']) and isset($_SESSION['city']) and isset($_SESSION['-']) and isset($_SESSION['hi']) and isset($_SESSION['succes']) and isset($_SESSION['space']) ) : ?>
                            <div class="error success" >
                                <h3>



                                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Payment Is Done !</strong><?php echo $_SESSION['hi'];
                        echo $_SESSION['name'];
                        echo $_SESSION['space'];
                        echo $_SESSION['succes'];
                        echo $_SESSION['city'];
                        echo $_SESSION['-'];
                        echo $_SESSION['address'];
  ?>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
                       unset($_SESSION['city']);
                       unset($_SESSION['address']);
                       unset($_SESSION['-']);
                       unset($_SESSION['succes']);
                       unset($_SESSION['hi']);
                       unset($_SESSION['name']);
                       unset($_SESSION['space']);
                                    ?>
                                </h3>
                            </div>
                        <?php endif ?>

                        <!-- information of the user logged in -->
                        <!-- welcome message for the logged in user -->



                    </div>




   </div>
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
              <form class="" action="purchase.php" method="post">
                <input type="hidden" name="total" value="0" id="a">
                <button type="submit"  style="text-decoration: none;" class="btn btn-primary btn-purchase" type="a">PURCHASE</a>
              </form>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="store.js" async></script>
    </html>
