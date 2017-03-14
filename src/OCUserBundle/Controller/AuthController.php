<?php

namespace OCUserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthController extends Controller
{
    /**
     * @Route("/Auth")
     */
    public function indexAction()
    {
        return $this->render('::inscription.html.twig');
    }
}
