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
        $queryString = 'INSERT INTO medias (img, video ';
        $queryValues = 'VALUES (:img, :video';

        $query = $this->getDb()->prepare($queryString);

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query->bindValue(':img', $this->getImg(), PDO::PARAM_STR);
        $query->bindValue(':video', $this->getVideo(), PDO::PARAM_STR);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }

    public function update($data)
    {
        $this->hydrate($data);

        $queryString = 'UPDATE medias SET img = :img, video = :video ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':img', $this->getImg(), PDO::PARAM_STR);
        $query->bindValue(':video', $this->getVideo(), PDO::PARAM_STR);

        $query->execute();
    }
}