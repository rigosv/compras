<?php
// scr/Salud/ComprasBundle/Repository/ItemRepository.php
namespace Salud\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;
class ItemRepository extends EntityRepository
{
    public function buscarItem($parameter) 
    {
        $dql = "SELECT item.id, item.descripcionitem, item.preciounitario,
                        um.descripcionunidadmedida
                    FROM SaludComprasBundle:Item item
                        JOIN item.idUnidadMedida um
                        WHERE 
                            LOWER(item.descripcionitem) LIKE :parameter ";                   
        $query = $this->_em->createQuery($dql);
        $query->setParameter('parameter', '%'.strtolower($parameter).'%' );
        return $query;
    }     
}