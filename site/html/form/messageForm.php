<?php

$contacts = $singleton->getUsers();

?>

<form method="post" action="../createMessage.php">
    <div class="form-group">
        <label for="SelectReceiver">Envoyer à :</label>
        <select class="form-control" name="SelectReceiver">
            <?php
            foreach ($contacts as $contact) {
                    echo "<option value=".$contact->id." >".$contact->Username."</option>";
                }
            ?>

        </select>
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
include_once ('../fragements/footer.php');
?>