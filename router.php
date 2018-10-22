<?php
//Si $_GET['action'] existe
if (isset($_GET['action']))
{  //Si $_GET['action'] est égal a 'add-patient'
    if ($_GET['action'] == 'add-patient')
    {  //Appeler le controller
        require 'controllers/controllerSetPatients.php';
        addPatient();
    }
    elseif ($_GET['action'] == 'list-patient')
    {
        require 'controllers/controllerListPatients.php';
        if (isset($_GET['delete']))
        {
            if (is_numeric($_GET['delete']))
            {
                listPatient();
            }
        }
        elseif (isset($_GET['page']))
        {
            listPatient();
        }
        else
        {
            listPatient();
        }
    }
    elseif ($_GET['action'] == 'add-rendez-vous')
    {
        require 'controllers/controllerAddRendezVous.php';
        addRendezVous();
    }
    elseif ($_GET['action'] == 'list-rendez-vous')
    {
        require 'controllers/controllerListe-rendezvous.php';
        if (isset($_GET['delete']))
        {
            if (is_numeric($_GET['delete']))
            {
                $id = htmlspecialchars($_GET['delete']);
                listRDV($id);
            }
        }
        else
        {
            listRDV(1);
        }
    }
}
elseif (isset($_GET['patient']))
{
    if (is_numeric($_GET['patient']))
    {
        require 'controllers/controllerProfilPatient.php';
        $id = htmlspecialchars($_GET['patient']);
        showPatient($id);
    }
}
elseif (isset($_GET['patient-modif']))
{
    if (is_numeric($_GET['patient-modif']))
    {
        require 'controllers/controllerModifyPatient.php';
        $id = htmlspecialchars($_GET['patient-modif']);
        modifyPatientPage($id);
    }
}
elseif (isset($_GET['appointment']))
{
    require 'controllers/controllerRendez-vous.php';
    if (is_numeric($_GET['appointment']))
    {
        $id = htmlspecialchars($_GET['appointment']);
        appointmentDetails($id);
    }
    elseif (isset($_GET['appointment']) && isset($_GET['delete']))
    {
        
    }
}
elseif (isset($_GET['appointment-modif']))
{
    if (is_numeric($_GET['appointment-modif']))
    {
        require 'controllers/controllerModify-appointment.php';
        $id = htmlspecialchars($_GET['appointment-modif']);
        modifAppointmentPage($id);
    }
}
else
{
    require 'views/Accueil.php';
}