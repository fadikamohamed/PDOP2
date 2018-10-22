<?php

//Déclaration de la fonction modifAppointmentPage() prenant en paramettre l'id récupéré dans le routeur
function modifAppointmentPage($id)
{   //Appel du fichier regex
    require 'assets/regex.php';
    //Déclaration de l'instance $appointementInstance de la class Appointment()
    $appointmentInstance = NEW Appointment();
    //Intégration de la valeur de la variable $id dans l'attribut $id de l'instance $appointmentInstance
    $appointmentInstance->id = $id;
    //$Intégration de la méthode getAppointmentById() de l'instance appointmentInstance dans la variable $modifyAppointment
    $modifAppointment = $appointmentInstance->getAppointmentById();

    //Si $_POST['submitRDV'] existe 
    if (isset($_POST['submitRDV']))
    {   //Si $_POST['date'] n'est pas vide
        if (!empty($_POST['date']))
        {   //Si $_POST['date'] passe la régex
            if (preg_match($dateRegex, $_POST['date']))
            {   //Intégrer la valeur de $_POST['date'] dans la variable $date
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
        {   //Si $_POST['hour'] passe la regex
            if (preg_match($hourRegex, $_POST['hour']))
            {   //Intégrer la valeur de $_POST['hour'] dans la variable $hour
                $hour = htmlspecialchars($_POST['hour']);
            }//Sinon
            else
            {  //Intégrer un message d'erreur dans le $formError
                $formError['appointmentHour'] = 'L\' heure entré n\'est pas valide';
            }
        }//Sinon
        else
        {  //Intégrer un message d'erreur dans le $formError
            $formError['appointmentHour'] = 'Veuillez entrer une heure';
        }

        //Si $_POST['submitRDV'] existe et que le nombre d'entrés dans le tableau $formError est égal a 0
        if (isset($_POST['submitRDV']) && count($formError) == 0)
        {   //Assiciation des valeurs des variables $date et $hour concaténé dans l'attribut $dateHour de l'instance $appointmentInstance
            $appointmentInstance->dateHour = $date . ' ' . $hour;
            //Execution de la methode modifyAppointment() de l'instance $appointmentInstance et intégration dans la variable $modifResult
            $modifResult = $appointmentInstance->modifyAppointment();
        }
    }//Appel de la page modify-appointment.php
    require 'views/modify-appointment.php';
}
