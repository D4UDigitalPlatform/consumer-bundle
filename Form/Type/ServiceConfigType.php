<?php

namespace Itkg\ConsumerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ServiceConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('serviceKey');
        $builder->add('responseType');
        $builder->add('responseFormat');
        $builder->add('cacheTtl');
        $builder->add('disabled', 'checkbox');
        $builder->add('clientConfig', 'client_config_type');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'service_config_type';
    }
}
