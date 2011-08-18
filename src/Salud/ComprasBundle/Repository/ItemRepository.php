<?php

// scr/Salud/ComprasBundle/Repository

/**
 * Description of PlanComprasRepository
 *
 * @author rigo
 */

namespace Salud\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ItemRepository extends EntityRepository {

    /**
     * Recuperar el encabezado del plan de compras
     */
    public function buscarItem($parameter) {
        $dql = "SELECT item.id, item.descripcionitem, item.preciounitario,
                        um.descripcionunidadmedida
                    FROM SaludComprasBundle:Item item
                        JOIN item.idUnidadMedida um
                        WHERE 
                            LOWER(item.descripcionitem) LIKE :parameter ";

        $query = $this->_em->createQuery($dql);
        $query->setParameter('parameter', '%' . strtolower($parameter) . '%');


        return $query;
    }

}