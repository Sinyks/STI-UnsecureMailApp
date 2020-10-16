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


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createModal">
        Ajouter un nouveau collaborateur
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="createModalLabel">Nouvel utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="./create_user_action.php" method="post">

                    <div class="modal-body">

                        <?php
                        include('./form/userFormCreate.php');
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" >Creer</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


<?php foreach ($result as $user) { ?>
    <div class='row p-3 mb-2 align-items-center bg-info'>

        <div class='col-sm text-center text-white'>

            <bold class='font-weight-bold'>
                Utilisateur</br>
            </bold>

            <?php echo $user->Username; ?>

        </div>
        <div class='col-sm text-center text-white'>


            <bold class='font-weight-bold'>
                Validité</br>
            </bold>

            <?php
            if ($user->Validity == 1) {
                echo "Valide";
            } else {
                echo "Invalide";
            }
            ?>
        </div>
        <div class='col-sm text-center text-white'>

            <bold class='font-weight-bold'>
                Hash du mot de passe</br>
            </bold>

            <?php echo $user->Password; ?>

        </div>
        <div class='col-sm text-center text-white'>

            <bold class='font-weight-bold'>
                Type d'utilisateur</br>
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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#updateModal<?php echo $user->id ?>">
                Modifier
            </button>

            <!-- Modal -->
            <div class="modal fade" id="updateModal<?php echo $user->id ?>" tabindex="-1" role="dialog"
                 aria-labelledby="updateModal<?php echo $user->id ?>Label"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title "
                                id="updateModal<?php echo $user->id ?>Label"><?php echo $user->Username ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="./update_user_action.php" method="post">

                            <div class="modal-body">

                                <?php
                                include('./form/userFormUpdate.php');
                                ?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class='col-sm text-center'>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#deleteModal<?php echo $user->id ?>">
            Supprimer
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal<?php echo $user->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="deleteModal<?php echo $user->id ?>Label"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="deleteModal<?php echo $user->id ?>Label">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Etes-vous certain-e de vouloir supprimer <?php echo $user->Username ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <form action='/delete_user_action.php' method='get'>
                            <button type="submit" class="btn btn-primary" name='id' value='<?php echo $user->id ?>'>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php }//end foreach ?>
</div>


</body>


<?php include_once('./fragements/footer.php'); ?>




