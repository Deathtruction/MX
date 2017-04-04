<?php

namespace OCUserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact")
     */
    public function indexAction()
    {
        return $this->render('::contact.html.twig');
    }

}