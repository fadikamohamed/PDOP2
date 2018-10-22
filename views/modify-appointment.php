<h2 class="text-center m-4">Modifier le rendez-vous</h2>
<p class="text-center"><?= $modifAppointment->lastname ?></p>
<p class="text-center"><?= $modifAppointment->firstname ?></p>
<div class="row justify-content-center m-5">
    <form class="col-md-10" action="#" method="POST">
        <div class="form-group">
            <label class="col-md-6" for="date">Date du rendez-vous : </label>
            <input class="col-md-5" type="date" id="date" name="date" value="<?= $modifAppointment->date ?>" />
            <?php
            if (isset($formError['appointmentDate']))
            {
                ?>
                <p class="text-danger"><?= $formError['appointmentDate'] ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label class="col-md-6" for="hour">Heure du rendez-vous : </label>
            <input class="col-md-5" type="time" id="hour" name="hour" value="<?= $modifAppointment->hour ?>" />
            <?php
            if (isset($formError['appointmentHour']))
            {
                ?>
                <p class="text-danger"><?= $formError['appointmentHour'] ?></p>
            <?php } ?>
        </div>
        <div class="text-center">
            <input class="col-md-4" type="submit" name="submitRDV" value="Soumettre" />
        </div>
    </form>
    <a href="index.php?action=add-patient"><button class="btn btn-outline-white" type="button">Ajouter un nouveau patient</button></a>
</div>
