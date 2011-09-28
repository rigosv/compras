<?php

namespace Salud\ComprasBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Salud\ComprasBundle\Entity\Item;
use Salud\ComprasBundle\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductoController extends Controller {

    /**
     * @Route("/producto/list", name ="_producto_list")
     * @Template()
     */
    public function listAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $productos = $em->getRepository("SaludComprasBundle:Item")->findAll();

        return array('productos' => $productos);

        //return $this->render('SaludComprasBundle:Producto:list.html.twig');
    }

    /**
     * @Route("/producto/show/{id}", name="_producto_show")
     * @Template 
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $producto = $em->find("SaludComprasBundle:Item", $id);
        //Estas formas son equivalentes
        //$producto = $em->getRepository("SaludComprasBundle:Item")->find($id);
        //$producto = $em->getRepository("Salud\ComprasBundle\Entity\Item")->find($id);

        $ajax = $this->getRequest()->isXmlHttpRequest();

        return array('producto' => $producto, 'ajax' => $ajax);
    }

    /**
     * @Route("/producto/edit/{id}", name="_producto_edit", requirements={"id"="\d+"}),
     * @Route("/producto/create", name="_producto_create")
     * @Template()
     */
    public function editAction($id = null) {

        $em = $this->getDoctrine()->getEntityManager();
        if (isset($id)) {
            $producto = $em->find('SaludComprasBundle:Item', $id);
            if (!$producto)
                throw $this->createNotFoundException("Producto no encontrado");
        }
        else
            $producto = new Item();

        $form = $this->createForm(new ItemType(), $producto);

        if ($this->getRequest()->getMethod() == 'POST') {
            //Enlazar el formulario con los datos enviados por el usuario
            $form->bindRequest($this->getRequest());

            //Validar los datos ingresados por el usuario
            if ($form->isValid()) {
                //Marcar el objeto para guardarlo
                $em->persist($producto);

                //Escribir los cambios a la base de datos
                $em->flush();

                //Después de guardar exitosamente es recomendable
                //rediriguir al usuario hacia otra página 
                // para evitar que los datos se reenvien si refresca la página

                return $this->redirect($this->generateUrl('_producto_show', 
                        array('id' => $producto->getId())));
            }
        }

        return array('form' => $form->createView(), 'producto' => $producto);
    }

}
