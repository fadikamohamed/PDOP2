<div class="">
    <form action="#" method="POST">
        <!-- Nom -->
        <div class="input-field col s6">
            <input type="text" id="lastname" name="lastname" value="" />
            <label for="lastname">Nom : </label>
        </div>
        <!-- Prénom -->
        <div class="input-field s6">
            <input type="text" id="firstname" name="firstname" value="" />
            <label for="firstname">Prénom : </label>
        </div>
                <!-- Sex -->
        <div class="input-field col s6">
            <select id="gender" name="gender">
                <option value="1" selected>Homme</option>
                <option value="2">Femme</option>
                <option value="3">Autre</option>
            </select>
            <label for="gender">Sex</label>
        </div>
        <!-- Date d'anniversaire -->
        <div class="input-field s6">
            <input type="text" id="birthDate" name="birthDate" value="" />
            <label for="birthDate">Date de naissance : </label>
        </div>
        <!-- Numéro de téléphone -->
        <div class="input-field s6">
            <input type="text" id="foneNumber" name="foneNumber" value="" />
            <label for="foneNumber">Numéro de téléphone : </label>
        </div>
        <!-- E-mail -->
        <div class="input-field s6">
            <input type="text" id="e-mail" name="e-mail" value="" />
            <label for="e-mail">E-mail : </label>
        </div>
        <!-- Statut marital -->
        <div class="input-field s6">
            <select name="">
                <option value="">Célibataire</option>
                <option value="">Marié(e)</option>
                <option value="">Divorcé(e)</option>
                <option value="">Veuf/ve</option>
            </select>
            <label for="">Statut Marital</label>
        </div>
        <!-- Adresse -->
        <div class="input-field">
            <input type="text" id="location" name="location" value="" />
            <label for="location">Adresse : </label>
        </div>
        <!-- Ville -->
        <div class="input-field">
            <input type="text" id="city" name="city" value="" />
            <label for="city">Ville :</label>
        </div>
        <!-- Pays -->
        <div class="input-field s6">
            <select name="country">
                <option value="1">France</option>
            </select>
            <label for="country">Pays</label>
        </div>
        <!-- Numéro de sécurité sociale -->
        <div class="input-field">
            <input type="text" id="careNumber" name="careNumber" value="" />    
            <label for="careNumber">Numéro de sécurité sociale : </label>
        </div>
        <!-- Assureur -->
        <div class="input-field">
            <input type="text" id="name" name="Name" value="" />    
            <label for="name">Assureur : </label>
        </div>

        <p>
            <label>Antecedents médical : </label>
        </p>
        <p>
            <input type="checkbox" id="anémie‎" />    
            <label for="anémie‎">Anémie‎</label>
        </p>
        <p>
            <input type="checkbox" id="asthme‎" />    
            <label for="asthme‎">Asthme‎</label>
        </p>
        <p>
            <input type="checkbox" id="bronchite‎" />    
            <label for="bronchite‎">Bronchite‎</label>
        </p>
        <p>
            <input type="checkbox" id="varicelle‎" />    
            <label for="varicelle‎">Varicelle‎</label>
        </p>
        <p>
            <input type="checkbox" id="diabète‎" />    
            <label for="diabète‎">Diabète‎</label>
        </p>
        <p>
            <input type="checkbox" id="pneumonie‎" />    
            <label for="pneumonie‎">Pneumonie‎</label>
        </p>
        <p>
            <input type="checkbox" id="thyroïde‎" />    
            <label for="thyroïde‎">Maladie de Thyroïde‎</label>
        </p>
        <p>
            <input type="checkbox" id="ulcère‎" />    
            <label for="ulcère‎">Ulcère‎</label>
        </p>
        <p>
            <input type="checkbox" id="other" />    
            <label for="other"></label>
            <label for="other-text">Autre : </label>
            <input type="text" id="other-text" name="other-text" value="" />
        </p>

        <input type="submit" name="submit" value="Terminer" />
    </form>
</div>

