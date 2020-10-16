<?php
include_once('./fragements/header.php');


try {
    if (isset($_POST['AnswerTo'])){
        $answerToId = $_POST['AnswerTo'];
        $answerTo = $singleton->getUsernameById($answerToId);
    }

    $contacts = $singleton->getUsers();
}catch (PDOException $e){
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}
?>

<form method="post" action="createMessage.php">
    <div class="form-group">
        <?php if (isset($answerToId)){?>
            <input type="hidden" class="form-control" name="SelectReceiver" value="<?php echo $answerToId ?> ">
            <h1>Réponse à <?php echo $answerTo->Username ?></h1>
        <?php } else { ?>
            <label for="SelectReceiver">Envoyer à :</label>
            <select class="form-control" name="SelectReceiver" >
                <?php
                foreach ($contacts as $contact) {
                    echo "<option value=" . $contact->id . " >" . $contact->Username ."</option>";
                }
                ?>

            </select>
        <?php }?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="Subject" placeholder="Sujet">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="Content" rows="3" placeholder="Contenu"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Envoyer</button>
</form>

<?php
include_once('../fragements/footer.php');
?>