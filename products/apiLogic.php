<?php
require_once('../database/db.php');
    $data = array();
    $errors = array();
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'POST':
            # code...
            $name = $_POST['name'];
            $info = $_POST['info'];
            $price = $_POST['price'];

            $insert = "INSERT INTO products(name, info, price) VALUES('{$name}', '{$info}', '{$price}')";
            $insertQuery = mysqli_query($con , $insert);
            if ($insertQuery) {
                $errors['insert'] = false;
            } else {
                $errors['insert'] = true;
            }
            break;

        case "GET":
            // var_dump($_GET);
            if (!empty($_GET)) {
                $id = $_GET['id'];
                $getList = "SELECT * FROM products WHERE id = '{$id}'";
                $listQuery = mysqli_query($con, $getList);
                $listNum = mysqli_num_rows($listQuery);

                if ($listNum > 0) {
                    $row = mysqli_fetch_assoc($listQuery);
                    $data['id'] = $row['id'];
                    $data['name'] = $row['name'];
                    $data['info'] = $row['info'];
                    $data['price'] = $row['price'];
                    $data['addedOn'] = date('d-M-Y',  strtotime($row['created_at']));
                    if ($row['updated_at'] != NULL) {
                        $data['updatedOn'] = date('d-M-Y', strtotime($row['updated_at']));    
                    } else {
                        $data['updatedOn'] = $row['updated_at'];
                    }
                } else {
                    $errors['found'] = true;
                }
            } else {
                $getList = "SELECT * FROM products";
                $listQuery = mysqli_query($con, $getList);
                $table = '';
                $table.= "<table class='table w-100'> <tr> <th>Id</th> <th>Name</th> <th>Info</th> <th>Price</th> <th> Added On </th> <th> Updated On </th> <th colspan='2' class='text-center'> Actions </th> </tr>";
                while ($listRow = mysqli_fetch_assoc($listQuery)) {
                    # code...
                    $date = date("d/m/Y", strtotime($listRow["created_at"]));
                    if ($listRow["updated_at"] != NULL) {
                        # code...
                        $date2 = date("d/m/Y", strtotime($listRow["updated_at"]));
                    } else {
                        $date2 = $listRow["updated_at"];
                    }
                    // echo $date;
                    $table.= "<tr>";
                    $table.= "<td>{$listRow['id']}</td>";
                    $table.= "<td>{$listRow['name']}</td>";
                    $table.= "<td>{$listRow['info']}</td>";
                    $table.= "<td>{$listRow['price']}</td>";
                    $table.= "<td>{$date}</td>";
                    $table.= "<td>{$date2}</td>";
                        // echo "<td>{$date}</td>";
                        // echo "<td>{$date}</td>";
                        $table.= "<td class='text-center'><button type='button' class='btn edit btn-success w-50 text-white fw-bolder'>Edit</button></td>";
                        $table.= "<td class='text-center'><button type='button' class='btn delete btn-danger w-50 text-white fw-bolder'>Delete</button></td>";
                        $table.= "</tr>";
                }
                $table.= "</table>";
                $data['list'] = $table;
            }
            break;

            case "PUT":
                $information = json_decode(file_get_contents('php://input'), true);
                $id = $information['id'];
                $productName = $information['name'];
                $productInfo = $information['info'];
                $productPrice = $information['price'];
                $tz = 'Indian/Mahe';
                date_default_timezone_set($tz);
                $currentTimestamp = date('Y-m-d H:i:s');
                $update = "UPDATE products set name = '{$productName}', info = '{$productInfo}', price = '{$productPrice}', updated_at = '{$currentTimestamp}' WHERE id = '{$id}'";
                $updateQuery = mysqli_query($con, $update);
                if ($updateQuery){
                    $errors['update'] = false;
                } else {
                    $errors['update'] = true;
                }
                // Now you can use $id as needed
                break;

                case "DELETE":
                    $information2 = json_decode(file_get_contents('php://input'), true);
                    $deleteId = $information2['id'];
                    
                    $delete = "DELETE FROM products WHERE id = '{$deleteId}'";
                    $deleteQuery = mysqli_query($con, $delete);
                    if ($deleteQuery) {
                        # code...
                        $errors['delete'] = false;
                    } else {
                        $errors['delete'] = true;    
                    }
                    break;

        default:
            # code...
            break;
    }
        $data['errors'] = $errors;
        echo json_encode($data);
        mysqli_close($con);
    // }
?>