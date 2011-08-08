<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlanComprasType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder            
            ->add('numeroplan','text', array('label'=>'Número de plan') )
            ->add('numeroconvenio', 'text', array('label'=> 'Número de convenio',
                                    'required'=>false))
            ->add('idFuenteFinanciamiento', 'entity', 
                    array('label'=>'Fuente Financiamiento',
                'class'=>'SaludComprasBundle:FuenteFinanciamiento',
                'query_builder'=>function($repo){
                    return $repo->createQueryBuilder('f')
                            ->orderBy('f.descripcionfuente');
                }))            
            ->add('idSubfuenteFinanciamiento', 'entity', 
                    array('label'=>'Subfuente Financiamiento',
                'class'=>'SaludComprasBundle:SubfuenteFinanciamiento',
                'query_builder'=>function($repo){
                    return $repo->createQueryBuilder('sf')
                            ->orderBy('sf.descripcionsubfuente');
                }))
            ->add('idPeriodoFiscal', 'entity', array('label'=>'Periodo Fiscal',
                'class'=>'SaludComprasBundle:PeriodoFiscal',
                'query_builder'=>function($repo){
                    return $repo->createQueryBuilder('pf')
                            ->orderBy('pf.aniofiscal', 'DESC');
                }))            
            ->add('idUnidadSolicitante', 'entity', array('label'=>'Unidad Solicitante',
                'class'=>'SaludComprasBundle:UnidadSolicitante',
                'query_builder'=>function($repo){
                    return $repo->createQueryBuilder('us')
                            ->orderBy('us.nombreunidad');
                }))
            ->add('idUnidadFinanciadora', 'entity', array('label'=>'Unidad Financiadora',
                'class'=>'SaludComprasBundle:UnidadSolicitante',
                'query_builder'=>function($repo){
                    return $repo->createQueryBuilder('uf')
                            ->orderBy('uf.nombreunidad');
                }))
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_plancomprastype';
    }
}
