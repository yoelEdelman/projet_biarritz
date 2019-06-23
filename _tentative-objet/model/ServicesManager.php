<?php
abstract class ServicesManager extends dbConnect
{
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($this->snakeCaseToCamelCase($key));

            if (method_exists($this, $method)) {
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
        $services = [];
        $query = $this->getDb()->query('SELECT * FROM services');
        while ($getService = $query->fetch(PDO::FETCH_ASSOC))
        {
            $services[]['info'] = new Services($getService);
        }

        foreach ($services as $key => $value) {
            $query = $value['info']->getDb()->prepare('SELECT * FROM addresses WHERE id = :serviceId');
            $query->bindValue(':serviceId', $value['info']->getId(), PDO::PARAM_INT);
            $query->execute();
            while ($getAddress = $query->fetch(PDO::FETCH_ASSOC)) {
                $services[$key]['address'] = new Addresses($getAddress);
            }

            $query = $value['info']->getDb()->prepare('SELECT *
              FROM medias INNER JOIN medias_services
              ON medias.id = medias_services.media_id
              AND medias_services.service_id = :serviceId');
            $query->bindValue(':serviceId', $value['info']->getId(), PDO::PARAM_INT);
            $query->execute();
            while ($getMedia = $query->fetch(PDO::FETCH_ASSOC))
                $services[$key]['medias'][] = new Medias($getMedia);
        }
        return $services;
    }

    public function get($serviceId)
    {
        $query = $this->getDb()->prepare('SELECT * FROM services WHERE id = :id');

        $query->bindValue(':id', $serviceId, PDO::PARAM_INT);
        $query->execute();

        return new Services($query->fetch(PDO::FETCH_ASSOC));
    }

    public function add($medias)
    {
        $manager = new Addresses($_POST);
        $address = $manager->add();

        $addressId = $manager->getId();

        $queryString = 'INSERT INTO services (title, summary, content, phone_number, opening_days, hours_from, hours_to, is_published, address_id ';
        $queryValues = 'VALUES (:title, :summary, :content, :phoneNumber, :openingDays, :hoursFrom, :hoursTo, :isPublished, :addressId';

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':summary', $this->getSummary(), PDO::PARAM_STR);
        $query->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
        $query->bindValue(':phoneNumber', $this->getPhoneNumber(), PDO::PARAM_STR);
        $query->bindValue(':openingDays', $this->getOpeningDays());
        $query->bindValue(':hoursFrom', $this->getHoursFrom());
        $query->bindValue(':hoursTo', $this->getHoursTo());
        $query->bindValue(':isPublished', $this->getIsPublished(), PDO::PARAM_INT);
        $query->bindValue(':addressId', $addressId, PDO::PARAM_INT);

        $query->execute();

        $this->hydrate([
            'id' => $this->getDb()->lastInsertId()
        ]);

        $mediasId = [];
        foreach ($medias as $media){
            $manager = new Medias($media);
            $media = $manager->add();
            array_push($mediasId, $manager->getId());
        }

        $queryString = 'INSERT INTO medias_services (media_id, service_id ';
        $queryValues = 'VALUES (:mediaId, :serviceId';

        $queryString .= ') ';
        $queryValues .= ')';

        $queryString .= $queryValues;

        $query = $this->getDb()->prepare($queryString);

        foreach ($mediasId as $mediaId) {
            $query->bindValue(':mediaId', $mediaId, PDO::PARAM_INT);
            $query->bindValue(':serviceId', $this->getId(), PDO::PARAM_INT);
            $query->execute();
        }
    }

    public function update($medias)
    {
//        print_r($id);
        $manager = new Addresses($_POST);
        $address = $manager->update($_POST['address-id']);
//        print_r($id);
//        $this->hydrate($_POST);

        $queryString = 'UPDATE services SET title = :title, summary = :summary, content = :content, phone_number = :phoneNumber, opening_days = :openingDays, hours_from = :hoursFrom, hours_to = :hoursTo, is_published = :isPublished, address_id = :addressId ';

        $queryString .= 'WHERE id = :id';
        $query = $this->getDb()->prepare($queryString);

        $query->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':summary', $this->getSummary(), PDO::PARAM_STR);
        $query->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
        $query->bindValue(':phoneNumber', $this->getPhoneNumber(), PDO::PARAM_STR);
        $query->bindValue(':openingDays', $this->getOpeningDays());
        $query->bindValue(':hoursFrom', $this->getHoursFrom());
        $query->bindValue(':hoursTo', $this->getHoursTo());
        $query->bindValue(':isPublished', $this->getIsPublished(), PDO::PARAM_INT);
        $query->bindValue(':addressId', $this->getAddressId(), PDO::PARAM_INT);
        $query->bindValue(':id', $_POST['service-id'], PDO::PARAM_INT);


        $query->execute();

        if (!empty($medias)){
            //
        }
    }


}