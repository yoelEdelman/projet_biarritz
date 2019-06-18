<?php
require_once('dbConnect.php');

function getReasons($reasonId = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT *';
    $queryString .= ' FROM reasons';

    if ($reasonId){
        $queryString .= ' WHERE id = :id';
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

function addReasons($reason, $objectId)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO reasons (reason_name, object_id ';
    $queryValues = 'VALUES (:reasonName, :objectId';
    $queryParameters = [
        'reasonName' => htmlspecialchars($reason),
        'objectId' => htmlspecialchars($objectId)

    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateReasons($reason, $objectId, $reasonId)
{
    $db = dbConnect();

    $queryString = 'UPDATE reasons SET reason_name = :reasonName, object_id = :objectId ';
    $queryParameters = [
        'reasonName' => htmlspecialchars($reason),
        'objectId' => htmlspecialchars($objectId),
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