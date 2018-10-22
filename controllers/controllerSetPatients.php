<?php

//Déclaration de la fonction addPatient()
function addPatient()
{   //Appel du fichier des regex
    require 'assets/regex.php';


    //Si le submit est envoyé
    if (isset($_POST['submit']))
    {   //Déclaration de l'instance d'objet newPatient de l'objet Patient().
        $newPatient = NEW Patients();
        //Si $_POST['lastname'] n'est pas vide
        if (!empty($_POST['lastname']))
        {   //Si $_POST['lastname'] passe la regex
            if (preg_match($lastnameRegex, $_POST['lastname']))
            {  //Intégrer $_POST['lastname'] dans l'attribut $lastname de l'objet Patient().
                $newPatient->lastname = htmlspecialchars($_POST['lastname']);
            }//Sinon
            else
            {  //Intérger une phrase d'érreur dans le tableau $formError
                $formError['lastname'] = 'Veuillez entrer un nom valide !';
            }
        }//Sinon
        else
        {  //Intérger une phrase d'érreur dans le tableau $formError
            $formError['lastname'] = 'Ce champ ne peut pas rester vide';
        }


        //Si $_POST['firstname'] n'est pas vide
        if (!empty($_POST['firstname']))
        {   //Si $_POST['firstname'] passe la regex
            if (preg_match($firstnameRegex, $_POST['firstname']))
            {   //Intégrer $_POST['firstname'] dans l'attribut $firstname de l'objet Patient().
                $newPatient->firstname = htmlspecialchars($_POST['firstname']);
            }//Sinon
            else
            {   //Intérger une phrase d'érreur dans le tableau $formError
                $formError['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }//Sinon
        else
        {   //Intérger une phrase d'érreur dans le tableau $formError
            $formError['firstname'] = 'Ce champ de peut pas rester vide';
        }


        //Si $_POST['birthdate'] n'est pas vide
        if (!empty($_POST['birthdate']))
        {   //Si $_POST['birthdate'] passe la regex
            if (preg_match($dateRegex, $_POST['birthdate']))
            {   //Intégrer $_POST['birthdate'] dans l'attribut $birthdate de l'objet Patient().
                $newPatient->birthdate = htmlspecialchars($_POST['birthdate']);
            }//Sinon
            else
            {   //Intérger une phrase d'érreur dans le tableau $formError
                $formError['birthdate'] = 'Veuillez entrer une date valide';
            }
        }//Sinon
        else
        {   //Intérger une phrase d'érreur dans le tableau $formError
            $formError['birthdate'] = 'Ce champ de peut pas rester vide';
        }


        //Si $_POST['phone'] n'est pas vide
        if (!empty($_POST['phone']))
        {   //Si $_POST['phone'] passe la regex
            if (preg_match($phoneRegex, $_POST['phone']))
            {   //Intégrer $_POST['phone'] dans l'attribut $phone de l'objet Patient().
                $newPatient->phone = htmlspecialchars($_POST['phone']);
            }//Sinon
            else
            {   //Intérger une phrase d'érreur dans le tableau $formError
                $formError['phone'] = 'Veuillez entrer un numéro de téléphone valide';
            }
        }//Sinon
        else
        {   //Intérger une phrase d'érreur dans le tableau $formError
            $formError['phone'] = 'Ce champ de peut pas rester vide';
        }


        //Si $_POST['mail'] n'est pas vide
        if (!empty($_POST['mail']))
        {   //Si $_POST['mail'] passe le filtre
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {   //Si $_POST['mail'] passe la regex
                if (preg_match($mailRegex, $_POST['mail']))
                {   //Intégrer $_POST['mail'] dans l'attribut $mail de l'objet Patient().
                    $newPatient->mail = htmlspecialchars($_POST['mail']);
                }//Sinon
                else
                {   //Intérger une phrase d'érreur dans le tableau $formError
                    $formError['mail'] = 'Veuillez entrer un mail valide';
                }
            }//Sinon
            else
            {   //Intérger une phrase d'érreur dans le tableau $formError
                $formError['mail'] = 'La saisie n\'est pas une adresse mail';
            }
        }//Sinon
        else
        {   //Intérger une phrase d'érreur dans le tableau $formError
            $formError['mail'] = 'Ce champ de peut pas rester vide';
        }
        //Si le nombre d'entrer dans formError est égal a 0
        if (count($formError) == 0)
        {   //Intégrer la méthode verifPatientExist() dans la variable $errorDouble
            $errorDouble = $newPatient->verifPatientExist();
            //Si $errorDouble n'est pas vide et qu'il est égal a 'absent'
            if (!empty($errorDouble) && $errorDouble == 'absent')
            {   //Si la méthode $newPatient->setPatient() échoue
                if (!$newPatient->setPatient())
                {
                    
                }//Sinon
                else
                { //Afficher un message d'érreur
                    echo 'L\'enregistrement a échoué';
                }
            }
        }
    }//Inclure la vue ajout-patient
    require 'views/ajout-patient.php';
}
