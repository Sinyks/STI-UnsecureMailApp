<?php
include_once ('./fragements/header.php');
?>

<div class="starter-template">
    <h1> Welcome to the  beautiful index page</h1>
    <?php
    try {

        // Create (connect to) SQLite database in file
        $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
        // Set errormode to exceptions
        $file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $result = $singleton->getUsers();

    print_r($result);

    ?>

</div>

<?php include_once ('./fragements/footer.php'); ?>
