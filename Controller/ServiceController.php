<?php

namespace Itkg\ConsumerBundle\Controller;

use Itkg\ConsumerBundle\Document\ServiceConfig;
use Itkg\ConsumerBundle\Manager\ServiceManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ServiceController extends Controller
{
    /**
     * List of services
     *
     * @return array
     */
    public function indexAction()
    {
        return $this->render(
            'ItkgConsumerBundle:Service:index.html.twig',
            array(
                'services' => $this->getManager()->findServices()
            )
        );
    }

    /**
     * Edit / Update action
     *
     * @param Request $request
     * @param $id
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, $id)
    {
        $form = $this->createForm(
            'itkg_consumer_service_config',
            $this->getManager()->findServiceConfig($id)
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save instance
            $this->getManager()->updateServiceConfig($form->getData());
            $this->get('session')->getFlashBag()->add('success', 'Service updated successfully');

            return new RedirectResponse($this->generateUrl('itkg_consumer.service.list'));
        }

        return $this->render(
            'ItkgConsumerBundle:Service:update.html.twig',
            array(
                'form' => $form->createView(),
                'id'   => $id
            )
        );
    }

    /**
     * Get service manager
     *
     * @return ServiceManagerInterface
     */
    protected function getManager()
    {
        return $this->get('itkg_consumer.manager.service');
    }
}
