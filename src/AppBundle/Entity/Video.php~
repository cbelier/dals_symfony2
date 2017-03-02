<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 *
 * @ORM\EntityListeners({"AppBundle\Listener\VideoListener"})
 */
class Video
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
     * @ORM\Column(name="title_video", type="string", length=255)
     */
    private $titleVideo;

    /**
     * Many video have One Danse.
     * @ORM\ManyToOne(targetEntity="Danse")
     * @ORM\JoinColumn(name="danse_id", referencedColumnName="id")
     */
    private $danseId;

    /**
     * @var string
     *
     * @ORM\Column(name="name_video", type="string", length=255)
     */
    private $nameVideo;

    /**
     * Plusieurs Videos ont une saison
     *
     * @var int
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumn(name="saison_id", referencedColumnName="id")
     */
    private $saison;

    /**
     * @var int
     *
     * @ORM\Column(name="like_video", type="integer")
     */
    private $likeVideo;

    /**
     * Many video have Many celebrity.
     * @ORM\ManyToMany(targetEntity="Celebrity", inversedBy="video")
     * @ORM\JoinTable(name="video_celebrity")
     */
    private $celebrity;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->celebrity = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set titleVideo
     *
     * @param string $titleVideo
     *
     * @return Video
     */
    public function setTitleVideo($titleVideo)
    {
        $this->titleVideo = $titleVideo;

        return $this;
    }

    /**
     * Get titleVideo
     *
     * @return string
     */
    public function getTitleVideo()
    {
        return $this->titleVideo;
    }

    /**
     * Set nameVideo
     *
     * @param string $nameVideo
     *
     * @return Video
     */
    public function setNameVideo($nameVideo)
    {
        $this->nameVideo = $nameVideo;

        return $this;
    }

    /**
     * Get nameVideo
     *
     * @return string
     */
    public function getNameVideo()
    {
        return $this->nameVideo;
    }

    /**
     * Set likeVideo
     *
     * @param integer $likeVideo
     *
     * @return Video
     */
    public function setLikeVideo($likeVideo)
    {
        $this->likeVideo = $likeVideo;

        return $this;
    }

    /**
     * Get likeVideo
     *
     * @return integer
     */
    public function getLikeVideo()
    {
        return $this->likeVideo;
    }

    /**
     * Set danseId
     *
     * @param \AppBundle\Entity\Danse $danseId
     *
     * @return Video
     */
    public function setDanseId(\AppBundle\Entity\Danse $danseId = null)
    {
        $this->danseId = $danseId;

        return $this;
    }

    /**
     * Get danseId
     *
     * @return \AppBundle\Entity\Danse
     */
    public function getDanseId()
    {
        return $this->danseId;
    }

    /**
     * Add celebrity
     *
     * @param \AppBundle\Entity\Celebrity $celebrity
     *
     * @return Video
     */
    public function addCelebrity(\AppBundle\Entity\Celebrity $celebrity)
    {
        $this->celebrity[] = $celebrity;

        return $this;
    }

    /**
     * Remove celebrity
     *
     * @param \AppBundle\Entity\Celebrity $celebrity
     */
    public function removeCelebrity(\AppBundle\Entity\Celebrity $celebrity)
    {
        $this->celebrity->removeElement($celebrity);
    }

    /**
     * Get celebrity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCelebrity()
    {
        return $this->celebrity;
    }

    /**
     * Set saison
     *
     * @param \AppBundle\Entity\Saison $saison
     *
     * @return Video
     */
    public function setSaison(\AppBundle\Entity\Saison $saison = null)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return \AppBundle\Entity\Saison
     */
    public function getSaison()
    {
        return $this->saison;
    }
}
