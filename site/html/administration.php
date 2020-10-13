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
                    <h5 class="modal-title " id="createModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    create form?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form action='/index.php' method='get'>
                        <button type="submit" class="btn btn-primary" name='id' value='69'>Creer</button>
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
                echo "oui";
            } else {
                echo "non";
            }
            ?>
        </div>
        <div class='col-sm text-center text-white'>

            <bold class='font-weight-bold'>
                Mot de passe Hashé?</br>
            </bold>

            <?php echo $user->Password; ?>

        </div>
        <div class='col-sm text-center text-white'>

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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal<?php echo $user->id?>">
                Modifier
            </button>

            <!-- Modal -->
            <div class="modal fade" id="updateModal<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="updateModal<?php echo $user->id?>Label"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="updateModal<?php echo $user->id?>Label"><?php echo $user->Username ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            inserer form ici ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form action='/index.php' method='post'> <!-- voir comment faire un post-->
                                <button type="submit" class="btn btn-primary" name='id' value='<?php echo $user->id?>'>Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class='col-sm text-center'>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $user->id?>">
                Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $user->id?>Label"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="deleteModal<?php echo $user->id?>Label">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Etes-vous certain-e de vouloir supprimer <?php echo $user->Username ?> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form action='/index.php' method='get'>
                                <button type="submit" class="btn btn-primary" name='id' value='<?php echo $user->id?>'>Supprimer</button>
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




