<?php
//function autoLoad($class)
//{
//    require $class . '.php';
//}
//spl_autoload_register('autoLoad');

class EventsManager extends dbConnect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value)
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
        $events = $this->getDb()->query('SELECT * FROM events')->fetchAll(PDO::FETCH_CLASS, 'Events');
        return $events;
    }



    public function add($title, $summary, $content, $eventDate, $eventTime, $phoneNumber, $isPublished, $publishedAt, $addressId, $categoryId)
    {

        $queryString = 'INSERT INTO events (title, summary, content, event_date, event_time, phone_number, is_published, published_at, address_id, category_id ';
        $queryValues = 'VALUES (:title, :summary, :content, :eventDate, :eventTime, :phoneNumber, :isPublished, :publishedAt, :addressId, :categoryId';
        $queryParameters = [
            'title' => htmlspecialchars($title),
            'summary' => htmlspecialchars($summary),
            'content' => htmlspecialchars($content),
            'eventDate' => htmlspecialchars($eventDate),
            'eventTime' => htmlspecialchars($eventTime),
            'phoneNumber' => htmlspecialchars($phoneNumber),
            'isPublished' => htmlspecialchars($isPublished),
            'publishedAt' => htmlspecialchars($publishedAt),
            'addressId' => htmlspecialchars($addressId),
            'categoryId' => htmlspecialchars($categoryId)
        ];

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);
        $result = $query->execute($queryParameters);
    }







}