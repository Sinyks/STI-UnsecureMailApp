<?php
include_once("utility.php");
?>

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

<?php
try {
    $singleton->deleteUserById($_GET["id"]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("location: ./administration.php");
?>


