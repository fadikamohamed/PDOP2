<h2 class="text-center">Nouveau rendez-vous</h2>
<div class="row justify-content-center m-5">
    <form class="col-md-10" action="#" method="POST">
        <div class="form-group">
            <label class="col-md-4" for="lastname">Nom : </label>
            <input class="col-md-7" type="text" name="lastname" value="" />
            <?php
            if (isset($formError['lastname']))
            {
                ?>
                <p class="text-danger"><?= $formError['lastname'] ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label class="col-md-4" for="firstname">Prénom : </label>
            <input class="col-md-7" type="text" name="firstname" value="" />
            <?php
            if (isset($formError['firstname']))
            {
                ?>
                <p class="text-danger"><?= $formError['firstname'] ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label class="col-md-5" for="birthdate">Date de naissance : </label>
            <input class="col-md-6" type="date" name="birthdate" value="" />
            <?php
            if (isset($formError['birthdate']))
            {
                ?>
                <p class="text-danger"><?= $formError['birthdate'] ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label class="col-md-6" for="date">Date du rendez-vous : </label>
            <input class="col-md-5" type="date" id="date" name="date" value="" />
            <?php
            if (isset($formError['appointmentDate']))
            {
                ?>
                <p class="text-danger"><?= $formError['appointmentDate'] ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label class="col-md-6" for="hour">Heure du rendez-vous : </label>
            <input class="col-md-5" type="time" id="hour" name="hour" value="" />
            <?php
            if (isset($formError['appointmentHour']))
            {
                ?>
                <p class="text-danger"><?= $formError['appointmentHour'] ?></p>
            <?php } ?>
        </div>
        <div class="text-center">
            <input class="col-md-4" type="submit" name="submitAppointment" value="Soumettre" />
        </div>
    </form>
    <a href="index.php?action=add-patient"><button class="btn btn-outline-white" type="button">Ajouter un nouveau patient</button></a>
</div>
