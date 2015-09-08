<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Report
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ReportRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Report
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();

    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", mappedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $authors;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Sonata\ClassificationBundle\Entity\Tag", mappedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true))
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="inLanguage", type="string", length=10)
     */
    private $inLanguage;


    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", nullable=true))
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=true))
     */
    private $longitude;


    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
    }

    /**
     * @var date
     *
     * @ORM\Column(name="studyPeriodStart", type="date", nullable=true)
     */
    private $studyPeriodStart;

    /**
     * @var date
     *
     * @ORM\Column(name="studyPeriodEnd", type="date", nullable=true)
     */
    private $studyPeriodEnd;

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
     * Set name
     *
     * @param string $name
     * @return Report
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Report
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set inLanguage
     *
     * @param string $inLanguage
     * @return Report
     */
    public function setInLanguage($inLanguage)
    {
        $this->inLanguage = $inLanguage;

        return $this;
    }

    /**
     * Get inLanguage
     *
     * @return string
     */
    public function getInLanguage()
    {
        return $this->inLanguage;
    }


    /**
     * Set body
     *
     * @param string $body
     * @return Report
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }


    /**
     * Set slug
     *
     * @param string $slug
     * @return Report
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }



    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Report
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Report
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }


    /**
     * Add authors
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     * @return Report
     */
    public function addAuthor(\Application\Sonata\UserBundle\Entity\User $author)
    {
        $this->authors[] = $author;

        $author->addReport($this);

        return $this;
    }

    /**
     * Remove authors
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     */
    public function removeAuthor(\Application\Sonata\UserBundle\Entity\User $author)
    {
        $this->authors->removeElement($author);

        $author->removeReport($this);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthors()
    {
        return $this->authors;
    }


    /**
     * Add Tag
     *
     * @param \Application\Sonata\ClassificationBundle\Entity\Tag $tag
     * @return Report
     */
    public function addTag(\Application\Sonata\ClassificationBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        $tag->addReport($this);

        return $this;
    }

    /**
     * Remove Tag
     *
     * @param \Application\Sonata\ClassificationBundle\Entity\Tag $tag
     */
    public function removeTag(\Application\Sonata\ClassificationBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);

        $tag->removeReport($this);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Report
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Report
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set studyPeriodStart
     *
     * @param \DateTime $studyPeriodStart
     * @return Report
     */
    public function setStudyPeriodStart($studyPeriodStart)
    {
        $this->studyPeriodStart = $studyPeriodStart;

        return $this;
    }

    /**
     * Get studyPeriodStart
     *
     * @return \DateTime 
     */
    public function getStudyPeriodStart()
    {
        return $this->studyPeriodStart;
    }

    /**
     * Set studyPeriodEnd
     *
     * @param \DateTime $studyPeriodEnd
     * @return Report
     */
    public function setStudyPeriodEnd($studyPeriodEnd)
    {
        $this->studyPeriodEnd = $studyPeriodEnd;

        return $this;
    }

    /**
     * Get studyPeriodEnd
     *
     * @return \DateTime 
     */
    public function getStudyPeriodEnd()
    {
        return $this->studyPeriodEnd;
    }
}
