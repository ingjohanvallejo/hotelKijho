<?php

namespace Hotel\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Hotel\BackendBundle\Entity\Ocupation;
use Hotel\BackendBundle\Form\OcupationType;

/**
 * Ocupation controller.
 *
 */
class OcupationController extends Controller
{

    /**
     * Lists all Ocupation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BackendBundle:Ocupation')->findAll();

        return $this->render('BackendBundle:Ocupation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ocupation entity.
     *
     */
    public function createAction(Request $request)
    {
        
        
        $entity = new Ocupation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_ocupations_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:Ocupation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Ocupation entity.
    *
    * @param Ocupation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Ocupation $entity)
    {
        $form = $this->createForm(new OcupationType(), $entity, array(
            'action' => $this->generateUrl('backend_ocupations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ocupation entity.
     *
     */
    public function newAction()
    {
        $entity = new Ocupation();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Ocupation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ocupation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Ocupation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ocupation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Ocupation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Ocupation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Ocupation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ocupation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Ocupation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ocupation entity.
    *
    * @param Ocupation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ocupation $entity)
    {
        $form = $this->createForm(new OcupationType(), $entity, array(
            'action' => $this->generateUrl('backend_ocupations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ocupation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendBundle:Ocupation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ocupation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('backend_ocupations'));
        }

        return $this->render('BackendBundle:Ocupation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ocupation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendBundle:Ocupation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ocupation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_ocupations'));
    }

    /**
     * Creates a form to delete a Ocupation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_ocupations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
