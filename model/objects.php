<?php
require_once('dbConnect.php');

function getObjects($objectId = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT *';
    $queryString .= ' FROM objects';

    if ($objectId){
        $queryString .= ' WHERE id = :id';
    }

    $query = $db->prepare($queryString);

    if (!$objectId){
        $query->execute();
        return $query->fetchAll();
    }
    else{
        $query->execute(['id' => $objectId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

function addObjects($object)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO objects (object_name ';
    $queryValues = 'VALUES (:objectName';
    $queryParameters = [
        'objectName' => htmlspecialchars($object)
    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateObjects($object, $objectId)
{
    $db = dbConnect();

    $queryString = 'UPDATE objects SET object_name = :objectName ';
    $queryParameters = [
        'objectName' => htmlspecialchars($object),
        'id' => htmlspecialchars($objectId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function deleteObjects($id)
{
    $db = dbConnect();

    $queryString = 'DELETE FROM objects';
    $queryString .= ' WHERE id = :id';

    $query = $db->prepare($queryString);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
}