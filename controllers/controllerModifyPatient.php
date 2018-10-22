<?php

//Déclaration de la fonction modifyPatientPage()
function modifyPatientPage($id)
{   //Appel du fichier regex
    require 'assets/regex.php';

    //Déclaration de l'instance $modifyPatient de la class Patients()
    $modifyPatient = NEW Patients();
    //Association de la valeur de la variable $id du routeur a l'attribut $id de l'instance $modifyPatient
    $modifyPatient->id = $id;

    //Si $_POST['modifyPatient'] existe
    if (isset($_POST['modifyPatient']))
    {   //Si $_POST['lastname'] n'est pas vide
        if (!empty($_POST['lastname']))
        {   //Si $_POST['lastname'] passe la regex
            if (preg_match($lastnameRegex, $_POST['lastname']))
            {   //Associer la valeur de $_POST['lastname'] a l'attribut $lastname de l'instance $modifyPatient
                $modifyPatient->lastname = htmlspecialchars($_POST['lastname']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['lastname'] = 'Veuillez entrer un nom valide !';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['lastname'] = 'Ce champ ne peut pas rester vide';
        }


        //Si $_POST['firstname'] n'est pas vide
        if (!empty($_POST['firstname']))
        {   //Sin $_POST['firstname'] passe la regex
            if (preg_match($firstnameRegex, $_POST['firstname']))
            {   //Associer le valeur de $_POST['firstname'] a l'attribut $firstname de l'instance modifyPatient
                $modifyPatient->firstname = htmlspecialchars($_POST['firstname']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['firstname'] = 'Ce champ ne peut pas rester vide';
        }


        //Si $_POST['birthdate'] n'est pas vide
        if (!empty($_POST['birthdate']))
        {   //Si $_POST['birthdate'] passe la regex
            if (preg_match($dateRegex, $_POST['birthdate']))
            {   //Associer la valeur de $_POST['birthdate'] a l'attribut $birthdate de l'instance $modifyPatient
                $modifyPatient->birthdate = htmlspecialchars($_POST['birthdate']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['birthdate'] = 'Veuillez entrer une date valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['birthdate'] = 'Ce champ ne peut pas rester vide';
        }


        //Si $_POST['phone'] n'est pas vide
        if (!empty($_POST['phone']))
        {   //Si $_POST['phone'] passe la regex
            if (preg_match($phoneRegex, $_POST['phone']))
            {   //Associer la valeur de $_POST['phone'] a l'attribut $phone de l'instance $modifyPatient
                $modifyPatient->phone = htmlspecialchars($_POST['phone']);
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['phone'] = 'Veuillez entrer un numéro de téléphone valide';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['phone'] = 'Ce champ ne peut pas rester vide';
        }


        //Si $_POST['mail'] n'est pas vide
        if (!empty($_POST['mail']))
        {   //Si $_POST['mail'] passe le filter_var
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {   //Si $_POST['mail'] passe la regex
                if (preg_match($mailRegex, $_POST['mail']))
                {   //Associer la valeur de $_POST['mail'] a l'attribut $mail de l'instance $modifyPatient
                    $modifyPatient->mail = htmlspecialchars($_POST['mail']);
                }//Sinon
                else
                {   //Intégrer un message d'erreur dans le $formError
                    $formError['mail'] = 'Veuillez entrer un mail valide';
                }
            }//Sinon
            else
            {   //Intégrer un message d'erreur dans le $formError
                $formError['mail'] = 'La saisie n\'est pas une adresse mail';
            }
        }//Sinon
        else
        {   //Intégrer un message d'erreur dans le $formError
            $formError['mail'] = 'Ce champ ne peut pas rester vide';
        }

        //Si le nombres d'entrés contenu dans $formError est égal a 0
        if (count($formError) == 0)
        {   //Si la methode modfyProfilPAtient() de l'instance $modifyPatient est un success
            if ($modifyPatient->modifyProfilPatient() == true)
            {   //Afficher le message suivant
                echo 'Modification terminé';
            }//Sinon
            else
            {   //Afficher le message suivant
                echo 'La modification a échoué';
            }
        }
    }
    //Execution de la méthode getPatient() de l'instance $modifyPatient et intégration dans la variable $showPatients
    $showPatients = $modifyPatient->getPatient();

    //Appel de la page modify-patient.php
    require 'views/modify-patient.php';
}
