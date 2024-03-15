<?php
namespace src\Models;


class Task
{
    private $Id;
    private $Title;
    private $Description;
    private $Date;
    private $IdUser;
    private $IdPriority;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $parts = explode('_', $key);
            $setter = 'set';
            foreach ($parts as $part) {
                $setter .= ucfirst(strtolower($part));
            }

            $this->$setter($value);
        }
    }

    public function __set($name, $value)
    {
        $this->hydrate([$name => $value]);
    }

    /**
     * Get the value of Id
     */ 
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */ 
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Get the value of Title
     */ 
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set the value of Title
     *
     * @return  self
     */ 
    public function setTitle($Title)
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of IdUser
     */ 
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     *
     * @return  self
     */ 
    public function setIdUser($IdUser)
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * Get the value of IdPriority
     */ 
    public function getIdPriority()
    {
        return $this->IdPriority;
    }

    /**
     * Set the value of IdPriority
     *
     * @return  self
     */ 
    public function setIdPriority($IdPriority)
    {
        $this->IdPriority = $IdPriority;

        return $this;
    }
}
