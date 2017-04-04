<?php

namespace OCUserBundle\Controller;

use OCUserBundle\Entity\TypeCompet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typecompet controller.
 *
 * @Route("typecompet")
 */
class TypeCompetController extends Controller
{
    /**
     * Lists all typeCompet entities.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/", name="typecompet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeCompets = $em->getRepository('OCUserBundle:TypeCompet')->findAll();

        return $this->render('typecompet/index.html.twig', array(
            'typeCompets' => $typeCompets,
        ));
    }

    /**
     * Creates a new typeCompet entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/new", name="typecompet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeCompet = new Typecompet();
        $form = $this->createForm('OCUserBundle\Form\TypeCompetType', $typeCompet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeCompet);
            $em->flush();

            return $this->redirectToRoute('typecompet_show', array('id' => $typeCompet->getId()));
        }

        return $this->render('typecompet/new.html.twig', array(
            'typeCompet' => $typeCompet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeCompet entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/{id}", name="typecompet_show")
     * @Method("GET")
     */
    public function showAction(TypeCompet $typeCompet)
    {
        $deleteForm = $this->createDeleteForm($typeCompet);

        return $this->render('typecompet/show.html.twig', array(
            'typeCompet' => $typeCompet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeCompet entity.
     *
     * @Security("has_role('ROLE_GERANT')")
     *
     * @Route("/{id}/edit", name="typecompet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeCompet $typeCompet)
    {
        $deleteForm = $this->createDeleteForm($typeCompet);
        $editForm = $this->createForm('OCUserBundle\Form\TypeCompetType', $typeCompet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typecompet_edit', array('id' => $typeCompet->getId()));
        }

        return $this->render('typecompet/edit.html.twig', array(
            'typeCompet' => $typeCompet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeCompet entity.
     *
     * @Route("/{id}", name="typecompet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeCompet $typeCompet)
    {
        $form = $this->createDeleteForm($typeCompet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeCompet);
            $em->flush();
        }

        return $this->redirectToRoute('typecompet_index');
    }

    /**
     * Creates a form to delete a typeCompet entity.
     *
     * @param TypeCompet $typeCompet The typeCompet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeCompet $typeCompet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typecompet_delete', array('id' => $typeCompet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
