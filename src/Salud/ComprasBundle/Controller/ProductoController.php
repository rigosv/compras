<?php

namespace Salud\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Salud\ComprasBundle\Entity\Item;
use Salud\ComprasBundle\Form\ItemType;

class ProductoController extends Controller {

    /**
     * @Route("/producto/list", name="_producto_list")
     * @Template()
     */
    public function listAction() {
        //Creamos una instancia del Entity Manager
        $em = $this->getDoctrine()->getEntityManager();

        //Obtener todos los productos
        $productos = $em->getRepository('SaludComprasBundle:Item')->findAll();
        //return $this->render("SaludComprasBundle:Producto:list.html.twig");
        return array('productos' => $productos);
    }

    /**
     * @Route("/producto/show/{id}", name="_producto_show")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $producto = $em->find("SaludComprasBundle:Item", $id);
        // Estas formas son equivalentes
        //$producto = $em->getRepository("SaludComprasBundle:Item")->find($id);
        //$producto = $em->getRepository("Salud\ComprasBundle\Entity\Item")->find($id);

        return array('producto' => $producto);
    }

    /**
     *
     * @Route("/producto/edit/{id}", name="_producto_edit"),
     * @Route("/producto/create", name="_producto_create", requirements={"id"="\d+"})
     * @Template()
     */
    public function editAction($id=null) {

        $em = $this->getDoctrine()->getEntityManager();
        if (isset($id)) {
            $producto = $em->find('SaludComprasBundle:Item', $id);
            if (!$producto)
                throw $this->createNotFoundException ("Producto no encontrado");
        }
        else
            $producto = new Item();

        $form = $this->createForm(new ItemType(), $producto);
        
        
        if ($this->getRequest()->getMethod() == 'POST') {
            //Enlazar el formulario con los datos enviados por el usuario
            $form->bindRequest($this->getRequest());
            
            //Validar los datos ingresados en el formulario
            if ($form->isValid())
            {
                //Guardar el objeto (aún no en la base de datos)
                $em->persist($producto);
                
                //Escribir los cambios a la base de datos
                $em->flush();
                
                //Después de guardar exitosamente es recomendable
                //rediriguir al usuario hacia otra página 
                // para evitar que los datos se reenvien si refresca la página
                
                return $this->redirect($this->generateUrl('_producto_show', 
                        array('id'=>$producto->getId())));
            }
        }
        return array('form' => $form->createView() , 'producto'=>$producto);
    }

}