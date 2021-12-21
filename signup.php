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

// DBMS connection code -> hostname,a
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'data1');

// Registration code
if (isset($_POST['reg_user'])) {

    // Receiving the values entered and storing
    // in the variables
    // Data sanitization is done to prevent
    // SQL injections
    $Username = mysqli_real_escape_string($db, $_POST['Username']);
    $email = mysqli_real_escape_string($db, $_POST['email1']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);


    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($Username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($Password)) { array_push($errors, "Password is required"); }


        // Checking if the passwords match
    }

    // If the form is error free, then register the user
    if (count($errors) == 0) {

        // Password encryption to increase data security
        $Password = md5($Password);

        // Inserting data into table
        $query = "INSERT INTO signup_info (Username, email, Password)
                  VALUES('$Username', '$email', '$Password')";

        mysqli_query($db, $query);

        // Storing username of the logged in user,
        // in the session variable
        $_SESSION['Username'] = $Username;

        // Welcome message
        $_SESSION['success'] = "You have logged in";

        // Page on which the user will be
        // redirected after logging in
        header('location: store2.php');
    }

		?>
