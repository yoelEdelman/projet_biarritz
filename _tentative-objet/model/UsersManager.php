<?php
abstract class UsersManager extends dbConnect
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
}