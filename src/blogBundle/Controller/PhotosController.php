<?php

namespace blogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use blogBundle\Entity\Photos;
use blogBundle\Form\PhotosType;

/**
 * Photos controller.
 *
 */
class PhotosController extends Controller
{

    /**
     * Lists all Photos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('blogBundle:Photos')->findAll();

        return $this->render('blogBundle:Photos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Photos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Photos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pagePhoto_show', array('id' => $entity->getId())));
        }

        return $this->render('blogBundle:Photos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Photos entity.
     *
     * @param Photos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Photos $entity)
    {
        $form = $this->createForm(new PhotosType(), $entity, array(
            'action' => $this->generateUrl('pagePhoto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Photos entity.
     *
     */
    public function newAction()
    {
        $entity = new Photos();
        $form   = $this->createCreateForm($entity);

        return $this->render('blogBundle:Photos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Photos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('blogBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('blogBundle:Photos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Photos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('blogBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('blogBundle:Photos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Photos entity.
    *
    * @param Photos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Photos $entity)
    {
        $form = $this->createForm(new PhotosType(), $entity, array(
            'action' => $this->generateUrl('pagePhoto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Photos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('blogBundle:Photos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Photos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pagePhoto_edit', array('id' => $id)));
        }

        return $this->render('blogBundle:Photos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Photos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('blogBundle:Photos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Photos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pagePhoto'));
    }

    /**
     * Creates a form to delete a Photos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pagePhoto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
