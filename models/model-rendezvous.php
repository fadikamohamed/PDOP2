<?php

//Déclaration de la class Appointment
class Appointment {

    //Déclaration de l'attribut privé $connexion
    private $connexion;
    //Déclaration des attributs publique
    public $id;
    public $dateHour;
    public $date;
    public $hour;
    public $idPatients;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

    //Déclaration de la méthode construct qui s'execute au moment de l'instanciation
    public function __construct()
    {
        try {//Déclaration de l'instance $connexion de la class PDO et connexion a la base de donnée
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'mohamedf');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode qui permet d'ajouter un rendez-vous dans la base de donnée
     * @return string
     */
    public function addAppointment()
    {   //Préparation de la requete afin d'insérer la date l'heure et l'id du patient dans la table appointments et déclaration des marqueurs nominatifs
        $addAppointment = $this->connexion->prepare(
                'INSERT INTO `appointments`(`dateHour`, `idPatients`) '
                . 'VALUES(:dateHour, :idPatients)');
        //Association de la valeur de l'attribut $dateHour au marqueur nominatif :dateHour de type STR de la requete préparé
        $addAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $idPatients au marqueur nominatif :idPatients de type INT de la requete préparé
        $addAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        //Si $addRésult est un objet
        if (is_object($addAppointment))
        {
            //Éxécute la requete préparé et récupération du résultat dans la variable $addRésult
            $$addAppointmentResult = $addAppointment->execute();
        }
        return $$addAppointmentResult;
    }

    /**
     * Méthode qui renvoie la liste des rendez-vous avec l'heure, la date, le nom et le prénom du patient, sa date de naissance, son numéro de téléphone et son adresse mail
     * @return type
     */
    public function getAppointments()
    {   //Éxécute la requete et retourne les informations relatif a un rendez-vous dans un objet
        $getAppointment = $this->connexion->query(
                'SELECT `ap`.`id`, DATE_FORMAT(`ap`.`dateHour`, \'Le %d/%m/%Y à %H:%i\') AS dateHour, `pt`.`lastname`, `pt`.`firstname`, `pt`.`birthdate`, `pt`.`phone`, `pt`.`mail` '
                . 'FROM `appointments` AS `ap` '
                . 'LEFT JOIN `patients` AS `pt` ON `ap`.`idPatients`=`pt`.`id` ORDER BY `dateHour` ASC');
        //Retourne toutes les lignes récupéré par la requete
        return $getAppointment->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet de récupérer les information d'un rendez-vous a partir de son id
     * @return type
     */
    public function getAppointmentById()
    {   //Préparation de la requete afin de récupérer les informations relatifs a un rendez-vous et les recupérer dans un objet et déclaration des marqueurs nominatifs
        $getAppointmentById = $this->connexion->prepare(
                'SELECT `ap`.`id` AS `aId`, DATE_FORMAT(`ap`.`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`ap`.`dateHour`, \'%H:%i\') AS `hour`, `pt`.`id` AS `pId`, `pt`.`lastname`, `pt`.`firstname`, `pt`.`birthdate`, `pt`.`phone`, `pt`.`mail` '
                . 'FROM `appointments` AS `ap` '
                . 'LEFT JOIN `patients` AS `pt` ON `ap`.`idPatients`=`pt`.`id` WHERE `ap`.`id`=:id');
        //Association de la valeur de l'attribut $id au marqueur nominatif :id de type INT dans la requete préparé
        $getAppointmentById->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Éxécute la requete préparé
        $getAppointmentById->execute();
        //Si $getAppointmentById est un objet
        if (is_object($getAppointmentById))
        {   //Récupere le résultat de la requete et la retourne
            return $result = $getAppointmentById->fetch(PDO::FETCH_OBJ);
        }
    }

    /**
     * Méthode qui permet de récupérer les information des rendez-vous d'un patient
     * @return type
     */
    public function getAppointmentByIdPatient()
    {   //Préparation de la requete afin de récupérer les informations relatifs a un rendez-vous et les recupérer dans un objet et déclaration des marqueurs nominatifs
        $getByIdPatient = $this->connexion->prepare(
                'SELECT '
                . 'DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, '
                . 'DATE_FORMAT(`dateHour`, \'%H:%i\') AS `hour` '
                . 'FROM `appointments` '
                . 'WHERE `idPatients`=:idPatients');
        //Association de la valeur de l'attribut $idPatients au marqueur nominatif :idPatients de type INT dans la requete préparé
        $getByIdPatient->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        //Éxécute la requete préparé
        $getByIdPatient->execute();
        //Récupere le résultat de la requete et la retourne
        return $getByIdPatient->fetchAll(PDO::FETCH_OBJ);
        /* //Si $getAppointmentById est un objet
          if (is_object($getByIdPatient))
          {
          } */
    }

    /**
     * Méthode qui permet de modifier un rendez-vous
     * @return type
     */
    public function modifyAppointment()
    {   //Préparation de la requete afin de modifier une entré du tableau appointments et déclaration des marqueurs nominatifs
        $modifyAppointment = $this->connexion->prepare(
                'UPDATE `appointments` '
                . 'SET `dateHour`=:dateHour '
                . 'WHERE `id`=:id');
        //Association de la valeur de l'attribut $dateHour au marqueur nominatif :dateHour de type STR de la requete préparé
        $modifyAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        //Association de la valeur de l'attribut $id au marqueur nominatif :id de type INT de la requete préparé
        $modifyAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        //Si $modifyAppointment est un objet
        if (is_object($modifyAppointment))
        {   //Executer la requete préparer et récupérer le resultat dans la variable $isObjectResult
            $isObjectResult = $modifyAppointment->execute();
            return 'Le rendez vous a bien été modifié';
        }
        else
        {
            return 'Le rendez n\'a pas été modifié';
        }
    }

    public function deleteAppointment()
    {
        $deletAppointment = $this->connexion->prepare('DELETE FROM `appointments` WHERE `id`=:id');
        $deletAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deletAppointment->execute();
    }

    //Déclaration de la méthode destruct
    public function __destruct()
    {
        $this->connexion = NULL;
    }

}
