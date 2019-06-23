<?php
class Services extends ServicesManager
{
    private $id;
    private $title;
    private $summary;
    private $content;
    private $phoneNumber;
    private $openingDays;
    private $hoursFrom;
    private $hoursTo;
    private $createdAt;
    private $isPublished;
    private $addressId;
    private $deleted;

    public function __construct(array $datas = [])
    {
        parent::__construct();
        if ($datas == []){
            return NULL;
        }
        else{
            $this->hydrate($datas);
        }
    }

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getOpeningDays()
    {
        return $this->openingDays;
    }

    /**
     * @param mixed $openingDays
     */
    public function setOpeningDays($openingDays): void
    {
        $this->openingDays = $openingDays;
    }

    /**
     * @return mixed
     */
    public function getHoursFrom()
    {
        return $this->hoursFrom;
    }

    /**
     * @param mixed $hoursFrom
     */
    public function setHoursFrom($hoursFrom): void
    {
        $this->hoursFrom = $hoursFrom;
    }

    /**
     * @return mixed
     */
    public function getHoursTo()
    {
        return $this->hoursTo;
    }

    /**
     * @param mixed $hoursTo
     */
    public function setHoursTo($hoursTo): void
    {
        $this->hoursTo = $hoursTo;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param mixed $addressId
     */
    public function setAddressId($addressId): void
    {
        $this->addressId = $addressId;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished): void
    {
        $this->isPublished = $isPublished;
    }
}