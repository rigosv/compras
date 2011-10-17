<?php

namespace Salud\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PlanComprasRepository extends EntityRepository
{
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
    
    public function getDetallePlan($id_plan) {
        $dql = "SELECT lp.id, i.descripcionitem, um.descripcionunidadmedida,
                        lp.preciounitario, lp.cantidadPedido,
                        i.id as iditem, (lp.cantidadPedido * lp.preciounitario) AS total
                    FROM SaludComprasBundle:LineaPlan lp
                        JOIN lp.idUnidadMedida um
                        JOIN lp.idItem i
                    WHERE lp.idPlanCompras = :id_plan
                    ORDER BY i.descripcionitem";
        $query = $this->_em->createQuery($dql);
        $query->setParameter('id_plan', $id_plan);
        return $query;
    }
}