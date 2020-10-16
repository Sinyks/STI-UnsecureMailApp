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
    $_SESSION['message'] = $e->getMessage();
    header("location: error.php");
    exit;

}

?>

<?php
try {
    $singleton->createUser($_POST["username"],$_POST["passwordUnhashed"],$_POST["validityRadios"],$_POST["adminRadios"]);
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();
    header("location: error.php");
    exit;
}
 header("location: ./administration.php");
?>


