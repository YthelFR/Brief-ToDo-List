<?php

namespace src\Models;


class User
{
    private $Id;
    private $Lastname;
    private $Firstname;
    private $Password;
    private $Mail;

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

    public function __set($Lastname, $value)
    {
        $this->hydrate([$Lastname => $value]);
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
        $this->_id = $Id;
    }

    /**
     * Get the value of Lastname
     */
    public function getLastname()
    {
        return $this->Lastname;
    }

    /**
     * Set the value of Lastname
     *
     * @return  self
     */
    public function setLastname($Lastname)
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    /**
     * Get the value of Firstname
     */
    public function getFirstname()
    {
        return $this->Firstname;
    }

    /**
     * Set the value of Firstname
     *
     * @return  self
     */
    public function setFirstname($Firstname)
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    /**
     * Get the value of Password
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * Get the value of Mail
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * Set the value of Mail
     *
     * @return  self
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;

        return $this;
    }
}
