<?php
require_once('dbConnect.php');

    function getCategoriesList()
    {
        $db = dbConnect();
        $query = $db->query('SELECT * FROM categories');
        return $query->fetchAll();
    }

    function getCategory($categoryId)
    {
        $db = dbConnect();
        $query = $db->prepare('SELECT * FROM categories WHERE id = :id');
        $queryParameters = [
            'id' => htmlspecialchars($categoryId)
        ];

        $query->execute($queryParameters);

        return $query->fetch();
    }

    function addCategory($name)
    {
        $db = dbConnect();
        $queryString = 'INSERT INTO categories (name) ';
        $queryValues = 'VALUES (:name)';
        $queryParameters = [
            'name' => htmlspecialchars($name)
        ];

        $queryString .= $queryValues;

        $query = $db->prepare($queryString);
        $query->execute($queryParameters);

        return $db->lastInsertId();
    }

    function updateCategory($name, $categoryId)
    {
        $db = dbConnect();
        $queryString = 'UPDATE categories SET name = :name ';
        $queryString .= 'WHERE id = :id';
        $queryParameters = [
            'name' => htmlspecialchars($name),
            'id' => htmlspecialchars($categoryId)
        ];

        $query = $db->prepare($queryString);
        $query->execute($queryParameters);
    }
