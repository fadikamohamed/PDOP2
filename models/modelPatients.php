<?php

//Déclaration de la class Patients
class Patients {

    //Déclaration de l'attribut privé $connexion
    private $connexion;
    //Déclaration des attributs publique
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;
    public $offset;
    public $limit;
    public $numberOfLines;

    //Déclaration de la méthode construct qui s'execute au moment de l'instanciation
    public function __construct()
    {
        try {//Déclaration de l'instance connexion de la class PDO et connexion a la base de donnée
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'mohamedf');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode qui permet d'ajouter un patient 
     */
    public function setPatient()
    {   //Préaration de la requete afin qu'elle retourne un objet et déclaration des marqueurs nominatifs
        $setPatient = $this->connexion->prepare(
                'INSERT INTO `patients`('
                . '`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
        //Association de la valeur de l'attribut $lastname au marqueur nominatif :lastname de la requete préparé
        $setPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $firstname au marqueur nominatif :firstname de la requete préparé
        $setPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $birthdate au marqueur nominatif :birthdate de la requete préparé
        $setPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $phone au marqueur nominatif :phone de la requete préparé
        $setPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $mail au marqueur nominatif :mail de la requete préparé
        $setPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        //Éxécution de la requete préparé
        $setPatient->execute();
    }

    /**
     * Méthode qui perme de vérifier si un patient est deja dans la bas de donnée
     * @return string
     */
    public function verifPatientExist()
    {   //Préparation de la requete afin qu'elle retourne un objet et déclaration des marqueurs nominatifs
        $verifResult = $this->connexion->prepare('SELECT `lastname`, `firstname`, `birthdate` FROM `patients` WHERE `lastname`=:lastname AND `firstname`=:firstname AND `birthdate`=:birthdate');
        //Association de la valeur de l'attribut $lastname au marqueur nominatif :lastname de type STR de la requete préparé
        $verifResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $firstname au marqueur nominatif :firstname de type STR de la requete préparé
        $verifResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $birthdate au marqueur nominatif :birthdate de type STR de la requete préparé
        $verifResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        //Éxécution de la requete préparé
        $verifResult->execute();
        //Si la récupération de la ligne voulue avec fetch est réussi
        if ($verifResult->fetch() == true)
        {   //Retourner 'présent'
            return 'present';
        }//Sinon si la récupération de la ligne voulue avec fetch n'est pas réussi
        elseif ($verifResult->fetch() == false)
        {   //Retourner 'absent'
            return 'absent';
        }
    }

    /**
     * Méthode qui renvoie la liste des patients
     * @return type
     */
    public function getListPatient()
    {   //Éxécute la requete et retourne l'id, le nom et le prénom en tant qu'objet
        $listPatientsResult = $this->connexion->prepare(
                'SELECT SQL_CALC_FOUND_ROWS `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
                . 'FROM `patients` ORDER BY `lastname` LIMIT :limit OFFSET :offset');
        $listPatientsResult->bindValue(':limit', $this->limit, PDO::PARAM_INT);
        $listPatientsResult->bindValue(':offset', $this->offset, PDO::PARAM_INT);
        $listPatientsResult->execute();
        $numberOfLines = $this->connexion->query('SELECT found_rows()');
        $this->numberOfLines = $numberOfLines->fetchColumn();
        //Retourne les lignes de la requete dans un objet
        return $listPatientsResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNumberOfPatients()
    {
        
    }

    /**
     * Méthode qui renvoie un patient a partir de son id
     * @return type
     */
    public function getPatient()
    {   //Préparation de la requete afin qu'elle retourne un objet et déclaration des marqueurs nominatifs
        $getPatient = $this->connexion->prepare(
                'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
                . 'FROM `patients` '
                . 'WHERE `id`=:id');
        //Association de la valeur de l'attribut $id dans le marqueur nominatif :id de type INT de la requete préparé
        $getPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Éxécution de la requete préparé
        $getPatient->execute();
        //Sin $getPatient est un objet
        if (is_object($getPatient))
        {   //Intégrer la ligne de la requete dans une variable $getPatientResult
            $getPatientResult = $getPatient->fetch(PDO::FETCH_OBJ);
        }
        //Retourne $getPatientResult
        return $getPatientResult;
    }

    /**
     * Méthode qui renvoie un patient a partir de son nom de son prénom et de sa date de naissance
     * @return type
     */
    public function getPatientByInfo()
    {   //Préparation de la requete afn qu'elle retourne l'id, le nom, le prénom, la date de naissance, le numéro de téléhone et le mail en tant qu'objet
        $getPatient = $this->connexion->prepare(
                'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
                . 'FROM `patients` '
                . 'WHERE `lastname`=:lastname AND `firstname`=:firstname AND `birthdate`=:birthdate');
        //Association de la valeur de l'attribut $lastname au marqueur nominatif :lastname de type STR de la requete préparé    
        $getPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $firstname au marqueur nominatif :firstname de type STR de la requete préparé
        $getPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $birthdate au marqueur nominatif :birthdate de type STR de la requete préparé
        $getPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        //Éxécution de la requete préparé
        $getPatient->execute();
        //Si $getPatient est un objet
        if (is_object($getPatient))
        {   //Récupérer la ligne demander dans la variable $getPatientRésut
            $getPatientResult = $getPatient->fetch(PDO::FETCH_OBJ);
        }
        //Rétourne la variable $getPatientRésult
        return $getPatientResult;
    }

    /**
     * Méthode qui modifie un patient a partir de son id
     */
    public function modifyProfilPatient()
    {   //Préparation de la requete afin de modifier un entré de la table patients et déclaration des marqueurs nominatifs
        $modifyPatient = $this->connexion->prepare('UPDATE `patients` '
                . 'SET `lastname`=:lastname, `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail '
                . 'WHERE `id`=:id');
        //Assiciation de la valeur de l'attribut $lastname au marqueur nominatif :lastname de type STR de la requete préparé
        $modifyPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        //Assiciation de la valeur de l'attribut $firstname au marqueur nominatif :firstname de type STR de la requete préparé
        $modifyPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        //Assiciation de la valeur de l'attribut $birthdate au marqueur nominatif :birthdate de type STR de la requete préparé
        $modifyPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        //Assiciation de la valeur de l'attribut $phone au marqueur nominatif :phone de type STR de la requete préparé
        $modifyPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        //Assiciation de la valeur de l'attribut $mail au marqueur nominatif :mail de type STR de la requete préparé
        $modifyPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        //Assiciation de la valeur de l'attribut $id au marqueur nominatif :id de type INT de la requete préparé
        $modifyPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Si $modifyPatient est un objet
        if (is_object($modifyPatient))
        {   //executer la requete et récupérer le résultat dans la variable $isObjectRésult
            $isObjectResult = $modifyPatient->execute();
        }
        //Retourne $isObjectResult
        return $isObjectResult;
    }

    /**
     * Méthode qui permet de supprimer un patient et ces rendez-vous a partir de son id
     */
    public function deletePatientAndAppointments()
    {   //Éssayer
        try {//Préparation de la requete afin de supprimer les rendez-vous d'un patient a partir de l'idPatient et déclaration du marqueur nominatif
            $deleteAppointment = $this->connexion->prepare('DELETE FROM `appointments` WHERE `idPatients`=:id');
            //Association de la valeur de l'attribut $id au marqueur nominatif :id
            $deleteAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
            //Éxécuter la requete $deleteAppointment
            $deleteAppointment->execute();

            //Préparation de la requete afin de supprimer un patient a partir de son id et déclaration du marqueur nominatif
            $deletePatient = $this->connexion->prepare('DELETE FROM `patients` WHERE `id`=:id');
            //Association de la valeur de l'attribut $id au marqueur nominatif :id            
            $deletePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
            //Éxécuter la requete $deletePatient
            $deletePatient->execute();
            //Sinon attraper l'érreur
        } catch (Exception $e) {
            //Revenir a l'état initial
            $requestAppointment->rollBack();
            $requestPatient->rollBack();
            //Afficher les érreurs
            $e->getMaessage();
            $e->getCode();
        }
    }

//    public function findPatientByLastname()
//    {
//        $findPatientList = array();
//        $findPatient = $this->connexion->prepare(
//                'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
//                . 'FROM `patients` '
//                . 'WHERE `lastname` LIKE :lastname ORDER BY `lastname`');
//        $findPatient->bindValue(':lastname', '%' . $this->lastname . '%', PDO::PARAM_STR);
//        if ($findPatient->execute())
//        {
//            if (is_object($findPatient))
//            {
//                $findPatientList = $findPatient->fetchAll(PDO::FETCH_OBJ);
//            } else {
//                $findPatientList = FALSE;
//            }
//        } else {
//            $findPatientList = FALSE;
//        }
//
//        return $findPatientList;
//    }
    
    //Déclaration de la méthode findPatientByLastname($search)
    public function findPatientByLastname($search)
    {   //Déclaration du tableau vide $findPatientList
        $findPatientList = array();
        //Préparation de la requete et intégration dans $findPatient
        $findPatient = $this->connexion->prepare(
                'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
                . 'FROM `patients` '
                . 'WHERE `lastname` LIKE :search OR `firstname` LIKE :search ORDER BY `lastname`');
        //Récupération de la valeur de $search passé en parametre de la méthode dans la fonction bindValue() pour le filtrage, ajout des modulos
        $findPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        //Si $findPatient est éxécuté
        if ($findPatient->execute())
        {   //Si $findPatient est un objet
            if (is_object($findPatient))
            {   //Récupération du résultat de la requete dans $findPatientList
                $findPatientList = $findPatient->fetchAll(PDO::FETCH_OBJ);
                //Sinon
            } else {
                //Attribuer FALSE a $findPatientList
                $findPatientList = FALSE;
            }
          //Sinon
        } else {
            //Attribuer FALSE a $findPatientList
            $findPatientList = FALSE;
        }
        //Retourner $findPatientList
        return $findPatientList;
    }

    //Déclaration de la fonction destruct
    public function __destruct()
    {   //Termine la connexion a la base de donnée
        $this->connexion = NULL;
    }

}