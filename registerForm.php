<?php
    $currentPage = explode('/', $_SERVER['PHP_SELF']);
?>
<form action="" method="post" id="form">

<?php 
    if ($currentPage[2] == "register.php") {
        # code...
    ?>
    <div id="emailBox" class="userBox d-flex align-items-center m-3">
        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
            <input type="email" name="email" id="email" class="userInput text-primary fw-bolder" pattern=".+@example\.com" placeholder="Enter your email here">
    </div>
    <?php
    }
?>
    <div id="userNameBox" class="userBox d-flex align-items-center m-3">
        <label for="userName">
            <i class="fa fas fa-user"></i>
        </label>
            <input type="text" name="userName" id="userName" class="userInput text-primary fw-bolder" placeholder="Create a username">
    </div>

    <div id="passBox" class="userBox d-flex align-items-center m-3">
        <label for="pass">
            <i class="fa fas fa-lock"></i>
        </label>
            <input type="password" name="pass" id="pass" class="userInput text-primary fw-bolder" placeholder="Create a password">
    </div>
 </form>