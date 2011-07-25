<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('descripcionitem', 'text', array('label'=> 'Descripción'))
            ->add('autorizado', 'checkbox', array('required' => false))
            ->add('descontinuado', 'checkbox', array('required' => false))
            ->add('preciounitario', 'money', array('label'=>'Precio Unitario', 
                                            'currency'=> 'USD'))
            ->add('bloqueado', 'checkbox', array('required'=> false))
            ->add('observaciones', 'text', array('required'=>false))
            ->add('idEspecifico')
            ->add('idEspecificoOnu')
            ->add('idUnidadMedida')
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_itemtype';
    }
}