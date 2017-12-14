<?php

namespace AppBundle\Controller;

use AppBundle\Entity\manager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Manager controller.
 *
 * @Route("manager")
 */
class managerController extends Controller
{
    /**
     * Lists all manager entities.
     *
     * @Route("/", name="manager_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $managers = $em->getRepository('AppBundle:manager')->findAll();

        return $this->render('manager/index.html.twig', array(
            'managers' => $managers,
        ));
    }

    /**
     * Creates a new manager entity.
     *
     * @Route("/new", name="manager_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $manager = new Manager();
        $form = $this->createForm('AppBundle\Form\managerType', $manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($manager);
            $em->flush();

            return $this->redirectToRoute('manager_show', array('id' => $manager->getId()));
        }

        return $this->render('manager/new.html.twig', array(
            'manager' => $manager,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a manager entity.
     *
     * @Route("/{id}", name="manager_show")
     * @Method("GET")
     */
    public function showAction(manager $manager)
    {
        $deleteForm = $this->createDeleteForm($manager);

        return $this->render('manager/show.html.twig', array(
            'manager' => $manager,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing manager entity.
     *
     * @Route("/{id}/edit", name="manager_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, manager $manager)
    {
        $deleteForm = $this->createDeleteForm($manager);
        $editForm = $this->createForm('AppBundle\Form\managerType', $manager);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('manager_edit', array('id' => $manager->getId()));
        }

        return $this->render('manager/edit.html.twig', array(
            'manager' => $manager,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a manager entity.
     *
     * @Route("/{id}", name="manager_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, manager $manager)
    {
        $form = $this->createDeleteForm($manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($manager);
            $em->flush();
        }

        return $this->redirectToRoute('manager_index');
    }

    /**
     * Creates a form to delete a manager entity.
     *
     * @param manager $manager The manager entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(manager $manager)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_delete', array('id' => $manager->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
