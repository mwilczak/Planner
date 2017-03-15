<?php

namespace MB\MyBundle\Controller;

use MB\MyBundle\Entity\Biuro;
use MB\MyBundle\MBMyBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Biuro controller.
 *
 * @Route("biuro")
 */
class BiuroController extends Controller
{
    /**
     * Lists all biuro entities.
     *
     * @Route("/", name="biuro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $biuros = $em->getRepository('MBMyBundle:Biuro')->findAll();

        return $this->render('biuro/index.html.twig', array(
            'biuros' => $biuros,
        ));
    }

    /**
     * Creates a new biuro entity.
     *
     * @Route("/new", name="biuro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $biuro = new Biuro();
        $form = $this->createForm('MB\MyBundle\Form\BiuroType', $biuro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biuro);
            $em->flush($biuro);

            return $this->redirectToRoute('biuro_show', array('id' => $biuro->getId()));
        }

        return $this->render('biuro/new.html.twig', array(
            'biuro' => $biuro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a biuro entity.
     *
     * @Route("/{id}", name="biuro_show")
     * @Method("GET")
     */
    public function showAction(Biuro $biuro)
    {
        $deleteForm = $this->createDeleteForm($biuro);

        return $this->render('biuro/show.html.twig', array(
            'biuro' => $biuro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing biuro entity.
     *
     * @Route("/{id}/edit", name="biuro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Biuro $biuro)
    {
        $deleteForm = $this->createDeleteForm($biuro);
        $editForm = $this->createForm('MB\MyBundle\Form\BiuroType', $biuro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('biuro_edit', array('id' => $biuro->getId()));
        }

        return $this->render('biuro/edit.html.twig', array(
            'biuro' => $biuro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a biuro entity.
     *
     * @Route("/{id}", name="biuro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Biuro $biuro)
    {
        $form = $this->createDeleteForm($biuro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($biuro);
            $em->flush($biuro);
        }

        return $this->redirectToRoute('biuro_index');
    }

    /**
     * Creates a form to delete a biuro entity.
     *
     * @param Biuro $biuro The biuro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Biuro $biuro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('biuro_delete', array('id' => $biuro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function showPersonsAction() {
        $em =$this->getDoctrine()->getManager();

        $biuros = $em->getRepository('MBMyBundle:Person');
}
}
