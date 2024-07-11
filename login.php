<?php
session_start();
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

        if (strlen($_POST['userName']) > 0 && strlen($_POST['pass']) > 0) {

            $checkUserName = "SELECT * FROM users WHERE username = '{$_POST['userName']}'";
            $userNameQuery = mysqli_query($con, $checkUserName);
            $userNameNum = mysqli_num_rows($userNameQuery);
            // echo($userNameNum);

            if ($userNameNum > 0) {
                # code...
                $row = mysqli_fetch_assoc($userNameQuery);
               if (password_verify($_POST['pass'], $row['pass'])) {
                # code...
                $_SESSION['name'] = $row['username'];
                // header('location: welcome.php');
                $errors['pass'] = false;
               } else {
                $errors['pass'] = true;

               }
            } else {
                $errors['userName'] = true;
                }
                # code...
            }
        }
    $errors['empty'] = $empty;
    $data['errors'] = $errors;
    echo json_encode($data);
?>