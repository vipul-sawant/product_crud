<?php
require_once('database/db.php');
    // var_dump($_POST);
    $data = array();
    $errors = array();
    $empty = array();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        # code...
        if (strlen($_POST['uName']) < 1) {
            # code...
            $empty['uName'] = true;
        }
        if (strlen($_POST['email']) < 1) {
            # code...
            $empty['email'] = true;
        }

        if (strlen($_POST['email']) > 0 && strlen($_POST['uName']) > 0) {
            # code...
            if ($_POST['op'] == "add") {
                # code...
                $checkEmail = "SELECT email FROM users WHERE email = '{$_POST['email']}'";
            } else if ($_POST['op'] == "edit") {
                # code...
                $id = $_POST['id'];
                $checkEmail = "SELECT email FROM users WHERE email = '{$_POST['email']}' AND id <> '$id'";
            }
            $emailQuery = mysqli_query($con, $checkEmail);
            $emailNum = mysqli_num_rows($emailQuery);

            if ($emailNum > 0) {
                # code...
                $errors['email'] = true;
            } else {
                
                $errors['email'] = false;

                if ($_POST['op'] == "add") {
                    $add = "INSERT INTO users (name, email) VALUES ('{$_POST['uName']}', '{$_POST['email']}')";
                    $addQuery = mysqli_query($con, $add);

                    if ($addQuery) {
                        $errors['add'] = false;
                    } else {
                        $errors['add'] = true;
                    }
                } else if ($_POST['op'] == "edit") {
                    
                        $tz = 'Indian/Mahe';
                        date_default_timezone_set($tz);
                        
                        $currentTimestamp = date('Y-m-d H:i:s');
                        
                        $edit = "UPDATE users set name = '{$_POST['uName']}', email = '{$_POST['email']}', updated_at = '{$currentTimestamp}' WHERE id = '{$_POST['id']}'";
                        $editQuery = mysqli_query($con, $edit);

                        if ($editQuery) {
                            $errors['edit'] = false;
                        } else {
                            $errors['edit'] = true;
                        }
                    }
                
            }
        }

        $errors['empty'] = $empty;        
        $data['errors'] = $errors;
        echo json_encode($data);
        mysqli_close($con);
    }
?>