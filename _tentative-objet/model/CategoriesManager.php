<?php
abstract class CategoriesManager extends dbConnect
{
    public function __construct()
    {
        parent::__construct();
    }

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
        return $this->getDb()->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_CLASS, 'Categories');
    }

    public function get($categoryId)
    {
        $query = $this->getDb()->prepare('SELECT * FROM categories WHERE id = :id');

        $query->bindValue(':id', $categoryId, PDO::PARAM_INT);
        $query->execute();

        return new Categories($query->fetch(PDO::FETCH_ASSOC));
    }


    public function add()
    {
        $queryString = 'INSERT INTO categories (name) ';
        $queryValues = 'VALUES (:name)';

        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':name', $this->getName(), PDO::PARAM_STR);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }

    public function update($data){
        $this->hydrate($data);

        $queryString = 'UPDATE categories SET name = :name ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $query->bindValue(':id', $this->getID(), PDO::PARAM_INT);

        $query->execute();
    }

}
