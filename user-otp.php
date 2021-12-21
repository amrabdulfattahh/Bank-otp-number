
<!DOCTYPE html>
<html>
    <head>
        <title>The Generics | Validation</title>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="s.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <header class="main-header">
            <nav class="nav main-nav">

            </nav>
            <h1 class="band-name band-name-large">The Generics</h1>
        </header>

        <section class="content-section container">
            <h2 class="section-header">Confirm OTP Number</h2>


              <div class="wrapper">
                <section class="form login">
                  <header>Validation</header>
                  <form action="card_info.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="total" value="<?php echo  $_SESSION['total'];  ?>">

                    <div class="field input">

                      <input type="text" name="otp" placeholder="Enter The OTP Number" required>


                    </div>
                    <div class="field button">
                      <input type="submit" name="check" value="Check" class="btn btn-primary btn-purchase1">







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
