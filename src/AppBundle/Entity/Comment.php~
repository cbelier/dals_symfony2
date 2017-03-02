<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="title_comment", type="string", length=255)
     */
    private $titleComment;

    /**
     * @var string
     *
     * @ORM\Column(name="content_comment", type="string", length=255)
     */
    private $contentComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreate_comment", type="datetime")
     */
    private $dateCreateComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateView_comment", type="datetime")
     */
    private $dateViewComment;

    /**
     * @var bool
     *
     * @ORM\Column(name="isView_comment", type="boolean")
     */
    private $isViewComment;

    /**
     * @var int
     *
     * @ORM\Column(name="author_comment", type="integer")
     */
    private $authorComment;


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
     * Set titleComment
     *
     * @param string $titleComment
     *
     * @return Comment
     */
    public function setTitleComment($titleComment)
    {
        $this->titleComment = $titleComment;

        return $this;
    }

    /**
     * Get titleComment
     *
     * @return string
     */
    public function getTitleComment()
    {
        return $this->titleComment;
    }

    /**
     * Set contentComment
     *
     * @param string $contentComment
     *
     * @return Comment
     */
    public function setContentComment($contentComment)
    {
        $this->contentComment = $contentComment;

        return $this;
    }

    /**
     * Get contentComment
     *
     * @return string
     */
    public function getContentComment()
    {
        return $this->contentComment;
    }

    /**
     * Set dateCreateComment
     *
     * @param \DateTime $dateCreateComment
     *
     * @return Comment
     */
    public function setDateCreateComment($dateCreateComment)
    {
        $this->dateCreateComment = $dateCreateComment;

        return $this;
    }

    /**
     * Get dateCreateComment
     *
     * @return \DateTime
     */
    public function getDateCreateComment()
    {
        return $this->dateCreateComment;
    }

    /**
     * Set dateViewComment
     *
     * @param \DateTime $dateViewComment
     *
     * @return Comment
     */
    public function setDateViewComment($dateViewComment)
    {
        $this->dateViewComment = $dateViewComment;

        return $this;
    }

    /**
     * Get dateViewComment
     *
     * @return \DateTime
     */
    public function getDateViewComment()
    {
        return $this->dateViewComment;
    }

    /**
     * Set isViewComment
     *
     * @param boolean $isViewComment
     *
     * @return Comment
     */
    public function setIsViewComment($isViewComment)
    {
        $this->isViewComment = $isViewComment;

        return $this;
    }

    /**
     * Get isViewComment
     *
     * @return bool
     */
    public function getIsViewComment()
    {
        return $this->isViewComment;
    }

    /**
     * Set authorComment
     *
     * @param integer $authorComment
     *
     * @return Comment
     */
    public function setAuthorComment($authorComment)
    {
        $this->authorComment = $authorComment;

        return $this;
    }

    /**
     * Get authorComment
     *
     * @return int
     */
    public function getAuthorComment()
    {
        return $this->authorComment;
    }
}
