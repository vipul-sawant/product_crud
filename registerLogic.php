<?php
    require_once('database/db.php');
    // var_dump($_POST);
    $data = array();
    $errors = array();
    $empty = array();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        # code...
        if ( strlen($_POST['userName']) < 1) {
            # code...
            $empty['userName'] = true;
        }
        if ( strlen($_POST['pass']) < 1) {
            # code...
            $empty['pass'] = true;
        }
        if ( strlen($_POST['email']) < 1) {
            # code...
            $empty['email'] = true;
        }

        if (strlen($_POST['userName']) > 0 && strlen($_POST['pass']) > 0 && strlen($_POST['email']) > 0) {
            # code...
            $checkEmail = "SELECT * FROM users WHERE email = '{$_POST['email']}' AND username IS NULL";
            $emailQuery = mysqli_query($con, $checkEmail);
            $emailNum = mysqli_num_rows($emailQuery);

            if ($emailNum > 0) {

                // $errors['email'] = false;

                $checkUserName = "SELECT * FROM users WHERE username = '{$_POST['userName']}'";
                $userNameQuery = mysqli_query($con, $checkUserName);
                $userNameNum = mysqli_num_rows($userNameQuery);
                // echo($userNameNum);

                if ($userNameNum > 0) {
                    # code...
                    $errors['userName'] = true;
                } else {
                    // $errors['userName'] = false;
                    $hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                    $insert = "UPDATE users SET username = '{$_POST['userName']}', pass = '{$hash}' WHERE email = '{$_POST['email']}'";
                    $insertQuery = mysqli_query($con, $insert);
                    if ($insertQuery) {
                        # code...
                        $errors['insert'] = false;
                    } else {
                        $errors['insert'] = true;
                    }
                    
                }
                # code...
            } else {
                $errors['email'] = true;
            }
        }
    }
    $errors['empty'] = $empty;
    $data['errors'] = $errors;
    echo json_encode($data);
?>