<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MapController extends Controller
{

    public function readWorlMapAction()
    {
        #Récupérer les rapports de stage
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Report');

        $listReports = $repository->findAll();

        return $this->render('AppBundle:Maps:viewWorldMap.html.twig', array(
            'listReports' => $listReports
        ));

    }

}
