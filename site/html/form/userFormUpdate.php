

        <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>">

        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="<?php echo $user->Username ?>" value="<?php echo $user->Username ?>" readonly>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="validityRadios" id="validityRadios1" value="1"<?php
            if ($user->Validity == 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="validityRadios1">
                Valide
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="validityRadios" id="validityRadios2" value="0"<?php
            if ($user->Validity != 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="validityRadios2">
                Invalide
            </label>
        </div>

        <div class="form-group">
            <label for="passwordUnhashed">Mot de passe</label>
            <input type="password" class="form-control" name="passwordUnhashed" id="passwordUnhashed" placeholder="Mot de passe">
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adminRadios" id="adminRadios1" value="1"<?php
            if ($user->HasAdminPrivilege == 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="adminRadios1">
                Administrateur
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="adminRadios" id="adminRadios2" value="0"<?php
            if ($user->HasAdminPrivilege != 1) {
                echo "Checked";
            }
            ?>>
            <label class="form-check-label" for="adminRadios2">
                Collaborateur
            </label>
        </div>
