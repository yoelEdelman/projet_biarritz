<?php
require_once('dbConnect.php');

function getQuestions($questionId = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT *';
    $queryString .= ' FROM faq_questions';

    if ($questionId){
        $queryString .= ' WHERE id = :id';
    }

    $query = $db->prepare($queryString);

    if (!$questionId){
        $query->execute();
        return $query->fetchAll();
    }
    else{
        $query->execute(['id' => $questionId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

function addQuestions($question, $categoryId)
{
    $db = dbConnect();

    $queryString = 'INSERT INTO faq_questions (question, category_id ';
    $queryValues = 'VALUES (:question, :categoryId';
    $queryParameters = [
        'question' => htmlspecialchars($question),
        'categoryId' => htmlspecialchars($categoryId)
    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateQuestions($question, $categoryId, $questionId)
{
    $db = dbConnect();

    $queryString = 'UPDATE faq_questions SET question = :question, category_id = :categoryId ';
    $queryParameters = [
        'question' => htmlspecialchars($question),
        'categoryId' => htmlspecialchars($categoryId),
        'id' => htmlspecialchars($questionId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function deleteQuestions($id)
{
    $db = dbConnect();

    $queryString = 'DELETE FROM faq_answers';
    $queryString .= ' WHERE question_id = :id';

    $query = $db->prepare($queryString);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $queryString = 'DELETE FROM faq_questions';
    $queryString .= ' WHERE id = :id';

    $query = $db->prepare($queryString);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
}
