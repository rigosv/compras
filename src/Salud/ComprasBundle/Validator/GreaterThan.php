<?php
namespace Salud\ComprasBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class GreaterThan extends Constraint
{
    public $message = 'Este valor deber ser un número mayor que {{ limit }} ';
    public $limit ;
    
    public function getDefaultOption()
    {
        return 'limit';
    }
}


