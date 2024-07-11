<?php
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
    </style>
</head>
<body>
        <div id="box" class="bg-white border-0 text-primary bg-primary vh-100 d-flex align-items-center justify-content-center flex-column">
            <div id="userCU" class="max-w-50 w-100 min-h-50 bg-primary">
                <h1 class="h1 text-center fw-bolder text-white">OTP Verification</h1>

                <p class="text-center fw-bold text-white">OTP is sent to your registered otp and valid for only 4 minutes </p>
                
                <div id="otpBox" class="userBox d-flex align-items-center m-3">
                    <label for="otp">
                        <i class="fas fa-key"></i>
                    </label>
                        <input type="text" name="otp" id="otp" class="userInput text-primary fw-bolder" placeholder="Enter OTP here">
                </div>                

                <div id="submitBox" class="d-flex justify-content-center m-3">
                    <button type="button" id="btn" class="btn btn-success w-50 rounded-3 fw-bolder text-white" value="signUp">Verify</button>
                </div>
            
                <!-- <div class="w-100">
                    <button type="button" class="btn bg-white m-2 border-0">
                        <a href="forgotPassword.php" class="text-primary fw-bolder text-decoration-none">Back</a>
                    </button>
                </div> -->
                
                <div id="errorsDisplay"></div>
            </div>
        </div>
<script>
    $(document).ready(function() {
        const otp = $('#otp');

        const otpBox = $('#otpBox');
        
        const errorsDisplay = $('#errorsDisplay');

        const btn = $('#btn');

        btn.on('click', ()=>{
            if (otp.val().length<1) {
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Enter fields with red border </p>');
                    otpBox.css({'border': '2.5px solid var(--bs-danger)'}); 
                } else {
                    const afterPost = (data)=>{
                        errorsDisplay.empty();
                        // console.log(data)
                        const item = JSON.parse(data);
                        console.log(item);
                        if (item.errors.timeout != undefined) {
                            errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> OTP has expired </p>');
                        } else if (item.errors.invalid != undefined && item.errors.invalid == true) {
                            errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Entered OTP is invalid </p>');
                        } else if (item.errors.invalid != undefined && item.errors.invalid == false) {
                            otpBox.css({'border': 'none'});
                            location.href = "changePassword.php";
                        }
                    };
                    $.post('otpLogic.php', {otp:otp.val(), user:'<?=$_SESSION['name'];?>'}, "json").then(afterPost);
                }
        });
    });
</script>
</body>
</html>
        <?php
    } else {
        header('location:index.php');
    }
?>