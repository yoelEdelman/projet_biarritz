<?php

require_once('dbConnect.php');

    function addAddress($address, $zipCode, $city, $country, $location = FALSE)
    {
        $db = dbConnect();
        $queryString = 'INSERT INTO addresses (address, zip_code, city ';
        $queryValues = 'VALUES (:address, :zipCode, :city';
        $queryParameters = [
            'address' => htmlspecialchars($address),
            'zipCode' => htmlspecialchars($zipCode),
            'city' => htmlspecialchars($city)
        ];

        if (isset($country) && !empty($country)) {
            $queryString .= ', country ';
            $queryValues .= ', :country';
            $queryParameters['country'] = htmlspecialchars($country);
        }
        elseif (isset($location) && !empty($location)) {
            $queryString .= ', location ';
            $queryValues .= ', :location';
            $queryParameters['location'] = htmlspecialchars($location);

        }

        $queryString .= ') ';
        $queryValues .= ')';
        $queryString .= $queryValues;

        $query = $db->prepare($queryString);

        $query->execute($queryParameters);

        return $lastInsert = $db->lastInsertId();
    }

    function updateAddress($address, $zipCode, $city, $country, $location = FALSE, $id)
    {
        $db = dbConnect();
        $queryString = 'UPDATE addresses SET address = :address, zip_code = :zipCode, city = :city ';
        $queryParameters = [
            'address' => htmlspecialchars($address),
            'zipCode' => htmlspecialchars($zipCode),
            'city' => htmlspecialchars($city)
        ];

        if (isset($country) && !empty($country)) {
            $queryString .= ', country = :country ';
            $queryParameters['country'] = htmlspecialchars($country);
        }
        elseif (isset($location) && !empty($location)) {
            $queryString .= ', location = :location ';
            $queryParameters['location'] = htmlspecialchars($location);

        }
        $queryString .= 'WHERE id = :id';
        $queryParameters['id'] = htmlspecialchars($id);

        $query = $db->prepare($queryString);
        $query->execute($queryParameters);
    }

    function deleteAddresses($id)
    {
        $db = dbConnect();
        $queryString = 'DELETE FROM addresses';
        $queryString .= ' WHERE id = :id';

        $query = $db->prepare($queryString);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();
    }
