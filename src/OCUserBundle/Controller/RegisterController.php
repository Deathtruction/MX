<?php

namespace OCUserBundle\Controller;

use OCUserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    /**
     * @Route("/register")
     */
    public function load()
    {
        $user = new User;
        $user->setUsername('test');
        $user->setPassword('test');
        $user->setSalt('');
        $user->setRoles(array('ROLE_USER'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

    }
}