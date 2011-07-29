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
            ->add('idEspecifico', 'entity',
                    array('class' => 'SaludComprasBundle:Especifico',
                        'query_builder' => function ($repository) {
                            return $repository->getByCatalogo('02');
                        },
                        'label' => 'Específicio Catálogo Egresos'
                    ))
            ->add('idEspecificoOnu', 'entity',
                    array('class' => 'SaludComprasBundle:Especifico',
                        'query_builder' => function ($repo) {
                            return $repo->getByCatalogo('01');
                        },
                        'label' => 'Específicio Catálogo ONU'
                        )
                    )
            ->add('idUnidadMedida', 'entity', 
                    array('class' => 'SaludComprasBundle:UnidadMedida',
                        'query_builder' => function ($repository){
                            return $repository->createQueryBuilder('um')
                                    ->orderBy('um.descripcionunidadmedida');
                        }
                        )
                    )
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_itemtype';
    }
}