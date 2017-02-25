<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Danse
 *
 * @ORM\Table(name="danse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DanseRepository")
 */
class Danse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_danse", type="string", length=255)
     */
    private $nameDanse;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameDanse
     *
     * @param string $nameDanse
     *
     * @return Danse
     */
    public function setNameDanse($nameDanse)
    {
        $this->nameDanse = $nameDanse;

        return $this;
    }

    /**
     * Get nameDanse
     *
     * @return string
     */
    public function getNameDanse()
    {
        return $this->nameDanse;
    }
}
