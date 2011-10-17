<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LineaPlanType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('idPlanCompras', 'text', array('label'=>'Plan Compras',
                'read_only'=>true))
            ->add('idItem', 'entity', array('label'=>'Producto',
                'class'=>'SaludComprasBundle:Item',
                'property'=>'descripcionitem'))
            ->add('idUnidadMedida', 'entity', array('label'=>'Unidad de Medida',
                'class'=>'SaludComprasBundle:UnidadMedida',
                'property'=>'descripcionunidadmedida'))
            ->add('preciounitario', 'money', array('label'=> 'Precio Unitario',
                'currency'=>'US'))
            ->add('cantidadPedido', 'number', array('label'=>'Cantidad'))
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_lineaplantype';
    }
}
