<?php
abstract class EventsManager extends dbConnect
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
        print_r($string);
        echo "\n";
        $str = str_replace('_', '', ucwords($string, '_'));
        return $str;
    }


    public function getList()
    {
        return $this->getDb()->query('SELECT * FROM events')->fetchAll(PDO::FETCH_CLASS, 'Events');
    }

    public function get($eventId)
    {
        $query = $this->getDb()->prepare('SELECT * FROM events WHERE id = :id');

        $query->bindValue(':id', $eventId, PDO::PARAM_INT);
        $query->execute();

        return new Events($query->fetch(PDO::FETCH_ASSOC));
    }



    public function add()
    {
        $queryString = 'INSERT INTO events (title, summary, content, event_date, event_time, phone_number, is_published, published_at, address_id, category_id ';
        $queryValues = 'VALUES (:title, :summary, :content, :eventDate, :eventTime, :phoneNumber, :isPublished, :publishedAt, :addressId, :categoryId';

        $query = $this->getDb()->prepare($queryString);

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':summary', $this->getSummary(), PDO::PARAM_STR);
        $query->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
        $query->bindValue(':eventDate', $this->getEventDate());
        $query->bindValue(':eventTime', $this->getEventTime());
        $query->bindValue(':phoneNumber', $this->getPhoneNumber(), PDO::PARAM_STR);
        $query->bindValue(':isPublished', $this->getIsPublished(), PDO::PARAM_INT);
        $query->bindValue(':publishedAt', $this->getPublishedAt());
        $query->bindValue(':addressId', $this->getAddressId(), PDO::PARAM_INT);
        $query->bindValue(':categoryId', $this->getCategoryId(), PDO::PARAM_INT);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);
    }


    public function update($data)
    {
        $this->hydrate($data);

        $queryString = 'UPDATE events SET title = :title, summary = :summary, content = :content, event_date = :eventDate, event_time = :eventTime, phone_number = :phoneNumber, is_published = :isPublished, published_at = :publishedAt, address_id = :addressId, category_id = :categoryId ';

        $queryString .= 'WHERE id = :id';

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':summary', $this->getSummary(), PDO::PARAM_STR);
        $query->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
        $query->bindValue(':eventDate', $this->getEventDate());
        $query->bindValue(':eventTime', $this->getEventTime());
        $query->bindValue(':phoneNumber', $this->getPhoneNumber(), PDO::PARAM_STR);
        $query->bindValue(':isPublished', $this->getIsPublished(), PDO::PARAM_INT);
        $query->bindValue(':publishedAt', $this->getPublishedAt());
        $query->bindValue(':addressId', $this->getAddressId(), PDO::PARAM_INT);
        $query->bindValue(':categoryId', $this->getCategoryId(), PDO::PARAM_INT);
        $query->bindValue(':id', $this->getID(), PDO::PARAM_INT);

        $query->execute();
    }







}