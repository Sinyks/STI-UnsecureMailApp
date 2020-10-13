    <form>
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input class="form-control" type="text" id="username" placeholder="<?php echo $user->Username ?>" readonly>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="validityRadios" id="validityRadios1" value="option1"<?php
            if ($user->Validity == 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="validityRadios1">
                Valide
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="validityRadios" id="validityRadios2" value="option2"<?php
            if ($user->Validity != 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="validityRadios2">
                Invalide
            </label>
        </div>

        <div class="form-group">
            <label for="unhashed">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adminRadios" id="adminRadios1" value="option1"<?php
            if ($user->HasAdminPrivilege== 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="adminRadios1">
                Administrateur
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adminRadios" id="adminRadios2" value="option2"<?php
            if ($user->Validity != 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="adminRadios2">
                Collaborateur
            </label>
        </div>
