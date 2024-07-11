<script>
    $(document).ready(function() {
    const name = $('#name');
    const info = $('#info');
    const price = $('#price');
    
    const nameBox = $('#nameBox');
    const infoBox = $('#infoBox');
    const priceBox = $('#priceBox');

    <?php
        if ($currentPage[3] == "edit.php") {
    ?>
    const id = $('#id');
    <?php        
        }
    ?>

    const btn = $('#btn');
    const errorsDisplay = $('#errorsDisplay');

    btn.on('click', (event)=>{
        errorsDisplay.empty();
        if (name.val().length < 1 || price.val() <= 0) {
            errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Enter fields with red border </p>');
        }
        if (name.val().length < 1){
            nameBox.css({'border': '2.5px solid var(--bs-danger)'});
        } else {
            nameBox.css({'border': 'none'});
        }
        if (price.val() <= 0){
            priceBox.css({'border': '2.5px solid var(--bs-danger)'});
        } else {
            priceBox.css({'border': 'none'});
        }
        if (name.val().length > 0 && price.val() > 0) {
            const after = (data)=>{
                const item = JSON.parse(data);
                console.log(item);

                <?php 
                   if ($currentPage[3] == "add.php") {
                    ?>
                    if (item.errors.insert != undefined && item.errors.insert == true) {
                        errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Something went wrong </p>');
                    } else if (item.errors.insert != undefined && item.errors.insert == false) {
                        errorsDisplay.html('<p class="text-center fw-bolder text-success h3 m-3"> Product Added Successfully!! </p>');
                        setTimeout(()=>{
                            location.reload();
                        }, 2000);
                    }
                    <?php
                   }
                ?>
                <?php 
                   if ($currentPage[3] == "edit.php") {
                    ?>
                    if (item.errors.update != undefined && item.errors.update == true) {
                        errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Something went wrong </p>');
                    } else if (item.errors.update != undefined && item.errors.update == false) {
                        errorsDisplay.html('<p class="text-center fw-bolder text-success h3 m-3"> Product edited Successfully!! </p>');
                        setTimeout(()=>{
                            // location.reload();
                            location.href = "list.php";
                        }, 2000);
                    }
                    <?php
                   }
                ?>
            };

            <?php
                if ($currentPage[3] == "add.php") {?>

                    $.post('apiLogic.php', {name:name.val(), info:info.val(), price:price.val()}, "json").then(after);
                <?php
                }
            ?>

            <?php
                if ($currentPage[3] == "edit.php") {?>

                    // $.put('apiLogic.php', {id:id.text(),name:name.val(), info:info.val(), price:price.val()}, "json").then(after);
                    const newData = {id:id.text(),name:name.val(), info:info.val(), price:price.val()};
                    $.ajax({
                        url: 'apiLogic.php',
                        type: 'PUT',
                        contentType: 'application/json',
                        data: JSON.stringify(newData),
                        success: after,
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error('PUT request failed:', error);
                        }
    });
                <?php
                }
            ?>
            
        }
    });
});
</script>