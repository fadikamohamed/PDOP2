<div class="p-5">
    <h2 class="text-center">Details du rendez-vous</h2>
    <div class="row justify-content-center">
        <table class="text-center text-white" border="5">
            <thead>
                <tr class="">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Numéro de téléphone</th>
                    <th>Date du rendez-vous</th>
                    <th>Heure du rendez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= //
                            $detailsList->lastname ?></td>
                    <td><?= 
                            $detailsList->firstname ?></td>
                    <td><?= 
                            $detailsList->birthdate ?></td>
                    <td><?= 
                            $detailsList->phone ?></td>
                    <td><?= 
                            $detailsList->date ?></td>
                    <td><?= 
                            $detailsList->hour ?></td>
                    <td><a href="index.php?appointment-modif=<?= $detailsList->aId ?>"><button class="btn btn-primary" type="button">Modifier</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>