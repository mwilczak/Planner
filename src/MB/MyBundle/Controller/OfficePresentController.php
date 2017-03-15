<?php

namespace MB\MyBundle\Controller;

use MB\MyBundle\Entity\OfficePresent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Officepresent controller.
 *
 * @Route("officepresent")
 */
class OfficePresentController extends Controller
{
    /**
     * Lists all officePresent entities.
     *
     * @Route("/", name="officepresent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $officePresents = $em->getRepository('MBMyBundle:OfficePresent')->findAll();

        return $this->render('officepresent/index.html.twig', array(
            'officePresents' => $officePresents,
        ));
    }

    /**
     * Creates a new officePresent entity.
     *
     * @Route("/new", name="officepresent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $officePresent = new Officepresent();
        $form = $this->createForm('MB\MyBundle\Form\OfficePresentType', $officePresent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($officePresent);
            $em->flush($officePresent);

            return $this->redirectToRoute('officepresent_show', array('id' => $officePresent->getId()));
        }

        return $this->render('officepresent/new.html.twig', array(
            'officePresent' => $officePresent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a officePresent entity.
     *
     * @Route("/{id}", name="officepresent_show")
     * @Method("GET")
     */
    public function showAction(OfficePresent $officePresent)
    {
        $deleteForm = $this->createDeleteForm($officePresent);

        return $this->render('officepresent/show.html.twig', array(
            'officePresent' => $officePresent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing officePresent entity.
     *
     * @Route("/{id}/edit", name="officepresent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OfficePresent $officePresent)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException('Nie masz uprawnien');
        }

        $deleteForm = $this->createDeleteForm($officePresent);
        $editForm = $this->createForm('MB\MyBundle\Form\OfficePresentType', $officePresent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('officepresent_edit', array('id' => $officePresent->getId()));
        }

        return $this->render('officepresent/edit.html.twig', array(
            'officePresent' => $officePresent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a officePresent entity.
     *
     * @Route("/{id}", name="officepresent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OfficePresent $officePresent)
    {
        $form = $this->createDeleteForm($officePresent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($officePresent);
            $em->flush($officePresent);
        }

        return $this->redirectToRoute('officepresent_index');
    }

    /**
     * Creates a form to delete a officePresent entity.
     *
     * @param OfficePresent $officePresent The officePresent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OfficePresent $officePresent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('officepresent_delete', array('id' => $officePresent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
