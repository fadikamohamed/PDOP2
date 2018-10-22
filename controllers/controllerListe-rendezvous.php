<?php

function listRDV($id) {
    $appointmentObject = NEW Appointment();
    $appointmentObject->id = $id;
    $appointmentObject->deleteAppointment();
    $appointmentList = $appointmentObject->getAppointments();
    require 'views/liste-rendezvous.php';
}