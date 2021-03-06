<?php

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Report as Report;

class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Report", mappedBy="reports")
     */
    private $reports;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->reports = new ArrayCollection();
        parent::__construct();
        $this->roles = array('ROLE_EDITOR');

    }

    public function addReport(Report $report)
    {
        $this->reports[] = $report;

        return $this;
    }

    public function removeReport(Report $report)
    {
        $this->reports->removeElement($report);
    }

    public function getReports()
    {
        return $this->reports;
    }

}
