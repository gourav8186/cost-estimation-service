<?php include('header.php');  ?>
<section class="container py-3">
    <div class="row mx-auto">
        <?php 
         include('includes/workplace/side-panel.php'); ?>
        <main class="col-lg-9 col-sm-12 mx-auto ps-4">
            <?php include($filePath); ?>
        </main>
    </div>
</section>