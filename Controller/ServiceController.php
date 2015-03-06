<?php

namespace Itkg\ConsumerBundle\Controller;

use Itkg\ConsumerBundle\Manager\ServiceManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ServiceController extends Controller
{
    /**
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

    public function updateAction(Request $request)
    {
        $form = $this->createForm(
            $this->get('itkg_consumer.type.service_config')
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save instance
            // $this->getManager()->updateService();
            $this->get('session')->getFlashBag()->add('success', 'Service updated successfully');

            return new RedirectResponse($this->generateUrl('itkg_consumer.service.list'));
        }

        return array(
            'form' => $form
        );
    }

    /**
     * @return ServiceManagerInterface
     */
    protected function getManager()
    {
        return $this->get('itkg_consumer.manager.service');
    }
}
