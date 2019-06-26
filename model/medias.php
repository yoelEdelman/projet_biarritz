<?php
require_once('dbConnect.php');

    function addMedias($name, $typeId, $serviceId = FALSE, $eventId = FALSE, $billId = FALSE)
    {
        $db = dbConnect();
        $queryString = 'INSERT INTO medias (name, type_id ';
        $queryValues = 'VALUES (:name, :typeId';
        $queryParameters = [
            'name' => htmlspecialchars($name),
            'typeId' => htmlspecialchars($typeId)
        ];

        if (isset($serviceId) && !empty($serviceId)) {
            $queryString .= ', service_id ';
            $queryValues .= ', :serviceId';
            $queryParameters['serviceId'] = htmlspecialchars($serviceId);
        }
        elseif (isset($eventId) && !empty($eventId)) {
            $queryString .= ', event_id ';
            $queryValues .= ', :eventId';
            $queryParameters['eventId'] = htmlspecialchars($eventId);
        }
        elseif (isset($billId) && !empty($billId)) {
            $queryString .= ', bill_id ';
            $queryValues .= ', :billId';
            $queryParameters['billId'] = htmlspecialchars($billId);
        }

        $queryString .= ') ';
        $queryValues .= ')';
        $queryString .= $queryValues;

        $query = $db->prepare($queryString);
        return $query->execute($queryParameters);
    }

    function deleteMedias($currentMedias = FALSE, $serviceId = FALSE, $eventId = FALSE)
    {
        $db = dbConnect();
        $queryString = 'DELETE FROM medias';

        if ($serviceId){
            $queryString .= ' WHERE service_id = :serviceId';
        }
        elseif ($eventId){
            $queryString .= ' WHERE event_id = :eventId';
        }

        $query = $db->prepare($queryString);

        if ($serviceId){
            $query->bindParam(':serviceId', $serviceId, PDO::PARAM_INT);
        }
        elseif ($eventId){
            $query->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        }

        $medias = explode(',', $currentMedias);
        foreach ($medias as $media){
            unlink('././assets/img/' . $media);
        }

        $query->execute();
    }

    function updateMedias($currentMedias, $medias, $serviceId = FALSE, $eventId = FALSE)
    {
        if ($serviceId){
            deleteMedias($currentMedias, $serviceId);
            foreach ($medias as $media){
                addMedias($media['name'], $media['typeId'], $serviceId, FALSE);
            }
        }
        elseif ($eventId){
            deleteMedias($currentMedias, FALSE, $eventId);
            foreach ($medias as $media){
                addMedias($media['name'], $media['typeId'], FALSE, $eventId);
            }
        }
    }

    function checkMedias($files)
    {
        $allowedImgExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
        $allowedVideoExtensions = ['mp4'];
        $medias = [];

        foreach ($files['media']['name'] as $key => $value){

            $media = [];
            $fileExtension = pathinfo($files['media']['name'][$key], PATHINFO_EXTENSION);

            if(in_array($fileExtension , $allowedImgExtensions)){

                if ($files['media']['size'][$key] > 1000000){

                    $errors['size'] = 'Votre fichier est trop lourd !';
                }
                $media['typeId'] = 1;

                do {
                    $newFileName = rand() . time() . $files['media']['name'][$key];
                    $destination = '././assets/img/' . $newFileName;

                } while (file_exists($destination));
                $result = move_uploaded_file($files['media']['tmp_name'][$key], $destination);
                if (!$result){
                    $errors['error'] = "Erreur.";
                }
                $media['name'] = $newFileName;
            }
            elseif(in_array($fileExtension , $allowedVideoExtensions)){
                if ($files['media']['size'][$key] > 1048576){
                    $errors['size'] = 'Votre fichier est trop lourd !';
                }
                $media['typeId'] = 2;
                do {
                    $newFileName = rand() . time() . $files['media']['name'][$key];
                    $destination = '././assets/video/' . $newFileName;

                } while (file_exists($destination));
                $result = move_uploaded_file($files['media']['tmp_name'][$key], $destination);
                if (!$result){
                    $errors['error'] = "Erreur.";
                }
                $media['name'] = $newFileName;
            }
            else {
                $errors['type'] = "Le type de fichier n'est pas conforme !";
            }
            array_push($medias, $media);
        }
        return $medias;
    }

function checkPdf($pdf)
{
    $allowedPdfExtensions = ['pdf'];
    $fileExtension = pathinfo($pdf['name'], PATHINFO_EXTENSION);

    if(in_array($fileExtension , $allowedPdfExtensions)){
        do {
            $newFileName = rand() . time() . $pdf['name'];
            $destination = '././assets/pdf/' . $newFileName;

        } while (file_exists($destination));
        $result = move_uploaded_file($pdf['tmp_name'], $destination);
        if (!$result){
            $errors['error'] = "Erreur.";
        }
        else{
            return $newFileName;
        }
    }
    else {
        $errors['type'] = "Le type de fichier n'est pas conforme !";
    }
}
