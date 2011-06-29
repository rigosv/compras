<?php

namespace Salud\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductoController extends Controller
{
    /**
     * @Route("/producto/list", name="_productoList")
     * @Template()
     */
    public function listAction()
    {        
        //Creamos una instancia del Entity Manager
        $em = $this->getDoctrine()->getEntityManager();
        
        //Obtener todos los productos
        $productos = $em->getRepository('SaludComprasBundle:Item')->findAll();
        //return $this->render("SaludComprasBundle:Producto:list.html.twig");
        return array('productos' => $productos);
    }
    
    /**
     * @Route("/producto/show/{id}", name="_productoShow")
     * @Template()
     */
    public function showAction($idparam) {
        
    }
}