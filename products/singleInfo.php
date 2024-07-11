<?php
// echo "HELLO";
require_once('../database/db.php');
session_start();
if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['name'])) {
    # code..
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bd7ed34274.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0px;
            padding: 0px;
        }
        #userCU{
            padding: 12px;
        }
        .min-h-50{
            min-height: 50%;
        }
        .max-w-50{
            max-width: 50% !important;
        }
        .userBox{
            border: 0.5px solid #999;
            padding: 10px;
            border-radius: 10px;
            background-color: white;
        }
        .userInput{
            border: none;
            outline: none;
            padding: 12px;
            width: 100%;
        }
        ::placeholder{
            color: var(--bs-primary);
            font-weight: 550;
        }
        .label{
            color:white;
            font-weight: bolder;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- <div class="conatiner-flud bg-primary vh-100 d-flex align-items-center justify-content-center"> -->
        <div id="box" class="bg-white border-0 text-primary bg-primary d-flex align-items-center justify-content-center flex-column">
            <div id="userCU" class="max-w-50 w-100 min-h-50 bg-primary flex-fill">
                <h1 class="h1 text-center fw-bolder text-white m-2">Product Details</h1>
            <div>
                <p class="label m-3">
                    Id : 
                </p>
            </div>
                <div id="idBox" class="userBox d-flex align-items-center m-3">
                    <label for="id">
                        <i class="fas fa-id-badge"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="id" name="id" id="id" class="userInput text-primary fw-bolder m-0"> <?=$_GET['id'];?> </p>
                </div>
            <div>
                <p class="label m-3">
                    Name : 
                </p>
            </div>
                <div id="nameBox" class="userBox d-flex align-items-center m-3">
                    <label for="name">
                        <!-- <i class="fas fa-id-badge"></i> -->
                        <i class="fab fa-product-hunt"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="name" name="name" id="name" class="userInput text-primary fw-bolder m-0"> <?=$_GET['name'];?> </p>
                </div>
            <div>
                <p class="label m-3">
                    Info : 
                </p>
            </div>

                <div id="infoBox" class="userBox d-flex align-items-center m-3">
                    <label for="info">
                        <!-- <i class="fas fa-id-badge"></i> -->
                        <i class="fas fa-info"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="info" name="info" id="info" class="userInput text-primary fw-bolder m-0"> <?=$_GET['info'];?> </p>
                </div>

            <div>
                <p class="label m-3">
                    Price : 
                </p>
            </div>

                <div id="priceBox" class="userBox d-flex align-items-center m-3">
                    <label for="id">
                        <!-- <i class="fas fa-id-badge"></i> -->
                        <i class="fas fa-rupee-sign"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="info" name="info" id="info" class="userInput text-primary fw-bolder m-0"> <?=$_GET['price'];?> </p>
                </div>

            <div>
                <p class="label m-3">
                    Added On : 
                </p>
            </div>
                <div id="createBox" class="userBox d-flex align-items-center m-3">
                    <label for="create">
                        <!-- <i class="fas fa-id-badge"></i> -->
                        <!-- <i class="fas fa-calendar-days"></i> -->
                        <!-- <i class="far fa-calendar-days"></i> -->
                        <i class="fas fa-calendar"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="create" name="create" id="create" class="userInput text-primary fw-bolder m-0"> <?=$_GET['create'];?> </p>
                </div>

            <div>
                <p class="label m-3">
                    Updated On : 
                </p>
            </div>
                <div id="updateBox" class="userBox d-flex align-items-center m-3">
                    <label for="update">
                        <!-- <i class="fas fa-id-badge"></i> -->
                        <i class="fas fa-calendar"></i>
                    </label>
                        <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                        <p id="update" name="update" id="update" class="userInput text-primary fw-bolder m-0"> <?= $_GET['update'];?> </p>
                </div>

                <div class="w-100">
                    <button type="button" class="btn bg-white m-2 border-0">
                        <a href="../welcome.php" class="text-primary fw-bolder text-decoration-none">Back</a>
                    </button>
                </div>
            </div>
        </div>

</body>
</html>
<?php
    } else {
        header('location:../index.php');
    }
?>