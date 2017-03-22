<?php

namespace OCUserBundle\Controller;

use OCUserBundle\Entity\Moto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Moto controller.
 *
 * @Security("has_role('ROLE_USER')")
 *
 * @Route("moto")
 */
class MotoController extends Controller
{
    /**
     * Lists all moto entities.
     *
     * @Route("/", name="moto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $motos = $em->getRepository('OCUserBundle:Moto')->findAll();

        return $this->render('moto/index.html.twig', array(
            'motos' => $motos,
        ));
    }

    /**
     * Creates a new moto entity.
     *
     * @Route("/new", name="moto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $moto = new Moto();
        $user = $this->container->get('security.token_storage')->getToken();
        $id = $user->getUser();
        $moto->setUser($id);

        $form = $this->createForm('OCUserBundle\Form\MotoType', $moto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moto);
            $em->flush();

            return $this->redirectToRoute('moto_show', array('id' => $moto->getId()));
        }

        return $this->render('moto/new.html.twig', array(
            'moto' => $moto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a moto entity.
     *
     * @Route("/{id}", name="moto_show")
     * @Method("GET")
     */
    public function showAction(Moto $moto)
    {
        $deleteForm = $this->createDeleteForm($moto);

        return $this->render('moto/show.html.twig', array(
            'moto' => $moto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing moto entity.
     *
     * @Route("/{id}/edit", name="moto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Moto $moto)
    {
        $deleteForm = $this->createDeleteForm($moto);
        $editForm = $this->createForm('OCUserBundle\Form\MotoType', $moto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('moto_edit', array(
                'id' => $moto->getId()
            ));
        }

        return $this->render('moto/edit.html.twig', array(
            'moto' => $moto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a moto entity.
     *
     * @Route("/{id}", name="moto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Moto $moto)
    {
        $form = $this->createDeleteForm($moto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moto);
            $em->flush();
        }

        return $this->redirectToRoute('moto_index');
    }

    /**
     * Creates a form to delete a moto entity.
     *
     * @param Moto $moto The moto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Moto $moto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('moto_delete', array('id' => $moto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
