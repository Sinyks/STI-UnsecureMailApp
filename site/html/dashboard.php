<?php
include('./fragements/header.php');
if (empty($_SESSION) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
    header("location: ./loginForm.php");
    exit;
}

$id = $_SESSION['id'];
try {
    $messages = $singleton->getReceivedMessagesByReceiverId($id);
}catch (PDOException $e){
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}
?>

<h2 class="text-center">Mes messages</h2>

<div id="accordion">
    <?php foreach ($messages as $message){
    $collapse = "contentMsg".$message->id; ?>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="<?php echo "#".$collapse ?>" aria-expanded="true" aria-controls="<?php echo $collapse?>">
                    <?php
                    try {
                        $nameSender = $singleton->getUsernameById($message->Sender);

                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                    echo "Sujet: ".$message->Subject."</br> De : ".$nameSender->Username."</br>Reçu le : ".date("d.m.Y h:m",$message->ReceptionDate)?>
                </button>
            </h5>
        </div>

        <div id="<?php echo $collapse?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p class="text-justify">
                    <?php echo $message->Content ?>
                </p>
                <div class="input-group mb-3">
                    <form method="post" action="deleteMessage.php" >
                        <input type="hidden" name="idMessage" value="<?php echo $message->id; ?>">
                        <input type="submit" class="btn btn-danger" name="delete" value="Supprimer"/>
                    </form>
                    <form method="post" action="messageForm.php">
                        <input type="hidden" name="AnswerTo" value="<?php echo $message->Sender; ?>" />
                        <input type="submit" class="btn btn-primary" name="create" value="repondre"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>

<button class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#MessageForm" aria-expanded="true" aria-controls="MessageForm">
    Nouveau Message
</button>

<div id="MessageForm" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="card-body">
        <?php include("./messageForm.php")?>
    </div>
</div>

<div class="card-body">
    <form method="post" action="password_update_action.php">
        <label for="">Changement de mot de passe</label>
        <input name = passwordChange type="password">
        <button class="btn btn-primary" type="submit">appliquer</button>
    </form>
</div>


<?php include_once('./fragments/footer.php');  ?>
