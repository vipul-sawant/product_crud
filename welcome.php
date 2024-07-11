<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bd7ed34274.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script><style>
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
        .max-h-50{
            max-height: 50%;
        }
        .max-w-50{
            max-width: 50% !important;
        }
        .max-w-25{
            max-width: 25% !important;
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
        .card{
            width: 45%;
        }
    </style>
</head>
<body>
    <?php
        if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['name'])) {
            # code...
        ?>
        
    <div class="container-fluid vh-100 d-flex  align-items-center">
        <div class="sidebar h-100 max-w-25 bg-warning w-100 d-flex align-items-center justify-content-center text-center" style="margin-right:12px;">
            <a href="forgotPassword.php" id="link" class="text-decoration-none h1 text-white">Forgot Password</a>
        </div>
        <div id="userCU" class="w-100 h-100 min-h-50 bg-primary d-flex flex-column">
            <h1 class="h1 text-center fw-bolder text-white">Welcome, <?=$_SESSION['name'];?></h1>
            <div class="text-end m-2">
                <a href="logout.php" class="text-white text-decoration-none fw-bolder">Logout</a>
            </div>

            <div class="flex-fill d-flex justify-content-between m-2">
                
                <div class="card border-0">
                    <button type="button" class="w-100 h-100 btn">
                        <a href="add.php" class="text-decoration-none fw-bolder text-primary w-100 h-100 d-flex align-items-center justify-content-center" style="font-size:2.5rem;">Add User</a>
                    </button>
                </div>
                <div class="card border-0">
                    <button type="button" class="w-100 h-100 btn">
                        <a href="list.php" class="text-decoration-none fw-bolder text-primary w-100 h-100 d-flex align-items-center justify-content-center" style="font-size:2.5rem;">Manage Users</a>
                    </button>
                </div>
            </div>

            <div class="flex-fill d-flex justify-content-between m-2">
                
                <div class="card border-0">
                    <button type="button" class="w-100 h-100 btn">
                        <a href="products/add.php" class="text-decoration-none fw-bolder text-primary w-100 h-100 d-flex align-items-center justify-content-center" style="font-size:2.5rem;">Add Product</a>
                    </button>
                </div>
                <div class="card border-0">
                    <button type="button" class="w-100 h-100 btn">
                        <a href="products/list.php" class="text-decoration-none fw-bolder text-primary w-100 h-100 d-flex align-items-center justify-content-center" style="font-size:2.5rem;">Manage Products</a>
                    </button>
                </div>
            </div>
            <div class="card border-0 d-flex justify-content-center w-100 text-center">
                <div class="card border-0">
                    <button type="button" class="w-100 h-100 btn">
                        <a href="products/single.php" class="text-decoration-none fw-bolder text-primary w-100 h-100 d-flex align-items-center justify-content-center" style="font-size:2.5rem;">Get Product</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <?php
        } else {
            // <head></head>
            header("location: index.php");
        }
    ?>

    <!-- <script>
        $(document).ready(function() {
            const link = $('#link');

            link.on('click', (e)=>{
                e.preventDefault();
                // console.log('hi');
                const username = encodeURIComponent('<?=$_SESSION['name'];?>');
                window.location.href = 'forgotPassword.php?username='+username;
            });

        });
    </script> -->

</body>
</html>