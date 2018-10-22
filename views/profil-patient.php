<div class="p-5">
    <h2 class="text-center">Profil patient</h2>
    <div class="row justify-content-center">
        <table class="text-center text-white" border="5">
            <thead>
                <tr class="">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Phone</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $showPatients->lastname ?></td>
                    <td><?= $showPatients->firstname ?></td>
                    <td><?= $showPatients->birthdate ?></td>
                    <td><?= $showPatients->phone ?></td>
                    <td><?= $showPatients->mail ?></td>
                    <td><a href="index.php?patient-modif=<?= $showPatients->id ?>"><button class="btn btn-primary" type="button">Modifier</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2 class="text-center mt-5">Rendez-vous</h2>
    <div class="row justify-content-center">
        <table class="text-center" border="5">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($showAppointment AS $appointmentList)
                {
                    ?>
                    <tr>
                        <td><?= $appointmentList->date ?></td>
                        <td><?= $appointmentList->hour ?></td>                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>