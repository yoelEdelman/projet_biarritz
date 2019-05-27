<?php
abstract class AddressesManager extends dbConnect
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

    public function getList()
    {
        return $this->getDb()->query('SELECT * FROM addresses')->fetchAll(PDO::FETCH_CLASS, 'Addresses');
    }

    public function get($addressId)
    {
        $query = $this->getDb()->prepare('SELECT * FROM addresses WHERE id = :id');

        $query->bindValue(':id', $addressId, PDO::PARAM_INT);
        $query->execute();

        return new Addresses($query->fetch(PDO::FETCH_ASSOC));
    }

    public function add()
    {
        $queryString = 'INSERT INTO addresses (num, bis, ter, type, street_name, zip_code, city, country, location ';
        $queryValues = 'VALUES (:num, :bis, :ter, :type, :streetName, :zipCode, :city, :country, :location';

        $query = $this->getDb()->prepare($queryString);

        if (/*isset($this->getBis()) &&*/ !empty($this->getBis())) {
            $queryString .= ', bis ';
            $queryValues .= ', :bis';
            $query->bindValue(':bis', $this->getBis(), PDO::PARAM_INT);
        }
        elseif (/*isset($this->getTer()) &&*/ !empty($this->getTer())) {
            $queryString .= ', ter ';
            $queryValues .= ', :ter';
            $query->bindValue(':ter', $this->getTer(), PDO::PARAM_INT);
        }
        elseif (/*isset($this->getCountry()) &&*/ !empty($this->getCountry())) {
            $queryString .= ', country ';
            $queryValues .= ', :country';
            $query->bindValue(':country', $this->getCountry(), PDO::PARAM_STR);
        }
        elseif (/*isset($this->getLocation()) &&*/ !empty($this->getLocation())) {
            $queryString .= ', getLocation ';
            $queryValues .= ', :getLocation';
            $query->bindValue(':getLocation', $this->getLocation(), PDO::PARAM_STR);
        }

        $queryString .= ') ';
        $queryValues .= ')';


        $queryString .= $queryValues;

        $query->bindValue(':num', $this->getNum(), PDO::PARAM_INT);
        $query->bindValue(':type', $this->getType(), PDO::PARAM_STR);
        $query->bindValue(':streetName', $this->getStreetName(), PDO::PARAM_STR);
        $query->bindValue(':zipCode', $this->getZipCode(), PDO::PARAM_INT);
        $query->bindValue(':city', $this->getCity(), PDO::PARAM_STR);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }

    public function update($data)
    {
        $this->hydrate($data);

        $queryString = 'UPDATE addresses SET num = :num, bis = :bis, ter = :ter, type = :type, street_name = :streetName, zip_code = :zipCode, city = :city, country = :country, location = :location ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':bis', $this->getBis(), PDO::PARAM_INT);
        $query->bindValue(':ter', $this->getTer(), PDO::PARAM_INT);
        $query->bindValue(':num', $this->getNum(), PDO::PARAM_INT);
        $query->bindValue(':type', $this->getType(), PDO::PARAM_STR);
        $query->bindValue(':streetName', $this->getStreetName(), PDO::PARAM_STR);
        $query->bindValue(':zipCode', $this->getZipCode(), PDO::PARAM_INT);
        $query->bindValue(':city', $this->getCity(), PDO::PARAM_STR);
        $query->bindValue(':country', $this->getCountry(), PDO::PARAM_STR);
        $query->bindValue(':getLocation', $this->getLocation(), PDO::PARAM_STR);
        $query->bindValue(':id', $this->getID(), PDO::PARAM_INT);

        $query->execute();
    }
}