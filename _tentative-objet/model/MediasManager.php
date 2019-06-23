<?php
abstract class MediasManager extends dbConnect
{
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($this->snakeCaseToCamelCase($key));

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function snakeCaseToCamelCase($string)
    {
        $str = str_replace('_', '', ucwords($string, '_'));
        return $str;
    }


    public function add()
    {
        $queryString = 'INSERT INTO medias (name, type_id ';
        $queryValues = 'VALUES (:name, :typeId';

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $query->bindValue(':typeId', $this->getTypeId(), PDO::PARAM_INT);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }

    public function update($data)
    {
        $this->hydrate($data);

        $queryString = 'UPDATE medias SET name = :name, type_id = :typeId ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $query->bindValue(':typeId', $this->getTypeId(), PDO::PARAM_INT);

        $query->execute();
    }

    public function checkMedias($files)
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
                $media["typeId"] = 1;

                do {
                    $newFileName = rand() . time() . $files['media']['name'][$key];
                    $destination = '././assets/img/' . $newFileName;

                } while (file_exists($destination));
                $result = move_uploaded_file($files['media']['tmp_name'][$key], $destination);
                if (!$result){
                    $errors['error'] = "Erreur.";
                }
                $media["name"] = $newFileName;
            }
            elseif(in_array($fileExtension , $allowedVideoExtensions)){
                if ($files['media']['size'][$key] > 1048576){
                    $errors['size'] = 'Votre fichier est trop lourd !';
                }
                $media["typeId"] = 2;
                do {
                    $newFileName = rand() . time() . $files['media']['name'][$key];
                    $destination = '././assets/video/' . $newFileName;
                } while (file_exists($destination));
                $result = move_uploaded_file($files['media']['tmp_name'][$key], $destination);
                if (!$result){
                    $errors['error'] = "Erreur.";
                }
                $media["name"] = $newFileName;
            }
            else {
                $errors['type'] = "Le type de fichier n'est pas conforme !";
            }
            array_push($medias, $media);
        }
        return $medias;
    }
}