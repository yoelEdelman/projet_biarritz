<?php
require_once('dbConnect.php');

function getResponses($responseId = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT *';
    $queryString .= ' FROM faq_answers';

    if ($responseId){
        $queryString .= ' WHERE id = :id';
    }

    $query = $db->prepare($queryString);

    if (!$responseId){
        $query->execute();
        return $query->fetchAll();
    }
    else{
        $query->execute(['id' => $responseId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

function addResponses($response, $questionId)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO faq_answers (answer, question_id ';
    $queryValues = 'VALUES (:answer, :questionId';
    $queryParameters = [
        'answer' => htmlspecialchars($response),
        'questionId' => htmlspecialchars($questionId)
    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateResponses($response, $questionId, $responseId)
{
    $db = dbConnect();

    $queryString = 'UPDATE faq_answers SET answer = :answer, question_id = :questionId ';
    $queryParameters = [
        'answer' => $response,
        'questionId' => htmlspecialchars($questionId),
        'id' => htmlspecialchars($responseId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function deleteResponses($id)
{
    $db = dbConnect();

    $queryString = 'DELETE FROM faq_answers';
    $queryString .= ' WHERE id = :id';

    $query = $db->prepare($queryString);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
}
