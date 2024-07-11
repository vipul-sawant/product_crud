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
                <h1 class="h1 text-center fw-bolder text-white">Users Login</h1>
            
                <div class="w-100 text-center">
                    <button type="button" class="btn bg-white m-2 border-0 w-50 min-h-50">
                        <a href="signIn.php" class="text-primary fw-bolder text-decoration-none w-100 h-100">Sign In</a>
                    </button>
                </div>
                
                <div id="errorsDisplay"></div>
            </div>
        </div>
<script>
    $(document).ready(function() {
        const pass = $('#pass');
        const userName = $('#userName');

        const passBox = $('#passBox');
        const userNameBox = $('#userNameBox');
        
        const errorsDisplay = $('#errorsDisplay');

        const btn = $('#btn');

        btn.on('click', ()=>{
            const afterPost = (data)=>{
                errorsDisplay.empty();
                const item = JSON.parse(data);
                console.log(item);

                if (Object.keys(item.errors.empty).length > 0) {
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Enter fields with red border </p>');
                }

                if (item.errors.empty.userName != undefined) {
                    // console.log('uName is empty');
                    userNameBox.css({'border': '2.5px solid var(--bs-danger)'});   
                } else if(item.errors.userName != undefined) {
                    // userNameBox.css({'border': 'none'});
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Wrong user name </p>');
                } else if(item.errors.pass != undefined && item.errors.pass == true) {
                    // userNameBox.css({'border': 'none'});
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Wrong password </p>');
                } else if(item.errors.pass != undefined && item.errors.pass == false) {
                    // userNameBox.css({'border': 'none'});
                    // errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Wrong password </p>');
                    location.href = "welcome.php";
                }

                if (item.errors.empty.pass != undefined) {
                    // console.log('uName is empty');
                    passBox.css({'border': '2.5px solid var(--bs-danger)'});   
                } else {
                    passBox.css({'border': 'none'});
                }


            };
            $.post('login.php', {pass:pass.val(), userName:userName.val()}, "json").then(afterPost);
        });
    });
</script>
</body>
</html>