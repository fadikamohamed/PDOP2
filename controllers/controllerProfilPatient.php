<?php

function showPatient($id)
{
    $showPatient = NEW Patients();
    $showPatient->id = $id;
    $appointment = NEW Appointment();
    $appointment->idPatients = $id;
    $showAppointment = $appointment->getAppointmentByIdPatient();
    $showPatients = $showPatient->getPatient();
    require 'views/profil-patient.php';
}