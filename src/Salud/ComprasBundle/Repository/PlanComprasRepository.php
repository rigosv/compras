<?php

namespace Salud\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PlanComprasRepository extends EntityRepository {

    /**
     * Obtiene los planes de compras con todas sus relaciones
     */
    public function getPlanes() {
        $qb = $this->createQueryBuilder('plan')
                ->select('plan, fuente, subfuente, periodo, 
                    unidadSolicitante, unidadFinanciadora, origen')
                ->join('plan.idFuenteFinanciamiento', 'fuente')
                ->join('plan.idSubfuenteFinanciamiento', 'subfuente')
                ->join('plan.idPeriodoFiscal', 'periodo')
                ->join('plan.idUnidadSolicitante', 'unidadSolicitante')
                ->join('plan.idUnidadFinanciadora', 'unidadFinanciadora')
                ->join('fuente.idOrigenFinanciamiento', 'origen')
        ;

        return $qb->getQuery();
    }

    public function getDetallePlan($id_plan, $campo_orden='descripcionitem', $tipo_orden='asc') {
        $prefijo = '';
        switch ($campo_orden) {
            case 'descripcionitem': 
                $prefijo = 'i.';
                break;
            case 'descripcionunidadmedida': 
                $prefijo = 'um.';
                break;
            case 'preciounitario': 
            case 'cantidadPedido':     
                $prefijo = 'lp.';
                break;
        }
        $campo_orden = $prefijo.$campo_orden;
        
        $qb = $this->createQueryBuilder('plan')
                ->select('lp.id, i.descripcionitem, um.descripcionunidadmedida,
                        lp.preciounitario, lp.cantidadPedido,
                        i.id as iditem, (lp.cantidadPedido * lp.preciounitario) AS total')
                ->from('SaludComprasBundle:LineaPlan', 'lp')
                ->join('lp.idUnidadMedida', 'um')
                ->join('lp.idItem', 'i')                
                ->where('lp.idPlanCompras = :id_plan')
                ->orderBy($campo_orden, $tipo_orden)
                ->setParameter('id_plan', $id_plan);
        return $qb->getQuery();
    }

    public function getTotalLineasDetalle($id_plan) {
        $qb = $this->createQueryBuilder('plan')
                ->select('count (lp.id) as total_lineas, 
                    sum(lp.cantidadPedido * lp.preciounitario) AS total_monto')
                ->from('SaludComprasBundle:LineaPlan', 'lp')
                ->where('lp.idPlanCompras = :id_plan')
                ->setParameter('id_plan', $id_plan);
        return $qb->getQuery();
    }

}