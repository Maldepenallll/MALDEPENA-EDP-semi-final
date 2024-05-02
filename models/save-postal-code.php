<?php

$registration = array(
    'postal_regCode' => "'" . $_POST['inp_region'] . "'",
    'postal_provCode' => "'" . $_POST['inp_province'] . "'",
    'postal_citymunCode' => "'" . $_POST['inp_city'] . "'",
    'postal_code' => "'" . $_POST['inp_postal-code'] . "'",
);

save($registration);

function save($data)
{
    include('../config/database.php');

    $attributes = implode(", ", array_keys($data));
    $values = implode(", ", array_values($data));
    
    $query = "INSERT INTO ph_postalcode ($attributes) VALUES ($values)";

    if ($conn->query($query) == TRUE) {
        header('location: /postal-code.php?success');
    } else {
        header('location: /postal-code.php?invalid');
    }

    $conn->close();
}