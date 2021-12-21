
<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables

$cardname = "";
$cardnumber    = "";
$expmonth="";
$expyear="";
$cvv="";
$total = $_POST['total'];
$cash = "";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,a
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'data1');

// Registration code

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


            $query = "SELECT cash FROM card_info WHERE card_name=
                    '$cardname' AND card_number='$cardnumber' AND exp_month='$expmonth' AND exp_year='$expyear' AND CVV='$cvv'";
            $results = mysqli_query($db, $query);

            //
            if(mysqli_num_rows($results) == 1){
              $row = mysqli_fetch_row($results);
              $cash= $row[0];
              if($total> $cash)
              {
                echo "no enough balance";
              }
              else {
                $newcash=$cash-$total;
                $sql = "UPDATE card_info SET cash='$newcash' WHERE card_name = '$cardname'";
                mysqli_query($db, $sql);
                header('location: store2.php');

              }
            }else{
                echo "invalid card info";
            }





            // $results = 1 means that one user with the
            // entered username exists

        }
    }





		?>
