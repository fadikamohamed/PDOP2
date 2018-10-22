<?php

//Déclaration des régex
    $lastnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    $firstnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    $dateRegex = '/./';
    /*$dateRegex = '/([1][\d]?|[2][\d]|[3][0-1])[\/\-._ ]?([1-9]|(10|11|12))[\/\-._ ]?[\d]{4}/';*/
    $phoneRegex = '/^[0][1-9]([\/\- .]?[\d]{2}){4}$/';
    $mailRegex = '/^[\w]*[.]?[\w]*[@][\w]*[.](fr|org|net|com)$/';
    $hourRegex = '/./';
    $formError = [];
    ?>