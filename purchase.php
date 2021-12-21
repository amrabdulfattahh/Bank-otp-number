<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<likn rel="stylesheet" href="css.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="styles.css">

</head>
<body>
  <div class="div1">

  </div>
  <header class="main-header">

            <h1 class="band-name band-name-large">The Generics</h1>
        </header>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="customer_info.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email1" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>
<input type="hidden" name="total" value="<?php echo  $_POST['total'];  ?>">

        <button name="Next" type="submit" class="btn btn-primary btn-purchase2">Next</button>
      </form>


    </div>
  </div>
  <div class="col-25">

  </div>
</div>
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
