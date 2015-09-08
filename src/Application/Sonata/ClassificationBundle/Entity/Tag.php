<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\ClassificationBundle\Entity;

use Sonata\ClassificationBundle\Entity\BaseTag as BaseTag;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Report as Report;

/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class Tag extends BaseTag
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
