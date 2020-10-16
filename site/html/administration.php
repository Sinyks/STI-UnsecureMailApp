<?php
include_once('./fragements/header.php');
?>

<?php

if (empty($_SESSION) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {

    header("location: ./index.php");
    exit;
} else {
    if (!$singleton->isAdmin($_SESSION["id"])) {
        header("location: ./dashboard.php");
        exit;
    }
}


?>


<body class="starter-template">
<h1 class="text-center"> Espace Administrateur</h1>
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
                        <button type="submit" class="btn btn-primary">Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php foreach ($result

                   as $user) { ?>
        <div class="row p-3 align-items-center bg-secondary">

            <div class="col-sm text-center text-white">

                <bold class="font-weight-bold">
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


                <a class="btn btn-warning" data-toggle="collapse" href="#collapse<?php echo $user->id ?>update"
                   role="button"
                   aria-expanded="false" aria-controls="collapse<?php echo $user->id ?>update">Modifier
                </a>


            </div>


            <div class='col-sm text-center'>

                <button class="btn btn-danger" type="button" data-toggle="collapse"
                        data-target="#collapse<?php echo $user->id ?>delete" aria-expanded="false"
                        aria-controls="collapse<?php echo $user->id ?>delete">Supprimer
                </button>
            </div>
        </div>


        <div class="row p-3  ">
            <div class='col-sm text-center'>
                <div class="collapse multi-collapse" id="collapse<?php echo $user->id ?>update">
                    <div class="card card-body">
                        <form action="./update_user_action.php" method="post">
                            <div>

                                <?php
                                include('./form/userFormUpdate.php');
                                ?>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-warning">
                                    Modifier
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class='col-sm text-center'>
                <div class="collapse multi-collapse" id="collapse<?php echo $user->id ?>delete">
                    <div class="card card-body ">


                        <div>
                            Etes-vous certain-e de vouloir supprimer <?php echo $user->Username ?> ?
                        </div>
                        <div>
                            <form action='/delete_user_action.php' method='get'>
                                <button type="submit" class="btn btn-danger" name='id' value='<?php echo $user->id ?>'>
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    <?php }//end foreach ?>
</div>

</body>


<?php include_once('./fragements/footer.php'); ?>




