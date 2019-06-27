<?php
require_once('dbConnect.php');
require_once('medias.php');
require_once('addresses.php');

    function getEvents($eventId = FALSE, $backOffice = FALSE, $eventDate = FALSE)
    {
        $db = dbConnect();
        if ($eventId){
            $queryString = 'SELECT e.*, DATE_FORMAT(e.event_time, "%H:%i") AS event_time_formated, GROUP_CONCAT(m.name) AS name, a.address, a.zip_code, a.city, a.country, a.location, c.id AS category_id, c.name AS category_name';
        }
        else{
            $queryString = 'SELECT e.id, e.title, e.summary, e.is_published, GROUP_CONCAT(m.name) AS name, c.name AS category_name';
        }

        $queryString .= ' FROM addresses a INNER JOIN events e
        ON a.id = e.address_id
        INNER JOIN medias m
        ON e.id = m.event_id
        INNER JOIN categories c
        ON c.id = e.category_id';

        if (!$eventId && !$backOffice && !$eventDate){
            $queryString .= ' WHERE is_published = 1
            GROUP BY e.id';
        }
        elseif (!$eventId && $backOffice){
            $queryString .= ' GROUP BY e.id
            ORDER BY created_at DESC';
        }
        elseif ($eventId && !$backOffice){
            $queryString .= ' WHERE is_published = 1 AND e.id = :id';
        }
        elseif (!$eventId && !$backOffice && $eventDate){
            $queryString .= ' WHERE is_published = 1 AND e.event_date = :eventDate
            GROUP BY e.id
            ORDER BY created_at DESC';
        }
        elseif ($eventId && $backOffice){
            $queryString .= ' WHERE e.id = :id';
        }

        $query = $db->prepare($queryString);

        if (!$eventId){
            if ($eventDate){
                $query->execute(['eventDate' => $eventDate]);
            }
            else{
                $query->execute();
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $query->execute(['id' => $eventId]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    function addEvents($address, $zipCode, $city, $country, $location, $title, $summary, $content, $eventDate, $eventTime, $phoneNumber, $isPublished, $publishedAt, $categoryId, $files)
    {
        $db = dbConnect();

        $medias = checkMedias($files);

        $lastInsert = addAddress($address, $zipCode, $city, $country, $location);

        $queryString = 'INSERT INTO events (title, summary, content, event_date, event_time, phone_number, is_published, published_at, address_id, category_id ';
        $queryValues = 'VALUES (:title, :summary, :content, :eventDate, :eventTime, :phoneNumber, :isPublished, :publishedAt, :addressId, :categoryId';
        $queryParameters = [
            'title' => htmlspecialchars($title),
            'summary' => htmlspecialchars(ucfirst($summary)),
            'content' => $content,
            'eventDate' => htmlspecialchars($eventDate),
            'eventTime' => htmlspecialchars($eventTime),
            'phoneNumber' => htmlspecialchars($phoneNumber),
            'isPublished' => htmlspecialchars($isPublished),
            'publishedAt' => htmlspecialchars($publishedAt),
            'addressId' => htmlspecialchars($lastInsert),
            'categoryId' => htmlspecialchars($categoryId)
        ];

        $queryString .= ') ';
        $queryValues .= ')';
        $queryString .= $queryValues;

        $query = $db->prepare($queryString);
        $result = $query->execute($queryParameters);

        $lastInsert = $db->lastInsertId();

        foreach ($medias as $media){
            addMedias($media['name'], $media['typeId'], FALSE, $lastInsert);
        }

        return $result;
    }

    function updateEvents($address, $zipCode, $city, $country, $location, $title, $summary, $content, $eventDate, $eventTime, $phoneNumber, $isPublished, $publishedAt, $addressId, $eventId, $categoryId, $files, $currentMedias)
    {
        $db = dbConnect();

        if (isset($files['media']) && !empty($files['media'])){
            $medias = checkMedias($files);
            updateMedias($currentMedias, $medias, FALSE, $eventId);
        }

        updateAddress($address, $zipCode, $city, $country, $location, $addressId);

        $queryString = 'UPDATE events SET title = :title, summary = :summary, content = :content, event_date = :eventDate, event_time = :eventTime, phone_number = :phoneNumber, is_published = :isPublished, published_at = :publishedAt, category_id = :categoryId ';
        $query_parameters = [
            'title' => htmlspecialchars($title),
            'summary' => htmlspecialchars(ucfirst($summary)),
            'content' => $content,
            'eventDate' => htmlspecialchars($eventDate),
            'eventTime' => htmlspecialchars($eventTime),
            'phoneNumber' => htmlspecialchars($phoneNumber),
            'isPublished' => htmlspecialchars($isPublished),
            'publishedAt' => htmlspecialchars($publishedAt),
            'categoryId' => htmlspecialchars($categoryId),
            'id' => htmlspecialchars($eventId)
        ];

        $queryString .= 'WHERE id = :id';

        $query = $db->prepare($queryString);

        return $query->execute($query_parameters);
    }

    function deleteEvents($id, $currentMedias = FALSE)
    {
        $db = dbConnect();

        $query = $db->prepare('SELECT e.address_id, GROUP_CONCAT(m.name) AS name
        FROM events e INNER JOIN medias m
        ON e.id = m.event_id
        WHERE e.id = :id ');
        $query->execute(['id' => $id]);
        $data = $query->fetch();

        deleteAddresses($data['address_id']);
        deleteMedias($data['name'], FALSE, $id);

        $queryString = 'DELETE FROM events';
        $queryString .= ' WHERE id = :id';

        $query = $db->prepare($queryString);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        return $query->execute();
    }
