<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['name'])) {
    # code..<!DOCTYPE html>
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bd7ed34274.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        .min-h-100{
            min-height: 100vh;
            height: auto;
        }
    </style>

</head>
<body>
    
    <div id="box" class="bg-white border-0 text-primary bg-primary d-flex align-items-center justify-content-center flex-column min-h-100">
        <h1 class="h1 text-center fw-bolder text-primary m-5">
            Users List
        </h1>
        <?php

        require_once('database/db.php');

        $getList = "SELECT * FROM users";
        $listQuery = mysqli_query($con, $getList);
        echo "<table class='table w-100'> <tr> <th>Id</th> <th>Name</th> <th>E-mail</th> <th>Username</th> <th> Added On </th> <th> Updated On </th> <th colspan='2' class='text-center'> Actions </th> </tr>";
        while ($listRow = mysqli_fetch_assoc($listQuery)) {
            # code...
            $date = date("d/m/Y", strtotime($listRow["created_at"]));
            $date2 = date("d/m/Y", strtotime($listRow["updated_at"]));
            // echo $date;
            echo "<tr>";
                echo "<td>{$listRow['id']}</td>";
                echo "<td>{$listRow['name']}</td>";
                echo "<td>{$listRow['email']}</td>";
                echo "<td>{$listRow['username']}</td>";
                echo "<td>{$date}</td>";
                echo "<td>{$date2}</td>";
                // echo "<td>{$date}</td>";
                // echo "<td>{$date}</td>";
                echo("<td class='text-center'><button type='button' class='btn edit btn-success w-50 text-white fw-bolder'>Edit</button></td>");
                echo("<td class='text-center'><button type='button' class='btn delete btn-danger w-50 text-white fw-bolder'>Delete</button></td>");
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
        <div class="w-100">
            <button type="button" class="btn btn-primary border-0" style="margin: 12px">
                <a href="welcome.php" class="text-white fw-bolder text-decoration-none">Back</a>
            </button>
        </div>
        <div id="errorsDisplay"></div>
    </div>
<script>
    $(document).ready(function() {
        const errorsDisplay = $('#errorsDisplay');
        const edit = $('.edit');
        // console.log(edit);
        edit.each((index,element) => {
            // console.log(element);
            $(element).on('click', (event)=>{
            const value = encodeURIComponent(event.target.parentNode.parentNode.firstChild.textContent);
            // console.log(value);
            const afterPost = (data)=>{
                console.log(data);
            };
            window.location.href = "edit.php?id="+value;
        });
        });
        const empty = $('.delete');
        // console.log(empty);
        
        empty.each((index,element) => {
            // console.log(element);
            $(element).on('click', (event)=>{
                const value = event.target.parentNode.parentNode.firstChild.textContent;
                alert('Are you sure to delete it?');
                const afterPost = (data)=>{
                    console.log(data);
                    if (data.delete == undefined) {
                        errorsDisplay.html('<p class="text-center text-success fw-bolder"> User Deleted Successfully </p>');

                        setTimeout(function() {
                            // Reload the page
                            location.reload();
                        }, 2000);

                    } else if (data.delete != undefined) {
                        errorsDisplay.html('<p class="text-center text-danger fw-bolder"> User could not be Deleted </p>');
                    }
                };
            $.post('delete.php', {id:value}, "json").then(afterPost);
            });
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