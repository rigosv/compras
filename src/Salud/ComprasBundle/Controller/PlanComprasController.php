<?php

// src/Salud/ComprasBundle/Controller/PlanComprasController.php

namespace Salud\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Salud\ComprasBundle\Entity\PlanCompras;
use Salud\ComprasBundle\Form\PlanComprasType;
use Symfony\Component\HttpFoundation\Response;
use Salud\ComprasBundle\Entity\LineaPlan;
use Salud\ComprasBundle\Form\LineaPlanType;

/**
 * PlanCompras controller.
 *
 * @Route("/plancompras")
 */
class PlanComprasController extends Controller {

    /**
     * Lists all PlanCompras entities.
     *
     * @Route("/", name="plancompras")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $planes = $em->getRepository('SaludComprasBundle:PlanCompras')->getPlanes();

        return array('planes' => $planes->getResult());
    }

    /**
     * Finds and displays a PlanCompras entity.
     *
     * @Route("/{id}/show", name="plancompras_show")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        return array(
            'entity' => $entity,
            'front_controller' => $this->getRequest()->getScriptName());
    }

    /**
     * Displays a form to create a new PlanCompras entity.
     *
     * @Route("/new", name="plancompras_new")
     * @Template()
     */
    public function newAction() {
        $entity = new PlanCompras();
        $form = $this->createForm(new PlanComprasType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new PlanCompras entity.
     *
     * @Route("/create", name="plancompras_create")
     * @Method("post")
     * @Template("SaludComprasBundle:PlanCompras:new.html.twig")
     */
    public function createAction() {
        $entity = new PlanCompras();
        $request = $this->getRequest();
        $form = $this->createForm(new PlanComprasType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plancompras_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing PlanCompras entity.
     *
     * @Route("/{id}/edit", name="plancompras_edit")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        $editForm = $this->createForm(new PlanComprasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing PlanCompras entity.
     *
     * @Route("/{id}/update", name="plancompras_update")
     * @Method("post")
     * @Template("SaludComprasBundle:PlanCompras:edit.html.twig")
     */
    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        $editForm = $this->createForm(new PlanComprasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plancompras_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a PlanCompras entity.
     *
     * @Route("/{id}/delete", name="plancompras_delete")
     * @Method("post")
     */
    public function deleteAction($id) {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PlanCompras entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('plancompras'));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    /**
     * @Route("/{id_plan}/detalle", name="_plan_compras_detalle", requirements={"id_plan"= "\d+"})
     */
    public function detallePlanAction($id_plan) {

        $em = $this->getDoctrine()->getEntityManager();

        $detalle = $em->getRepository('SaludComprasBundle:LineaPlan')
                ->getDetallePlan($id_plan);

        $detalle_array = $detalle->getArrayResult();

        $output = array();
        $i = 0;
        $total_plan = 0;

        foreach ($detalle_array as $row) {
            $output['rows'][$i]['id'] = $row['id'];
            $output['rows'][$i]['cell'] = array($row['descripcionitem'],
                $row['iditem'],
                $row['descripcionunidadmedida'], $row['preciounitario'],
                $row['cantidadPedido'], $row['total']);
            $total_plan += $row['total'];
            ++$i;
        }

        $output['userdata']['total'] = number_format($total_plan, 2, '.', ',');

        return new Response(json_encode($output), 200, array('Content-Type' => 'application/json'));
    }

    /**
     *
     * @Route("/item/buscar", name="_itemBuscar")
     */
    public function buscarItemAction() {
        $q = strtolower($this->get('request')->get('term'));
        if (!$q)
            return;

        $em = $this->get('doctrine')->getEntityManager();
        $busq = $em->getRepository('SaludComprasBundle:Item')->buscarItem($q);
        $items = $busq->getArrayResult();

        $result = array();
        foreach ($items as $row) {
            array_push($result, array("id" => $row['id'],
                "label" => $row['descripcionitem'] . '-' . $row['preciounitario'] . '-' . $row['descripcionunidadmedida'],
                "value" => strip_tags($row['descripcionitem']),
                "precio" => $row['preciounitario'],
                "unidadmedida" => $row['descripcionunidadmedida']
            ));
        }

        return new Response(json_encode($result), 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("/{id_plan}/detalle/edit", name="_planComprasDetalle"),
     */
    public function editDetallePlanAction($id_plan) {
        $em = $this->getDoctrine()->getEntityManager();

        $datos = $this->getRequest();
        
        $ln_plan = ($datos->get('oper') == 'add') ? new LineaPlan():
             $ln_plan = $em->find("SaludComprasBundle:LineaPlan", $datos->get('id'));

        $errorList = array();
        if ($datos->get('oper') != 'del') {
            $item = $em->find('SaludComprasBundle:Item', $datos->get('iditem'));
            $plan = $em->find('SaludComprasBundle:PlanCompras', $id_plan);

            $ln_plan->setIdPlanCompras($plan);
            $ln_plan->setIdItem($item);
            $ln_plan->setPreciounitario($datos->get('preciounitario'));
            $ln_plan->setIdUnidadMedida($item->getIdUnidadMedida());
            $ln_plan->setCantidadPedido($datos->get('cantidadpedido'));

            $validator = $this->get('validator');
            $errorList = $validator->validate($ln_plan);
        }

        if (count($errorList) > 0) {
            $rsp = new Response();
            $rsp->setStatusCode(406, $errorList);
            return $rsp;
        } else {
            ($datos->get('oper') == 'del') ? $em->remove($ln_plan) : 
                $em->persist($ln_plan);
            $em->flush();
        }
        return new Response('', 200, array('Content-Type' => 'application/json'));
    }

}