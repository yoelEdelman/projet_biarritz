<?php
require_once('dbConnect.php');

function getFaq()
{
    $db = dbConnect();

    $queryString = 'SELECT faq_questions.question, faq_questions.category_id, faq_answers.answer 
        FROM faq_questions
        INNER JOIN faq_answers
        ON faq_questions.id = faq_answers.question_id';

    $query = $db->prepare($queryString);
    $query->execute();

    return $query->fetchAll();
}
