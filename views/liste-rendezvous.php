<h2 class="text-center">Liste des rendez-vous</h2>
<div class="row justify-content-center">
    <table class="text-center col-md-10" border="1">
        <thead>
            <tr class="text-black">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Horaire du rendez-vous</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($appointmentList AS $appointement)
            {
                ?>                
                <tr>
                    <td><a href="index.php?appointment=<?= $appointement->id ?>"><?= $appointement->lastname ?></a></td>
                    <td><a href="index.php?appointment=<?= $appointement->id ?>"><?= $appointement->firstname ?></a></td>
                    <td><a href="index.php?appointment=<?= $appointement->id ?>"><?= $appointement->dateHour ?></a></td>
                    <td><a class="btn btn-outline-light" href="index.php?action=list-rendez-vous&delete=<?= $appointement->id ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
    <a href="index.php?action=add-rendez-vous"><button class="btn btn-outline-white m-3" type="button">Ajouter un rendez-vous</button></a>
    </div>
</div>
        