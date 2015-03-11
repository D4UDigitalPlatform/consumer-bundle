<?php

namespace Itkg\ConsumerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ClientConfigType extends AbstractType
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('authLogin');
        $builder->add('authPassword');
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
        return 'itkg_consumer_client_config';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }
}
