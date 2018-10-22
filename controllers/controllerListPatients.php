<?php
//Déclaration de la fonction listPatient()
function listPatient()
{   //Déclaration de l'instance $listPatientObjet de la class Patients()
    $listPatientObject = NEW Patients();
    //Si $_GET['page'] n'est pas vide
    if (!empty($_GET['page']))
    {   //Déclaration de la variable $page qui est égal a $_GET['page']
        $page = htmlspecialchars($_GET['page']);
        //La variable $limite est égal a 5
        $limit = 5;
        //Association de la valeur de la variable $limit a l'attribut $limit de l'instance $listPatientObject
        $listPatientObject->limit = $limit;
        //Déclaration de la variable $offset qui est égal a la valeur de $page moins 1 multiplié par la valeur de $limit
        $offset = ($page - 1) * $limit;
        //Association de la valeur de la variable $offset a l'attribut $offset de l'instance $listPatientObject
        $listPatientObject->offset = $offset;
    }//Sinon
    else
    {   //Déclaration de la variable $page qui est égale a 1
        $page = 1;
        //La variable $limite est égal a 5
        $limit = 5;
        //Association de la valeur de la variable $limit a l'attribut $limit de l'instance $listPatientObject
        $listPatientObject->limit = $limit;
        //Déclaration de la variable $offset qui est égal a la valeur de $page moins 1 multiplié par la valeur de $limit
        $offset = ($page - 1) * $limit;
        //Association de la valeur de la variable $offset a l'attribut $offset de l'instance $listPatientObject
        $listPatientObject->offset = $offset;
    }
    //Si $_GET['delete'] n'est pas vide
    if (!empty($_GET['delete']))
    {   //Déclaration de la variable $id qui est égal a $_GET['delete']
        $id = htmlspecialchars($_GET['delete']);
        //Association de la valeur de la variable $id a l'attribut $id de l'instance $listPatientObject
        $listPatientObject->id = $id;
        //Éxécuter la méthode deletePatientAndAppointments() de l'instance $listPatientObject
        $listPatientObject->deletePatientAndAppointments();
    }

    //Si $_POST['nameAsked'] n'est pas vide
    if (!empty($_POST['nameAsked']))
    {   //Déclaration de la variable $search qui est égale a $_POST['nameAsked']
        $search = htmlspecialchars($_POST['nameAsked']);
        //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        $search = strip_tags($search);
        //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
        $search = trim($search);
        $lastnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
        if (preg_match($lastnameRegex, $search))
        {
            //Association de la valeur de la variable $search a l'attribut $lastname de l'instance $listPatientObject
            //$listPatientObject->lastname = $search; 
                   
            //Éxécution de la méthode findPatientByLastname() de l'instance $listPatientObject et intégration dans $listPatients
            $listPatients = $listPatientObject->findPatientByLastname($search);
            //Éxécution de la méthode numberOfLines() de l'instance $listPatientObject et intégration dans $numberOfLines
            $numberOfLines = $listPatientObject->numberOfLines;
            //Diviser la valeur de la variable $numberOfLines par $limit, arrodir a l'entier supperieur et intégrer dans la variable $numberOfPage
            $numberOfPage = ceil($numberOfLines / $limit);
        }
        else
        {   
            $error = 'Recherche invalide';
        }
    }//Sinon
    else
    {   //Éxécution de la méthode getListPatient() de l'instance $listPatientObject et intégration dans $listPatients
        $listPatients = $listPatientObject->getListPatient();
        //Éxécution de la méthode numberOfLines() de l'instance $listPatientObject et intégration dans $numberOfLines
        $numberOfLines = $listPatientObject->numberOfLines;
        //Diviser la valeur de la variable $numberOfLines par $limit, arrodir a l'entier supperieur et intégrer dans la variable $numberOfPage
        $numberOfPage = ceil($numberOfLines / $limit);
    }
    require 'views/liste-patients.php';
}
