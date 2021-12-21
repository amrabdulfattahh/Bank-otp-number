<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$Username = "";
$email    = "";
$Password="";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'data1');

// Registration code



// User login
if (isset($_POST['login_user'])) {

    // Data sanitization to prevent SQL injection
    $Username = mysqli_real_escape_string($db, $_POST['Username']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    // Error message if the input field is left blank
    if (empty($Username)) {
        array_push($errors, "Username is required");
    }
    if (empty($Password)) {
        array_push($errors, "Password is required");
    }

    // Checking for the errors
    if (count($errors) == 0) {

        // Password matching
        $Password = md5($Password);

        $query = "SELECT * FROM signup_info WHERE Username=
                '$Username' AND Password='$Password'";
        $results = mysqli_query($db, $query);

        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {

            // Storing username in session variable
            $_SESSION['Username'] = $Username;

            // Welcome message
            $_SESSION['success'] = "You have logged in!";

            // Page on which the user is sent
            // to after logging in
            header('location: store2.php');
        }
        else {

            // If the username and password doesn't match
            echo "Invalid Username or Password";
        }
    }
}

?>
