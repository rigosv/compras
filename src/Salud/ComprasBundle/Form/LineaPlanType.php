<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LineaPlanType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('preciounitario')
            ->add('cantidadPedido')
            ->add('idItem')
            ->add('idPlanCompras')
            ->add('idUnidadMedida')
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_lineaplantype';
    }
}
