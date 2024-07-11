<script>
    $(document).ready(function() {
    const uName = $('#uName');
    const email = $('#email');
    
    const uNameBox = $('#uNameBox');
    const emailBox = $('#emailBox');

    const btn = $('#btn');
    const errorsDisplay = $('#errorsDisplay');

    btn.on('click', (event)=>{
        const afterPost = (data)=>{
            // console.log(data);
            const item = JSON.parse(data);
            console.log(item);
            errorsDisplay.empty();
            // if (item.errors.empty != undefined) {
                // console.log('empty');
                // errorsDisplay.html('<p class="fw-bolder text-danger h3 m-3"> Enter fields with red border </p>');
                if (item.errors.empty.uName != undefined) {
                    // console.log('uName is empty');
                    uNameBox.css({'border': '2.5px solid var(--bs-danger)'});   
                } else {
                    uNameBox.css({'border': 'none'});
                }
                
                if (item.errors.empty.email != undefined) {
                    // console.log('uName is empty');
                    emailBox.css({'border': '2.5px solid var(--bs-danger)'});   
                } else {if (item.errors.email != undefined && item.errors.email == true) {
                    console.log('duplicate');
                    emailBox.css({'border': '2.5px solid var(--bs-danger) !important'});
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Email exist for different account </p>');
                } else if (item.errors.email != undefined && item.errors.email == false)  {
                    emailBox.css({'border': 'none'});
                    <?php if ($currentPage[2] == "add.php") {
                    ?>
                        if (item.errors.add == true) {
                            errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> User Register failed </p>');
                        } else if (item.errors.add == false) {
                            errorsDisplay.html('<p class="text-center fw-bolder text-success h3 m-3"> User Registered successfully </p>');
                                setTimeout(function() {
                                    // Reload the page
                                    location.reload();
                                }, 2000);
                        }
                    <?php
                    }
                    ?>
                    <?php if ($currentPage[2] == "edit.php") {
                    ?>
                        if (item.errors.edit == true) {
                            errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> User Updation failed </p>');
                        } else if (item.errors.edit == false) {
                            console.log('edit success');
                            errorsDisplay.html('<p class="text-center fw-bolder text-success h3 m-3"> User details Updated successfully. </p>');
                            setTimeout(function() {
                                // Reload the page
                                // location.reload();
                                window.location.href = 'list.php';
                            }, 2000);
                        }
                    <?php
                    }
                    ?>
                }
                    // emailBox.css({'border': 'none'});
                }

                if (Object.keys(item.errors.empty).length > 0) {
                    errorsDisplay.html('<p class="text-center fw-bolder text-danger h3 m-3"> Enter fields with red border </p>');
                }

        };

        <?php
            if ($currentPage[2] == "add.php") {
        ?>
        $.post('CULogic.php', {uName:uName.val(), email:email.val(), op:btn.val()}, "json").then(afterPost);
        <?php
            } else if ($currentPage[2] == "edit.php") {
                ?>
                const id = $('#id');
                $.post('CULogic.php', {uName:uName.val(), id:id.text(), email:email.val(), op:btn.val()}, "json").then(afterPost);
        <?php
            }
        ?>
        
    });
});
</script>