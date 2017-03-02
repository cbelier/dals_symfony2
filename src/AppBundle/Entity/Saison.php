<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;



/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaisonRepository")
 */
class Saison
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
     * Une saison a plusieurs vidéo
     *
     * @var string
     *
     * @ORM\Column(name="nom_saison", type="string", length=255)
     *
     * @ORM\OneToMany(targetEntity="nom_saison", mappedBy="Saison")
     */
    private $nameSaison;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set nameSaison
     *
     * @param string $nameSaison
     *
     * @return Saison
     */
    public function setNameSaison($nameSaison)
    {
        $this->nameSaison = $nameSaison;

        return $this;
    }

    /**
     * Get nameSaison
     *
     * @return string
     */
    public function getNameSaison()
    {
        return $this->nameSaison;
    }


}
