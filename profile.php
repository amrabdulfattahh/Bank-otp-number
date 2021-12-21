<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['Username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['Username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css-profile.css">
    <title></title>
  </head>


  <body>
<div class="main-container">
  <div class="profile-content">
    <div class="profile-img">
      <img src="https://cactusthemes.com/blog/wp-content/uploads/2018/01/tt_avatar_small.jpg" />
      <div class="name">
        <h2>  <?php  if (isset($_SESSION['Username'])) : ?>
               <p>
                  <strong>

                  <?php echo $_SESSION['Username']; ?>
                  </strong>
                      <?php endif ?>
              </p>
             </h2>
        <!-- <span>@hanibal_g</span><span>Designer</span> -->
      </div>
    </div>
    <a href="index.php?logout='1'" style="color: white;">
      <button class="edit">
        <i class="fas fa-edit"></i>
        Logout
      </button>
      
    </a>

  </div>
  <!-- break -->
  <hr class="break" />
  <div class="body-content">
    <ul>
      <li><a href="" class="active">Purchased</a></li>
      <!-- <li><a href="">Projects</a></li>
      <li><a href="">Jobs</a></li>
      <li><a href="">About</a></li>
      <li><a href="">Contact</a></li> -->
    </ul>

    <div class="main-title">
      <p>Welcome to your profile ... </p>
      <!-- <p>May 28- Jun 24</p> -->
    </div>
    <!-- <div class="main">
      <div class="card bg-dark">
        <p>Project Reached</p>
        <p class="num">1212</p>
      </div>
      <div class="card">
        <p>Post Engagements</p>
        <p class="num">422</p>
      </div>
      <div class="card">
        <p>Page Likes</p>
        <p class="num">11</p>
      </div>
    </div> -->
  </div>
</div>
</body>
</html>
