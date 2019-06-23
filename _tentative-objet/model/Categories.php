<?php
//function autoLoad($class)
//{
//    require $class . '.php';
//}
//spl_autoload_register('autoLoad');

class Categories extends CategoriesManager
{
    private $name;
    private $id;

    public function __construct(array $data = [])
    {
        parent::__construct();
        if ($data == []){
            return NULL;
        }
        else{
            $this->hydrate($data);
        }
    }
//
//    public function hydrate(array $datas)
//    {
//        foreach ($datas as $key => $value)
//        {
//            $method = 'set'.ucfirst($key);
//
//            if (method_exists($this, $method))
//            {
//                $this->$method($value);
//            }
//        }
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


}
