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
}