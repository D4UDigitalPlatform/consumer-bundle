<?php

namespace Itkg\ConsumerBundle\Listener;

use Itkg\Consumer\Event\ServiceEvent;
use Itkg\Consumer\Event\ServiceEvents;
use Itkg\Consumer\Service\ServiceConfigurableInterface;
use Itkg\ConsumerBundle\Repository\ServiceConfigRepositoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ConfigListener
 * @package Itkg\ConsumerBundle\Listener
 */
class ConfigListener implements EventSubscriberInterface
{
    /**
     * @var ServiceConfigRepositoryInterface
     */
    private $repository;

    /**
     * @param ServiceConfigRepositoryInterface $repository
     */
    public function __construct(ServiceConfigRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function onServiceRequest(ServiceEvent $event)
    {
        $service = $event->getService();

        if (!$service instanceof ServiceConfigurableInterface) {
            return;
        }

        if ($serviceConfig = $this->repository->findOneByServiceKey($service->getIdentifier())) {
            // Inject service configuration & client configuration

            $service->configure($serviceConfig->toOptions());
            $service->getClient()->setOptions(
                $serviceConfig->getClientConfig()->toOptions()
            );

            // @TODO : Request override conf ?
        }
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            ServiceEvents::REQUEST => array('onServiceRequest', 20)
        );
    }
}
