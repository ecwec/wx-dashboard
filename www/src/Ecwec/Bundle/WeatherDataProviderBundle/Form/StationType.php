<?php

namespace Ecwec\Bundle\WeatherDataProviderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objectId')
            ->add('name')
            ->add('description')
            ->add('latitude')
            ->add('longitude')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecwec\Bundle\WeatherDataProviderBundle\Entity\Station'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ecwec_bundle_weatherdataproviderbundle_station';
    }
}
