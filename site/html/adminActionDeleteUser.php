<?php
include_once('./fragements/header.php');
?>


<body class="starter-template">
<h1> Espace Administrateur</h1>
<?php
try {

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div>
    salut
<?php
try {
    $singleton->deleteUserById(6);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
    salut
</div>


