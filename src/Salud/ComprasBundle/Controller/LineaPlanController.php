<?php

namespace Salud\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Salud\ComprasBundle\Entity\LineaPlan;
use Salud\ComprasBundle\Form\LineaPlanType;

/**
 * LineaPlan controller.
 *
 * @Route("/lineaplan")
 */
class LineaPlanController extends Controller
{
    /**
     * Lists all LineaPlan entities.
     *
     * @Route("/", name="lineaplan")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SaludComprasBundle:LineaPlan')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a LineaPlan entity.
     *
     * @Route("/{id}/show", name="lineaplan_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:LineaPlan')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineaPlan entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new LineaPlan entity.
     *
     * @Route("/new", name="lineaplan_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LineaPlan();
        $form   = $this->createForm(new LineaPlanType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new LineaPlan entity.
     *
     * @Route("/create", name="lineaplan_create")
     * @Method("post")
     * @Template("SaludComprasBundle:LineaPlan:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new LineaPlan();
        $request = $this->getRequest();
        $form    = $this->createForm(new LineaPlanType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lineaplan_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing LineaPlan entity.
     *
     * @Route("/{id}/edit", name="lineaplan_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:LineaPlan')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineaPlan entity.');
        }

        $editForm = $this->createForm(new LineaPlanType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing LineaPlan entity.
     *
     * @Route("/{id}/update", name="lineaplan_update")
     * @Method("post")
     * @Template("SaludComprasBundle:LineaPlan:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:LineaPlan')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineaPlan entity.');
        }

        $editForm   = $this->createForm(new LineaPlanType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lineaplan_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a LineaPlan entity.
     *
     * @Route("/{id}/delete", name="lineaplan_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SaludComprasBundle:LineaPlan')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LineaPlan entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lineaplan'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
