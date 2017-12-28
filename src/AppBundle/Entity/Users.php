<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="StillTrying")
 */

class Users{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $user_name;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=16)
     */
    protected $password;

    public function setUserName($user_name)
    {
        $this->user_name=$user_name;
        return $this;
    }

    public function getUserName()
    {
        return $this->user_name;
    }

    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password=$password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

}