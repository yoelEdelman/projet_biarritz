<?php
require_once('dbConnect.php');
require_once('medias.php');

function getBills($userId)
{
    $db = dbConnect();

    $queryString = 'SELECT *, DATE_FORMAT(bill_from,\'%d/%m/%Y\') AS formated_bill_from, 
        DATE_FORMAT(bill_to,\'%d/%m/%Y\') AS formated_bill_to,
        medias.name
        FROM bills INNER JOIN medias
        ON bills.id = medias.bill_id
        WHERE user_id = :id';

    $query = $db->prepare($queryString);

    $query->execute(['id' => $userId]);
    return $query->fetchAll();
}

function addBills($billFrom, $billTo, $amountDue, $paid, $userId, $bill)
{
    $db = dbConnect();

    $bill = checkPdf($bill);

    $queryString = 'INSERT INTO bills (bill_from, bill_to, amount_due, paid, user_id ';
    $queryValues = 'VALUES (:billFrom, :billTo, :amountDue, :paid, :userId';
    $queryParameters = [
        'billFrom' => htmlspecialchars($billFrom),
        'billTo' => htmlspecialchars(ucfirst($billTo)),
        'amountDue' => htmlspecialchars($amountDue),
        'paid' => htmlspecialchars($paid),
        'userId' => htmlspecialchars($userId)
    ];

    $queryString .= ') ';
    $queryValues .= ')';
    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    $query->execute($queryParameters);

    $lastInsert = $db->lastInsertId();

    return addMedias($bill, 3, FALSE, FALSE, $lastInsert);
}