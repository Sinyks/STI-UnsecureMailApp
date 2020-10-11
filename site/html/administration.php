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

$result = $singleton->getUsers();

?>

<?php

echo "<body>";

echo "<div class='col-sm text-center p-3 mb-2'>";

echo "<button type='button' class='btn btn-primary btn-lg'>";
echo "Ajouter un nouveau collaborateur";
echo "</button>";
echo "</div>";


foreach ($result as $user) {
    echo "<div class='row p-3 mb-2 align-items-center bg-info text-white'>";

    echo "<div class='col-sm text-center'>";

    echo "<bold class='font-weight-bold'>";
    echo "Utilisateur</br>"; // non modifiable
    echo "</bold>";

    echo $user->Username . " ";


    echo "</div>";
    echo "<div class='col-sm text-center'>";


    echo "<bold class='font-weight-bold'>";
    echo "Validité</br>";
    echo "</bold>";


    if ($user->Validity == 1) {
        echo "oui ";
    } else {
        echo "non ";
    }

    echo "</div>";
    echo "<div class='col-sm text-center'>";

    echo "<bold class='font-weight-bold'>";
    echo "Mot de passe Hashé?</br>";
    echo "</bold>";

    echo $user->Password . " ";

    echo "</div>";
    echo "<div class='col-sm text-center'>";

    echo "<bold class='font-weight-bold'>";
    echo "Admin</br>";
    echo "</bold>";

    if ($user->HasAdminPrivilege == 1) {
        echo "Admin";
    } else {
        echo "Collaborateur ";
    }


    echo "</div>";

    echo "<div class='col-sm text-center'>";


    echo "<button type='button' class='btn btn-warning'>";
    echo "Modifier";
    echo "</button>";

    echo "</div>";

    echo "<div class='col-sm text-center'>";


    echo "<button type='button' class='btn btn-danger'>";
    echo "Supprimer";
    echo "</button>";

    echo "</div>";


    echo "</div>";

}

echo "</div>";


?>

</body>


<?php include_once('./fragements/footer.php'); ?>




