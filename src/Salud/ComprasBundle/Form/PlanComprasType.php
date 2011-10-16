<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlanComprasType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $fuente = $options['data']->getIdFuenteFinanciamiento();
       
        $builder
            ->add('numeroplan','text', array('label'=>'Número de plan') )
          ->add('numeroconvenio', 'text', array('label'=> 'Número de convenio',
                                    'required'=>false))
          ->add('idFuenteFinanciamiento', 'entity', array('label'=>'Fuente Financiamiento',
                        'class'=>'SaludComprasBundle:FuenteFinanciamiento',
                        'property'=>'descripcionfuente'))
           ->add('idSubfuenteFinanciamiento', 'entity', 
                    array('label'=>'Subfuente Financiamiento',
                        'class'=>'SaludComprasBundle:SubfuenteFinanciamiento',
                        'query_builder'=>function($repository) use ($fuente){                            
                            return $repository->createQueryBuilder('sf')
                                    ->where("sf.idFuenteFinanciamiento = :fuente")
                                    ->orderBy("sf.descripcionsubfuente")
                                    ->setParameter ('fuente', $fuente);
                                    ;
                        }))
            ->add('idPeriodoFiscal', 'entity', array('label'=>'Periodo Fiscal',
                        'class'=>'SaludComprasBundle:PeriodoFiscal',
                        'property'=>'aniofiscal'))            
            ->add('idUnidadSolicitante', 'entity', array('label'=>'Unidad Solicitante',
                        'class'=>'SaludComprasBundle:UnidadSolicitante',
                        'property'=>'nombreunidad DESC'))
            ->add('idUnidadFinanciadora', 'entity', array('label'=>'Unidad Financiadora',
                        'class'=>'SaludComprasBundle:UnidadSolicitante',
                        'property'=>'nombreunidad'))
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_plancomprastype';
    }
}
