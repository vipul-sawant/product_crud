<?php
    $currentPage = explode('/', $_SERVER['PHP_SELF']);
    // print_r($currentPage);
?>
    <form action="" method="post" id="form">

    <?php 
        if ($currentPage[3] == "edit.php") {
            # code...
    ?>
        
        <div id="idBox" class="userBox d-flex align-items-center m-3">
            <label for="id">
                <i class="fas fa-id-badge"></i>
            </label>
                <!-- <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name"> -->
                <p id="id" name="id" id="id" class="userInput text-primary fw-bolder m-0"> <?=$productRow['id'];?> </p>
        </div>
    <?php
        }
    ?>

        <div id="nameBox" class="userBox d-flex align-items-center m-3">
            <label for="name">
                <i class="fas fa-box"></i>
            </label>
                <input type="text" name="name" id="name" class="userInput text-primary fw-bolder" placeholder="Enter Name" value="<?php if ($currentPage[3] == "edit.php") {
                    # code...
                    echo $productRow['name'];
                } ?>">
        </div>

        <div id="infoBox" class="userBox d-flex align-items-center m-3">
            <label for="info">
                <!-- <i class="fas fa-circle-info"></i> -->
                <i class="fas fa-info"></i>
            </label>
                <input type="text" name="info" id="info" class="userInput text-primary fw-bolder" placeholder="Enter product info here" value="<?php if ($currentPage[3] == "edit.php") {
                    # code...
                    echo $productRow['info'];
                } ?>">
        </div>

        <div id="priceBox" class="userBox d-flex align-items-center m-3">
            <label for="price">
                <!-- <i class="fas fa-circle-info"></i> -->
                <!-- <i class="fas fa-indian-rupee-sign"></i> -->
                <i class="fas fa-rupee-sign"></i>
            </label>
                <input type="number" name="price" id="price" class="userInput text-primary fw-bolder" placeholder="Enter product price here" value="<?php if ($currentPage[3] == "edit.php") {
                    # code...
                    echo $productRow['price'];
                } ?>">
        </div>

    </form>