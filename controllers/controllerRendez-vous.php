<?php

function appointmentDetails($id){
    $details = NEW Appointment();
    $details->id = $id;
    $detailsList = $details->getAppointmentById();
    require 'views/rendez-vous.php';
}