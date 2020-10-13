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

<div class='col-sm text-center p-3 mb-2'>

    <button type='button' class='btn btn-primary btn-lg'>
        Ajouter un nouveau collaborateur
    </button>
</div>


<?php foreach ($result

as $user) { ?>
<div class='row p-3 mb-2 align-items-center bg-info text-white'>

    <div class='col-sm text-center'>

        <bold class='font-weight-bold'>
            Utilisateur</br>
        </bold>

        <?php echo $user->Username; ?>

    </div>
    <div class='col-sm text-center'>


        <bold class='font-weight-bold'>
            Validité</br>
        </bold>

        <?php
        if ($user->Validity == 1) {
            echo "oui";
        } else {
            echo "non";
        }
        ?>
    </div>
    <div class='col-sm text-center'>

        <bold class='font-weight-bold'>
            Mot de passe Hashé?</br>
        </bold>

        <?php echo $user->Password; ?>

    </div>
    <div class='col-sm text-center'>

        <bold class='font-weight-bold'>
            Admin</br>
        </bold>
        <?php
        if ($user->HasAdminPrivilege) {
            echo "Admin";
        } else {
            echo "Collaborateur";
        }
        ?>

    </div>

    <div class='col-sm text-center'>

        <button type='button' class='btn btn-warning'>
            Modifier
        </button>

    </div>

    <div class='col-sm text-center'>


        <form action='/account/adminAction/adminActionDeleteUser.php' method='get'>
            <button type='submit' class='btn btn-danger' name='id' value='$user->id'>
                Supprimer
            </button>
        </form>

    </div>
</div>

    <?php }//end foreach ?>
</div>



</body>


<?php include_once('./fragements/footer.php'); ?>




