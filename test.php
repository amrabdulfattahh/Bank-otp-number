<?php
session_start();
include_once "config.php";
$email = "";
$fname = "";
$lname = "";
$errors = array();
$errors_val= array();

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if (!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($password)&&!empty($cpassword)) {

        if(preg_match("/^[a-zA-Z ]*$/",$fname)) {

            if( preg_match("/^[a-zA-Z ]*$/",$lname)) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if(mysqli_num_rows($sql) > 0){
                        $errors_val['email_exist'] = "$email - This email already exist!";
                    }else{
                                $admin_id= 1;
                                $doctor_id=0;
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                if($password !=$cpassword){
                                    $errors_val['password'] = "confirm password not match!";
                                }else{
                                        $code = rand(999999, 111111);
                                        $status_ver = "notverified";
                                        $encrypt_pass = md5($password);
                                        $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password,code,status_ver, status )
                                        VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$code}' , '{$status_ver}' , '{$status}' )");

                                        if($insert_query){
                                            $subject = "Email Verification Code";
                                            $message = "Your verification code is $code";
                                            $sender = "From: omaranelka39@gmail.com";
                                            if(mail($email, $subject, $message ,$sender)){
                                                $errors_val[' emailErr'] = "sdfghjkl";
                                                $info = "We've sent a verification code to your email - $email";
                                                $_SESSION['info'] = $info;
                                                $_SESSION['email'] = $email;
                                                $_SESSION['password'] = $password;
                                                header('location: user-otp.php');
                                                exit();
                                            }else{
                                                echo "Failed while sending code!";
                                            }
                                        } else{
                                            echo "Something went wrong. Please try again!";
                                            }
                                    }
                        }
        }else{
                    $errors_val[' emailErr'] = "Invalid email format";
                     }
            }else{
                $errors_val['lname'] = "Only alphabets and white space are allowed for last name";
            }
                 }else{
            $errors_val['fname'] = "Only alphabets and white space are allowed for first name";
        }


    }else{
        $errors_val['required']="all fields required";
    }


}


    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status_ver = 'verified';
            $update_otp = "UPDATE users SET code = $code, status_ver = '$status_ver' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
            if($update_res){
                $_SESSION['first_name'] = $fname;
                $_SESSION['email'] = $email;
                header('location: dashboard.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";

            }
        }else{
                $errors['otp-error'] = "Failed while updating code!";

        }
    }

        //if user click continue button in forgot password form
        if(isset($_POST['check-email'])){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $check_email = "SELECT * FROM users WHERE email='$email'";
            $run_sql = mysqli_query($conn, $check_email);
            if(mysqli_num_rows($run_sql) > 0){
                $code = rand(999999, 111111);
                $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
                $run_query =  mysqli_query($conn, $insert_code);
                if($run_query){
                    $subject = "Password Reset Code";
                    $message = "Your password reset code is $code";
                    $sender = "From: shahiprem7890@gmail.com";
                    if(mail($email, $subject, $message, $sender)){
                        $info = "We've sent a passwrod reset otp to your email - $email";
                        $_SESSION['info'] = $info;
                        $_SESSION['email'] = $email;
                        header('location: reset-code.php');
                        exit();
                    }else{
                        $errors['otp-error'] = "Failed while sending code!";
                    }
                }else{
                    $errors['db-error'] = "Something went wrong!";
                }
            }else{
                $errors['email'] = "This email address does not exist!";
            }
        }

        //if user click check reset otp button
        if(isset($_POST['check-reset-otp'])){
            $_SESSION['info'] = "";
            $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
            $check_code = "SELECT * FROM users WHERE code = $otp_code";
            $code_res = mysqli_query($conn, $check_code);
            if(mysqli_num_rows($code_res) > 0){
                $fetch_data = mysqli_fetch_assoc($code_res);
                $email = $fetch_data['email'];
                $_SESSION['email'] = $email;
                $info = "Please create a new password that you don't use on any other site.";
                $_SESSION['info'] = $info;
                header('location: new-password.php');
                exit();
            }else{
                $errors['otp-error'] = "You've entered incorrect code!";
            }
        }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
           $encpass = md5($password);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: login.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
?>
