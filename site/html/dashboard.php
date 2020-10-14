<?php

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
  header('location : ./loginForm.php');
}

include_once('./fragements/header.php');

$id = $_SESSION['id'];
$messages = $singleton->getReceivedMessagesByReceiverId($id);
?>

<h2 class="text-center">Mes messages</h2>

<div id="accordion">
    <?php foreach ($messages as $message){
    $collapse = "contentMsg".$message->id; ?>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="<?php echo "#".$collapse ?>" aria-expanded="true" aria-controls="<?php echo $collapse?>">
                    <?php echo $message->Subject." From: ".$message->Sender?>
                </button>
            </h5>
        </div>

        <div id="<?php echo $collapse?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p class="text-justify">
                    <?php echo $message->Content ?>
                </p>
                <div class="input-group mb-3">
                    <form method="post" action="deleteMessage.php" class="">
                        <input type="hidden" name="idMessage" value="<?php echo $message->id ?>">
                        <input type="submit" class="btn btn-danger" name="delete" value="Supprimer"/>
                    </form>
                    <form method="post" action="createMessage.php">
                        <input type="submit" class="btn btn-primary" name="create" value="repondre"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<div class="container">
    <a href="./createMessageForm.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Nouveau Message</a></button>
</div>


<?php include_once('./fragments/footer.php');  ?>
