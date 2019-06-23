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
        $queryString = 'INSERT INTO addresses (address, zip_code, city ';
        $queryValues = 'VALUES (:address, :zipCode, :city';

        if (!empty($this->getCountry())) {
            $queryString .= ', country ';
            $queryValues .= ', :country';
        }
        elseif (!empty($this->getLocation())) {
            $queryString .= ', location ';
            $queryValues .= ', :location';
        }

        $queryString .= ') ';
        $queryValues .= ')';


        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);

        if (!empty($this->getCountry())) {
            $query->bindValue(':country', $this->getCountry(), PDO::PARAM_STR);
        }
        elseif (!empty($this->getLocation())) {
            $query->bindValue(':location', $this->getLocation(), PDO::PARAM_STR);
        }


        $query->bindValue(':address', $this->getAddress(), PDO::PARAM_STR);
        $query->bindValue(':zipCode', $this->getZipCode(), PDO::PARAM_INT);
        $query->bindValue(':city', $this->getCity(), PDO::PARAM_STR);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }

    public function update($id)
    {
//        $this->hydrate($data);
        $queryString = 'UPDATE addresses SET address = :address, zip_code = :zipCode, city = :city, country = :country, location = :location ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':address', $this->getAddress(), PDO::PARAM_STR);
        $query->bindValue(':zipCode', $this->getZipCode(), PDO::PARAM_INT);
        $query->bindValue(':city', $this->getCity(), PDO::PARAM_STR);
        $query->bindValue(':country', $this->getCountry(), PDO::PARAM_STR);
        $query->bindValue(':getLocation', $this->getLocation(), PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
print_r($query);
        $query->execute();

        echo $id;
    }



}