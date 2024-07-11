<?php
    $currentPage = explode('/', $_SERVER['PHP_SELF']);
?>
    <form action="" method="post" id="form">

    <?php 
        if ($currentPage[2] == "edit.php") {
            # code...
    ?>
        
        <div id="idBox" class="userBox d-flex align-items-center m-3">
            <label for="id">
                <i class="fas fa-id-badge"></i>
            </label>
                <!-- <input type="text" name="uName" id="uName" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                <p id="id" name="id" id="id" class="userInput text-primary fw-bolder m-0"> <?=$userRow['id'];?> </p>
        </div>
    <?php
        }
    ?>

        <div id="uNameBox" class="userBox d-flex align-items-center m-3">
            <label for="uName">
                <i class="fa fas fa-user"></i>
            </label>
                <input type="text" name="uName" id="uName" class="userInput text-primary fw-bolder" placeholder="Enter Name" value="<?php if ($currentPage[2] == "edit.php") {
                    # code...
                    echo $userRow['name'];
                } ?>">
        </div>

        <div id="emailBox" class="userBox d-flex align-items-center m-3">
            <label for="email">
                <i class="fas fa-envelope"></i>
            </label>
                <input type="email" name="email" id="email" class="userInput text-primary fw-bolder" pattern=".+@example\.com" placeholder="Enter your email here" value="<?php if ($currentPage[2] == "edit.php") {
                    # code...
                    echo $userRow['email'];
                } ?>">
        </div>

    </form>