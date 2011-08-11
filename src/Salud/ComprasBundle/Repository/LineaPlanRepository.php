<?php

// src/Salud/ComprasBundle/Repository/LineaPlanRepository.php
    
namespace Salud\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class LineaPlanRepository extends EntityRepository {

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