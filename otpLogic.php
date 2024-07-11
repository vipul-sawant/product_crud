<?php
    session_start();
    require_once('database/db.php');
    
    $data = array();
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $verify = "SELECT * from users WHERE username = '{$_POST['user']}'";
        $verifyQuery = mysqli_query($con, $verify);
        $row = mysqli_fetch_assoc($verifyQuery);

        $nowTime = strtotime(date('Y-m-d H:i:s'));
        $dbTime = strtotime($row['otpExpiry']);

        $dbOTP = $row['otp'];
        $userOTP = $_POST['otp'];

        if ($dbTime >= $nowTime) {
            # code...
            if ($dbOTP == $userOTP) {
                # code...
                $errors['invalid'] = false;
            } else {
                $errors['invalid'] = true; 
            }
        } else {
            $errors['timeout'] = true;
        }
    }
    $data['errors'] = $errors;
    echo json_encode($data);
?>