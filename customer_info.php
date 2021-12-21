<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$name = "";
$email    = "";
$address="";
$city="";
$cardname = "";
$cardnumber    = "";
$expmonth="";
$expyear="";
$cvv="";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,a
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'data1');

// Registration code
if (isset($_POST['Next'])) {

    // Receiving the values entered and storing
    // in the variables
    // Data sanitization is done to prevent
    // SQL injections
    $name = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email1']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);


    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input



        // Checking if the passwords match
    }

    // If the form is error free, then register the user
    if (count($errors) == 0) {

        // Password encryption to increase data security


        // Inserting data into table
        $query = "INSERT INTO customers (name, email, address , city)
                  VALUES('$name', '$email', '$address', '$city')";

        mysqli_query($db, $query);

        // Storing username of the logged in user,
        // in the session variable
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['hi'] = "Hello ";
        $_SESSION['succes'] = "The Shipment Will Be Send To ";
        $_SESSION['-'] = "-";
        $_SESSION['space'] = " ";
          $_SESSION['total'] =$_POST['total'];


        // Welcome message


        // Page on which the user will be
        // redirected after logging in
      
        header("location:purchase1.php");
    }
    if (isset($_POST['Confirm'])) {

        // Data sanitization to prevent SQL injection
        $cardname = mysqli_real_escape_string($db, $_POST['cardname']);
        $cardnumber = mysqli_real_escape_string($db, $_POST['cardnumber']);
        $expmonth = mysqli_real_escape_string($db, $_POST['expmonth']);
        $expyear = mysqli_real_escape_string($db, $_POST['expyear']);
        $cvv = mysqli_real_escape_string($db, $_POST['cvv']);

        // Error message if the input field is left blank


        // Checking for the errors
        if (count($errors) == 0) {

            // Password matching


            $query = "SELECT * FROM card_info WHERE card_name=
                    '$cardname' AND card_number='$cardnumber' AND exp_month='$expmonth' AND exp_year='$expyear' AND CVV='$cvv'";
            $results = mysqli_query($db, $query);

            // $results = 1 means that one user with the
            // entered username exists
            if (mysqli_num_rows($results) == 1) {

                // Storing username in session variable


                // Welcome message


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
