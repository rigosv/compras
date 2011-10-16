<?php

namespace Salud\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * PlanCompras controller.
 *
 * @Route("/fuentefinanciamiento")
 */
class FuenteFinanciamientoController extends Controller
{
    /**
     * @Route("/{id}/subfuentes")
     * @Template()
     */
    public function getSubfuentesAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $subfuentes = $em->getRepository("SaludComprasBundle:SubfuenteFinanciamiento")
                        ->findBy(array('idFuenteFinanciamiento'=> $id), 
                                array('descripcionsubfuente'=>'ASC'));
        
        $respuesta = array();
        foreach ($subfuentes as $sf){
            $aux['id'] = $sf->getId();
            $aux['descripcionsubfuente'] = $sf->getDescripcionsubfuente();            
            $respuesta[] = $aux;
        }
        return new Response(json_encode($respuesta), 200, array('Content-Type' => 'application/json'));
    }
}
