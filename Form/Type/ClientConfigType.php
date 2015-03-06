<?php

namespace Itkg\ConsumerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ClientConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('login');
        $builder->add('password');
        $builder->add('proxyHost');
        $builder->add('proxyPort');
        $builder->add('proxyLogin');
        $builder->add('proxyPassword');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'client_config_type';
    }
}
