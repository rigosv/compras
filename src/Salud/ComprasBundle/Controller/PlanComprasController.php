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

/**
 * PlanCompras controller.
 *
 * @Route("/plancompras")
 */
class PlanComprasController extends Controller
{
    /**
     * Lists all PlanCompras entities.
     *
     * @Route("/", name="plancompras")
     * @Template()
     */
    public function indexAction()
    {
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
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        return array(
            'entity'      => $entity,
            'front_controller' => $this->getRequest()->getScriptName()  );
    }

    /**
     * Displays a form to create a new PlanCompras entity.
     *
     * @Route("/new", name="plancompras_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PlanCompras();
        $form   = $this->createForm(new PlanComprasType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new PlanCompras entity.
     *
     * @Route("/create", name="plancompras_create")
     * @Method("post")
     * @Template("SaludComprasBundle:PlanCompras:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new PlanCompras();
        $request = $this->getRequest();
        $form    = $this->createForm(new PlanComprasType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plancompras_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing PlanCompras entity.
     *
     * @Route("/{id}/edit", name="plancompras_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        $editForm = $this->createForm(new PlanComprasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
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
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SaludComprasBundle:PlanCompras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PlanCompras entity.');
        }

        $editForm   = $this->createForm(new PlanComprasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plancompras_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a PlanCompras entity.
     *
     * @Route("/{id}/delete", name="plancompras_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
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

    private function createDeleteForm($id)
    {
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

        $output = array(); $i = 0; $total_plan = 0;
        
        foreach ($detalle_array as $row) {
            $output['rows'][$i]['id'] = $row['id'];
            $output['rows'][$i]['cell'] = array(                
                $row['descripcionitem'],
                $row['descripcionunidadmedida'], $row['preciounitario'],
                $row['cantidadPedido'], $row['total']);
            $total_plan += $row['total'];
            ++$i;
        }

        $output['userdata']['total'] = number_format($total_plan, 2, '.', ',');

        return new Response(json_encode($output), 200, array('Content-Type' => 'application/json'));
    }
}
