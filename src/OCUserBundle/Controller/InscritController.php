<?php

namespace OCUserBundle\Controller;

use OCUserBundle\Entity\Competition;
use OCUserBundle\Entity\Inscrit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Inscrit controller.
 *
 * @Route("inscrit")
 */
class InscritController extends Controller
{
    /**
     * Lists all inscrit entities.
     *
     * @Route("/", name="inscrit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $inscrits = $em->getRepository('OCUserBundle:Inscrit')->findAll();

        return $this->render('inscrit/index.html.twig', array(
            'inscrits' => $inscrits,
        ));
    }

    /**
     * Creates a new inscrit entity.
     *
     * @Route("/new/{id}", name="inscrit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Competition $competition)
    {
        $inscrit = new Inscrit();
        $user = $this->container->get('security.token_storage')->getToken();
        $id = $user->getUser();
        $inscrit->setUser($id);
        $inscrit->setCompetition($competition);
        $form = $this->createForm('OCUserBundle\Form\InscritType', $inscrit, array(
            'user' => $this->getUser(),
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($inscrit);
            $em->flush();



            return $this->redirectToRoute('inscrit_show', array('id' => $inscrit->getId()));
        }

        return $this->render('inscrit/new.html.twig', array(
            'inscrit' => $inscrit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inscrit entity.
     *
     * @Route("/{id}", name="inscrit_show")
     * @Method("GET")
     */
    public function showAction(Inscrit $inscrit)
    {
        $deleteForm = $this->createDeleteForm($inscrit);

        return $this->render('inscrit/show.html.twig', array(
            'inscrit' => $inscrit,
            'user' => $inscrit->getUser(),
            'categorie' => $inscrit->getCategorie(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inscrit entity.
     *
     * @Route("/{id}/edit", name="inscrit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Inscrit $inscrit)
    {
        $deleteForm = $this->createDeleteForm($inscrit);
        $editForm = $this->createForm('OCUserBundle\Form\InscritType', $inscrit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inscrit_edit', array('id' => $inscrit->getId()));
        }

        return $this->render('inscrit/edit.html.twig', array(
            'inscrit' => $inscrit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inscrit entity.
     *
     * @Route("/{id}", name="inscrit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Inscrit $inscrit)
    {
        $form = $this->createDeleteForm($inscrit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inscrit);
            $em->flush();
        }

        return $this->redirectToRoute('inscrit_index');
    }

    /**
     * Creates a form to delete a inscrit entity.
     *
     * @param Inscrit $inscrit The inscrit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inscrit $inscrit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inscrit_delete', array('id' => $inscrit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
