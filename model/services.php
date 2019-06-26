<?php
require_once('dbConnect.php');
require_once('medias.php');
require_once('addresses.php');

    function getServices($serviceId = FALSE, $backOffice = FALSE)
    {
        $db = dbConnect();
        if ($serviceId){
            $queryString = 'SELECT s.*, DATE_FORMAT(s.hours_from, "%H:%i") AS hours_from_formated, 
            DATE_FORMAT(s.hours_to, "%H:%i") AS hours_to_formated, GROUP_CONCAT(m.name) AS name, 
            a.address, a.zip_code, a.city, a.country, a.location';
        }
        else{
            $queryString = 'SELECT s.id, s.title, s.summary, s.is_published, GROUP_CONCAT(m.name) AS name';
        }

        $queryString .= ' FROM addresses a INNER JOIN services s
        ON a.id = s.address_id
        INNER JOIN medias m
        ON s.id = m.service_id';

        if (!$serviceId && !$backOffice){
            $queryString .= ' WHERE is_published = 1
            GROUP BY s.id';
        }
        elseif (!$serviceId && $backOffice){
            $queryString .= ' GROUP BY s.id
            ORDER BY created_at DESC';
        }
        elseif ($serviceId && !$backOffice){
            $queryString .= ' WHERE is_published = 1 AND s.id = :id';
        }
        elseif ($serviceId && $backOffice){
            $queryString .= ' WHERE s.id = :id';
        }

        $query = $db->prepare($queryString);
        if (!$serviceId){
            $query->execute();
            return $query->fetchAll();
        }
        else{
            $query->execute(['id' => $serviceId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    function addServices($address, $zipCode, $city, $country, $location, $title, $summary, $content, $phoneNumber, $openingDays, $hoursFrom, $hoursTo, $isPublished, $files)
    {
        $db = dbConnect();

        $medias = checkMedias($files);

        $lastInsert = addAddress($address, $zipCode, $city, $country, $location);

        $queryString = 'INSERT INTO services (title, summary, content, phone_number, opening_days, hours_from, hours_to, is_published, address_id ';
        $queryValues = 'VALUES (:title, :summary, :content, :phoneNumber, :openingDays, :hoursFrom, :hoursTo, :isPublished, :addressId';
        $queryParameters = [
            'title' => htmlspecialchars($title),
            'summary' => htmlspecialchars(ucfirst($summary)),
            'content' => $content,
            'phoneNumber' => htmlspecialchars($phoneNumber),
            'openingDays' => htmlspecialchars($openingDays),
            'hoursFrom' => htmlspecialchars($hoursFrom),
            'hoursTo' => htmlspecialchars($hoursTo),
            'isPublished' => htmlspecialchars($isPublished),
            'addressId' => htmlspecialchars($lastInsert)
        ];

        $queryString .= ') ';
        $queryValues .= ')';
        $queryString .= $queryValues;

        $query = $db->prepare($queryString);
        $result = $query->execute($queryParameters);

        $lastInsert = $db->lastInsertId();

        foreach ($medias as $media){
            addMedias($media['name'], $media['typeId'], $lastInsert, FALSE);
        }

        return $result;
    }

    function updateServices($address, $zipCode, $city, $country, $location, $title, $summary, $content, $phoneNumber, $openingDays, $hoursFrom, $hoursTo, $isPublished, $addressId, $serviceId, $files, $currentMedias)
    {
        $db = dbConnect();

        if (isset($files['media']['name'][0]) && !empty($files['media']['name'][0])){
            $medias = checkMedias($files);
            updateMedias($currentMedias, $medias, $serviceId);
        }

        updateAddress($address, $zipCode, $city, $country, $location, $addressId);

        $queryString = 'UPDATE services SET title = :title, summary = :summary, content = :content, phone_number = :phoneNumber, opening_days = :openingDays, hours_from = :hoursFrom, hours_to = :hoursTo, is_published = :isPublished ';
        $queryParameters = [
            'title' => htmlspecialchars($title),
            'summary' => htmlspecialchars(ucfirst($summary)),
            'content' => $content,
            'phoneNumber' => htmlspecialchars($phoneNumber),
            'openingDays' => htmlspecialchars($openingDays),
            'hoursFrom' => htmlspecialchars($hoursFrom),
            'hoursTo' => htmlspecialchars($hoursTo),
            'isPublished' => htmlspecialchars($isPublished),
            'id' => htmlspecialchars($serviceId)
        ];
        $queryString .= 'WHERE id = :id';

        $query = $db->prepare($queryString);
        return $query->execute($queryParameters);
    }

    function deleteServices($id, $currentMedias = FALSE)
    {
        $db = dbConnect();

        $query = $db->prepare('SELECT s.address_id, GROUP_CONCAT(m.name) AS name
        FROM services s INNER JOIN medias m
        ON s.id = m.service_id
        WHERE s.id = :id ');
        $query->execute(['id' => $id]);
        $data = $query->fetch();

        deleteAddresses($data['address_id']);
        deleteMedias($data['name'], $id);

        $queryString = 'DELETE FROM services';
        $queryString .= ' WHERE id = :id';

        $query = $db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        return $query->execute();
    }
