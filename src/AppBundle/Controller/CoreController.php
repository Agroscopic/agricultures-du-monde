<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Core:index.html.twig');
    }

    /**
     * @Route("/politique-de-confidentialite", name="confidentiality_policy")
     */
    public function confidentialityPolicyAction(Request $request)
    {
        return $this->render('AppBundle:Core:confidentiality-policy.html.twig');
    }
}
