<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Celebrity
 *
 * @ORM\Table(name="celebrity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CelebrityRepository")
 */
class Celebrity
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
     * @ORM\Column(name="firstname_celebrity", type="string", length=255)
     */
    private $firstnameCelebrity;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname_celebrity", type="string", length=255)
     */
    private $lastnameCelebrity;

    /**
     * Many celebrity have Many Video.
     * @ORM\ManyToMany(targetEntity="Video", mappedBy="celebrity")
     */
    private $video;


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
     * Set firstnameCelebrity
     *
     * @param string $firstnameCelebrity
     *
     * @return Celebrity
     */
    public function setFirstnameCelebrity($firstnameCelebrity)
    {
        $this->firstnameCelebrity = $firstnameCelebrity;

        return $this;
    }

    /**
     * Get firstnameCelebrity
     *
     * @return string
     */
    public function getFirstnameCelebrity()
    {
        return $this->firstnameCelebrity;
    }

    /**
     * Set lastnameCelebrity
     *
     * @param string $lastnameCelebrity
     *
     * @return Celebrity
     */
    public function setLastnameCelebrity($lastnameCelebrity)
    {
        $this->lastnameCelebrity = $lastnameCelebrity;

        return $this;
    }

    /**
     * Get lastnameCelebrity
     *
     * @return string
     */
    public function getLastnameCelebrity()
    {
        return $this->lastnameCelebrity;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add video
     *
     * @param \AppBundle\Entity\Video $video
     *
     * @return Celebrity
     */
    public function addVideo(\AppBundle\Entity\Video $video)
    {
        $this->video[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \AppBundle\Entity\Video $video
     */
    public function removeVideo(\AppBundle\Entity\Video $video)
    {
        $this->video->removeElement($video);
    }

    /**
     * Get video
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideo()
    {
        return $this->video;
    }
}
