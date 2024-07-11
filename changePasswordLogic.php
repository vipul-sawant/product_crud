<?php
    session_start();
    require_once('database/db.php');
    
    $data = array();
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);

        $currentTimestamp = date('Y-m-d H:i:s');

        $pass = "UPDATE users set pass = '{$hash}', updated_at = '{$currentTimestamp}' WHERE username = '{$_SESSION['name']}'";
        $passQuery = mysqli_query($con, $pass);

        if ($passQuery) {
            # code...
            $errors['update'] = false; 
            }
        } else {
            $errors['update'] = true;
        }

    $data['errors'] = $errors;
    echo json_encode($data);
?>