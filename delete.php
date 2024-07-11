<?php
    require_once('database/db.php');

    $data = array();
    $errors = array();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        # code...
        $delete = "DELETE FROM users WHERE id = '{$_POST['id']}'";
        $deleteQuery = mysqli_query($con, $delete);

        if (!$deleteQuery) {
            # code...
            $errors['delete'] = true;
        }
    }
    $data['errors'] = $errors;
    echo json_encode($data);

?>