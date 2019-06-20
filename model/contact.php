<?php
require_once('dbConnect.php');

function sendProblemForm($address, $email, $description, $objectId, $reasonId)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO signal_problem (address, email, description, object_id, reason_id ';
    $queryValues = 'VALUES (:address, :email, :description, :objectId, :reasonId';
    $queryParameters = [
        'address' => htmlspecialchars($address),
        'email' => htmlspecialchars($email),
        'description' => htmlspecialchars($description),
        'objectId' => htmlspecialchars($objectId),
        'reasonId' => htmlspecialchars($reasonId)
    ];

    $queryString .= ') ';
    $queryValues .= ')';

    $queryString .= $queryValues;

    $query = $db->prepare($queryString);

    return $query->execute($queryParameters);
}

function sendContactForm($name, $firstName, $phoneNumber, $email, $description)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO contact_us (last_name, first_name, phone_number, email, description ';
    $queryValues = 'VALUES (:name, :firstName, :phoneNumber, :email, :description';
    $queryParameters = [
        'name' => htmlspecialchars($name),
        'firstName' => htmlspecialchars($firstName),
        'phoneNumber' => htmlspecialchars($phoneNumber),
        'email' => htmlspecialchars($email),
        'description' => htmlspecialchars($description)
    ];

    $queryString .= ') ';
    $queryValues .= ')';

    $queryString .= $queryValues;

    $query = $db->prepare($queryString);

    return $query->execute($queryParameters);
}