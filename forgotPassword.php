<?php
    session_start();
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require_once('database/db.php');
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['name'])) {
        # code...
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            # code...
            $getUser = "SELECT * FROM users where username = '{$_SESSION['name']}'";
            $userQuery = mysqli_query($con, $getUser);
            $row = mysqli_fetch_assoc($userQuery);

            // $email = $row['email'];
            $pass = "1111";
            // $subject = 'Password Reset OTP';
            // $message = ';
            // $headers = 'From: vipssawant842@gmail.com.';
            
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';
            require 'PHPMailer/src/Exception.php';

            $mail = new PHPMailer(true);
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  

            $mail->Username = "vipssawant842@gmail.com"; // GMAIL username

            $mail->Password = "heuinxouxqfcnjky"; // GMAIL password
            $mail->SMTPSecure = "ssl";  

            $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $mail->Port = "465"; // set the SMTP port for the GMAIL server

            $mail->From= 'vipssawant842@gmail.com';
            $mail->FromName='SenderName';
            $mail->AddAddress($row['email'], $row['name']);
            $mail->Subject  =  'EMAIL SUBJECT';
            $mail->IsHTML(true);
            $mail->Body    = "

                Dear ".$row['name'].", <br><br>

                Your OTP for password reset is: '.$pass. <br><br>

                Regards";

            // Temporary fix, remove if SSL available
            $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
            );

            try {
            $mail->Send();

            // Sent Successfully
                $nowTime = time();
                $otpTime = strtotime('+4 minutes', $nowTime);
                $futureTime = date('Y-m-d H:i:s', $otpTime);
                $insert = "UPDATE users set otp = '{$pass}', otpExpiry = '{$futureTime}' WHERE username = '{$_SESSION['name']}'";
                $insertQuery = mysqli_query($con, $insert);
                if ($insertQuery) {
                    # code...
                    header('location:otp.php');
                }
            
            }catch (Exception $e) {
            echo "Mail Error - >".$mail->ErrorInfo;
            }
            // $mail = mail($email, $subject, $message, $headers);
            // if ($mail) {
                # code...
            }
        // }
    } else {
        header('location:index.php');
    }
?>