<?php

namespace Salud\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlanComprasType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('numeroconvenio')
            ->add('montoplan')
            ->add('autorizado')
            ->add('fechaAutorizacion')
            ->add('enviado')
            ->add('fechaEnvio')
            ->add('consolidado')
            ->add('modificacionesHasta')
            ->add('permisos')
            ->add('numeroplan')
            ->add('idFuenteFinanciamiento')
            ->add('idPeriodoFiscal')
            ->add('idSubfuenteFinanciamiento')
            ->add('idUnidadFinanciadora')
            ->add('idUnidadSolicitante')
        ;
    }

    public function getName()
    {
        return 'salud_comprasbundle_plancomprastype';
    }
}
