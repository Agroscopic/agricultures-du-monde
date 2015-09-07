<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Report;

class ReportController extends Controller
{

    public function readAction(Report $report)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Report');


        return $this->render(
            'AppBundle:Reports:read.html.twig',
            array(
                'report' => $report
            )
        );
    }

}
