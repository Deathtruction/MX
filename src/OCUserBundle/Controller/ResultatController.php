<?php

namespace OCUserBundle\Controller;

use OCUserBundle\Entity\Resultat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Resultat controller.
 *
 * @Route("resultat")
 */
class ResultatController extends Controller
{
    /**
     * Lists all resultat entities.
     *
     * @Route("/", name="resultat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultats = $em->getRepository('OCUserBundle:Resultat')->findAll();

        return $this->render('resultat/index.html.twig', array(
            'resultats' => $resultats,
        ));
    }

    /**
     * Creates a new resultat entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/new", name="resultat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resultat = new Resultat();
        $user = $this->container->get('security.token_storage')->getToken();
        $id = $user->getUser();
        $resultat->setUser($id);
        $form = $this->createForm('OCUserBundle\Form\ResultatType', $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultat);
            $em->flush();

            return $this->redirectToRoute('resultat_index', array('id' => $resultat->getId()));
        }

        return $this->render('resultat/new.html.twig', array(
            'resultat' => $resultat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultat entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/{id}", name="resultat_show")
     * @Method("GET")
     */
    public function showAction(Resultat $resultat)
    {
        $deleteForm = $this->createDeleteForm($resultat);

        return $this->render('resultat/show.html.twig', array(
            'resultat' => $resultat,
            'user' => $resultat->getUser(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultat entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/{id}/edit", name="resultat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Resultat $resultat)
    {
        $deleteForm = $this->createDeleteForm($resultat);
        $editForm = $this->createForm('OCUserBundle\Form\ResultatType', $resultat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultat_edit', array('id' => $resultat->getId()));
        }

        return $this->render('resultat/edit.html.twig', array(
            'resultat' => $resultat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultat entity.
     *
     * @Route("/{id}", name="resultat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Resultat $resultat)
    {
        $form = $this->createDeleteForm($resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultat);
            $em->flush();
        }

        return $this->redirectToRoute('resultat_index');
    }

    /**
     * Creates a form to delete a resultat entity.
     *
     * @param Resultat $resultat The resultat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Resultat $resultat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultat_delete', array('id' => $resultat->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
