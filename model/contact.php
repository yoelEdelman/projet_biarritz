<?php
require_once('dbConnect.php');

function getReasons($reasonId = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT *';
    $queryString .= ' FROM reasons';

    if ($reasonId){
        $queryString .= ' WHERE s.id = :id';
    }

    $query = $db->prepare($queryString);

    if (!$reasonId){
        $query->execute();
        return $query->fetchAll();
    }
    else{
        $query->execute(['id' => $reasonId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

function addReasons($reason)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO reasons (reason_name ';
    $queryValues = 'VALUES (:reasonName';
    $queryParameters = [
        'reasonName' => htmlspecialchars($reason)
    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateReasons($reason, $reasonId)
{
    $db = dbConnect();

    $queryString = 'UPDATE reasons SET reason_name = :reasonName ';
    $queryParameters = [
        'reasonName' => htmlspecialchars($reason),
        'id' => htmlspecialchars($reasonId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function deleteReasons($id)
{
    $db = dbConnect();

    $queryString = 'DELETE FROM reasons';
    $queryString .= ' WHERE id = :id';

    $query = $db->prepare($queryString);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
}