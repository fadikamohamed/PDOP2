<div class="row justify-content-center">
    <h2 class="text-center col-md-12">Liste des patients</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="nameAsked">Rechercher un patient : </label>
            <input type="text" id="nameAsked" name="nameAsked" value="" />
            <?php
            if (isset($error))
            { ?>
                <p><?= $error ?></p>
            <?php }
            ?>
            <button type="submit">Rechercher</button>
        </div>
    </form>
    <?php 
            if (isset($listPatients))
            {                
    if ($listPatients === false)
    {
        ?>
        <p>Il y a eu un probleme</p>
    <?php
    }
    elseif (count($listPatients) === 0)
    {
        ?>
        <p>Il n'y a aucun resultat</p>
<?php
}
else
{
    ?>

        <table class="text-center col-md-10" border="1">
            <thead>
                <tr class="text-black">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Numéro de téléphone</th>
                    <th>Adresse mail</th>
                </tr>
            </thead>
            <tbody>
    <?php
    foreach ($listPatients AS $patient)
    {
        ?>                
                    <tr>
                        <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->lastname ?></a></td>
                        <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->firstname ?></a></td>
                        <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->birthdate ?></a></td>
                        <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->phone ?></a></td>
                        <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->mail ?></a></td>
                        <td><a class="btn btn-outline-light"  href="index.php?action=list-patient&delete=<?= $patient->id ?>">Supprimer</a></td>
                    </tr>
        <?php } ?>
            </tbody>
        </table>
    <?php }
    ?>
</div>
<div class="row justify-content-center mt-4">        
    <?php
    if ($page > 1)
    {
        ?>
        <a class = "linkLeft" href = "index.php?action=list-patient&page=<?= $page - 1 ?>">Page précédente</a>
        <?php
    }
    for ($number = 1; $number <= $numberOfPage; $number++)
    {
        ?>
        <p> - </p>
        <a class = "linkLeft" href = "index.php?action=list-patient&page=<?= $number ?>"><?= $number ?></a>
        <?php
    }
    if ($page < $numberOfPage)
    {
        ?>
        <p> - </p>
        <a class = "linkRight" href = "index.php?action=list-patient&page=<?= $page + 1 ?>">Page suivante</a>
<?php } ?>
</div>
            <?php } ?>
<div class="row justify-content-center">
    <a class="m-3" href="index.php?action=add-patient">
        <button class="btn btn-outline-white" type="button">Ajouter un nouveau patient</button>
    </a>
</div>