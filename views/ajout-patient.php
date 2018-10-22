<h2 class="text-center">Nouveau patient</h2>
<div class="row justify-content-center">
    <?php
    //Si $errorDouble n'est pas vide et qu'il est égale a 'present'
    if (!empty($errorDouble) && $errorDouble == 'present')
    {
        ?>
        <p class="text-danger">Attention ! Ce patient existe deja dans la base de donnée !</p>                
        <?php
    } //Sinon si $errorDouble n'est pas vide et qu'il est égale a 'absent'
    elseif (!empty($errorDouble) && $errorDouble == 'absent')
    {
        ?>
        <p class="text-danger">Le patient a bien etait ajouté</p>
    <?php } ?>

    <form class="col-md-10 m-4" action="#" method="POST">
        <!-- Nom -->
        <div class="form-group">
            <label class="col-md-4" for="lastname">Nom : </label>
            <input class="col-md-7" type="text" id="lastname" name="lastname" value="<?= !empty($lastname) ? $lastname : NULL ?>" />
            <?php
            if (isset($formError['lastname']))
            {
                ?>
                <p class="text-danger"><?= $formError['lastname'] ?></p>
            <?php } ?>
        </div>
        <!-- Prénom -->
        <div class="form-group">
            <label class="col-md-4" for="firstname">Prénom : </label>
            <input class="col-md-7" type="text" id="firstname" name="firstname" value="<?= !empty($firstname) ? $firstname : NULL ?>" />
            <?php
            if (isset($formError['firstname']))
            {
                ?>
                <p class="text-danger"><?= $formError['firstname'] ?></p>
            <?php } ?>
        </div>
        <!-- Date de naissance -->
        <div class="form-group">
            <label class="col-md-7" for="birthdate">Date de naissance : </label>
            <input class="col-md-4" type="date" id="birthdate" name="birthdate" value="<?= !empty($birthdate) ? $birthdate : NULL ?>" />
            <?php
            if (isset($formError['birthdate']))
            {
                ?>
                <p class="text-danger"><?= $formError['birthdate'] ?></p>
            <?php } ?>
        </div>
        <!-- Numéro de téléphone -->
        <div class="form-group">
            <label class="col-md-7" for="phone">Numéro de téléphone : </label>
            <input class="col-md-4" type="text" id="phone" name="phone" value="<?= !empty($phone) ? $phone : NULL ?>" />
            <?php
            if (isset($formError['phone']))
            {
                ?>
                <p class="text-danger"><?= $formError['phone'] ?></p>
            <?php } ?>
        </div>
        <!-- E-mail -->
        <div class="form-group">
            <label class="col-md-4" for="mail">E-mail : </label>
            <input class="col-md-7" type="text" id="mail" name="mail" value="<?= !empty($mail) ? $mail : NULL ?>" />
            <?php
            if (isset($formError['mail']))
            {
                ?>
                <p class="text-danger"><?= $formError['mail'] ?></p>
            <?php } ?>
        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="Terminer" />
        </div>
    </form>
</div>

