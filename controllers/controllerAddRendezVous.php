<?php

//Déclaration de la fonction addRDV()
function addRendezVous()
{   //Appel du fichier regex
    require 'assets/regex.php';
    //Si $_POST['submitAppointment'] existe 
    if (isset($_POST['submitAppointment']))
    {   //Si $_POST['lastname'] n'est pas vide
        if (!empty($_POST['lastname']))
        {   //Si $_POST['lastname'] passe la regex
            if (preg_match($lastnameRegex, $_POST['lastname']))
            {   //Intégrer $_POST['lastname'] dans la variable $lastname
                $lastname = htmlspecialchars($_POST['lastname']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le formError
                $formError['lastname'] = 'Le nom n\'est pas valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['lastname'] = 'Ce champ ne peux pas rester vide';
        }

        //Si $_POST['firstname'] n'est pas vide 
        if (!empty($_POST['firstname']))
        {   //Si $_POST['firstname'] passe la regex
            if (preg_match($firstnameRegex, $_POST['firstname']))
            {   //Intégrer $_POST['firstname'] dans la variable $firstname
                $firstname = htmlspecialchars($_POST['firstname']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['firstname'] = 'Le prénom n\'est pas valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['firstname'] = 'Ce champ ne peux pas rester vide';
        }

        //Si $_POST['birthdate'] n'est pas vide
        if (!empty($_POST['birthdate']))
        {   //Si $_POST['birthdate'] passe la regex
            if (preg_match($dateRegex, $_POST['birthdate']))
            {   //Intégrer $_POST['birthdate'] dans la variable $birthdate
                $birthdate = htmlspecialchars($_POST['birthdate']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['birthdate'] = 'La date de naissance n\'est pas valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['birthdate'] = 'Ce champ ne peux pas rester vide';
        }

        //Si $_POST['date'] n'est pas vide
        if (!empty($_POST['date']))
        {   //Si $_POST['date'] passe la regex
            if (preg_match($dateRegex, $_POST['date']))
            {
                $date = htmlspecialchars($_POST['date']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['appointmentDate'] = 'La date entré n\'est pas valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['appointmentDate'] = 'Veuillez entrer une date';
        }

        //Si $_POST['hour'] n'est pas vide
        if (!empty($_POST['hour']))
        {
            if (preg_match($hourRegex, $_POST['hour']))
            {
                $hour = htmlspecialchars($_POST['hour']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['appointmentHour'] = 'L\' heure entré n\'est pas valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['appointmentHour'] = 'Veuillez entrer une heure';
        }
    }
    //Si le nombres d'entrés dans $formError est égale a 0
    if (isset($_POST['submitAppointment']) && count($formError) == 0)
    {   //Créer l'instance $verifExist de l'objet Patients();
        $verifExist = NEW Patients();
        //Intégrer la valeur de $lastname dans l'attribut $lastname de l'instance verifExist
        $verifExist->lastname = $lastname;
        //Intégrer la valeur de $firstname dans l'attribut $firstname de l'instance verifExist
        $verifExist->firstname = $firstname;
        //Intégrer la valeur de $birthdate dans l'attribut $birthdate de l'instance verifExist
        $verifExist->birthdate = $birthdate;
        //Intégrer la valeur de la methode verifPatientExist(); de l'instance $verifExist dans la variable $verifPatient
        $verifPatient = $verifExist->verifPatientExist();
        //Si $verifPatient est égal a 'present'
        if ($verifPatient == 'present')
        {   //Execution de la methode getPatientByInfo() et intégration dans $infoPatient
            $detailsPatient = $verifExist->getPatientByInfo();
            //Déclaration de l'instance addAppointment de l'objet Appointment()
            $addAppointment = NEW Appointment();            
            $addAppointment->idPatients = $detailsPatient->id;
            $addAppointment->dateHour = $date . ' ' . $hour;
            $addAppointment->addAppointment();
        }//Sinon si il est égale a 'absent'
        elseif ($verifPatient == 'absent')
        {   //Afficher un message
            echo 'Ce patient n\'existe pas';
        }
    }
    require 'views/ajout-rendezvous.php';
}
