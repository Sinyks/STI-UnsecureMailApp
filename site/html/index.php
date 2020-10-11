<?php
include_once ('./fragements/header.php');
?>

<div class="starter-template">
    <h1> Welcome to the  beautiful index page</h1>
    <?php

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        echo "<h3>you are logged in</h3>";
        if ($singleton->isAdmin($_SESSION["id"])){
            echo "<h4>Your are admin</h4>";
        }
    }

    ?>

</div>

<?php include_once ('./fragements/footer.php'); ?>
