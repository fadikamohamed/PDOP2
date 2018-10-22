<div class="m-3">
    <h2 class="text-center">Modifier les information du patient</h2>
    <?php
    //Si $errorDouble n'est pas vide et qu'il est égale a 'present'
    if (!empty($errorDouble) && $errorDouble == 'present')
    {
        ?>
        <p class="text-danger text-center">Attention ! Ce patient existe deja dans la base de donnée !</p>                
        <?php
        //Sinon si $errorDouble n'est pas vide et qu'il est égale a 'absent'
    }
    elseif (!empty($errorDouble) && $errorDouble == 'absent')
    {
        ?>
        <p class="text-success text-center">Le patient a bien etait modifié.</p>
    <?php } ?>
    <div class="row justify-content-center m-4">
        <form action="#" method="POST">
            <div class="form-group">
                <label  class="col-md-4" for="lastname">Nom : </label>
                <input class="col-md-7" type="text" id="lastname" name="lastname" placeholder="" value="<?= $showPatients->lastname ?>" />
                <?php
                if (isset($formError['lastname']))
                {
                    ?>
                    <p class="text-danger text-center"><?= $formError['lastname'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">            
                <label class="col-md-4" for="firstname">Prénom : </label>
                <input class="col-md-7" type="text" id="firstname" name="firstname" placeholder="" value="<?= $showPatients->firstname ?>" />
                <?php
                if (isset($formError['firstname']))
                {
                    ?>
                    <p class="text-danger text-center"><?= $formError['firstname'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">            
                <label class="col-md-6" for="birthdate">Date de naissance : </label>
                <input class="col-md-5" type="date" id="birthdate"name="birthdate" placeholder="" value="<?= $showPatients->birthdate ?>" />
                <?php
                if (isset($formError['birthdate']))
                {
                    ?>
                    <p class="text-danger text-center"><?= $formError['birthdate'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">            
                <label class="col-md-6" for="phone">Numéro de téléphone : </label>
                <input class="col-md-5" type="text" id="phone" name="phone" placeholder="" value="<?= $showPatients->phone ?>" />
                <?php
                if (isset($formError['phone']))
                {
                    ?>
                    <p class="text-danger text-center"><?= $formError['phone'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">            
                <label class="col-md-3" for="mail">Mail : </label>
                <input class="col-md-8" type="text" id="mail" name="mail" placeholder="" value="<?= $showPatients->mail ?>" />
                <?php
                if (isset($formError['mail']))
                {
                    ?>
                    <p class="text-danger text-center"><?= $formError['mail'] ?></p>
                <?php } ?>
            </div>
            <div class="text-center">
                <input class=" col-md-6" type="submit" name="modifyPatient" value="Modifier" />
            </div>
        </form> 
    </div>
</div>
