<?php

namespace Vip\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vip\SiteBundle\Entity\Order;
use Vip\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Vip\SiteBundle\Form\Type\OrderFormType;
use Vip\UserBundle\Form\Type\RegistrationFormType;

class DefaultController extends BaseController
{
    public function registerAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();

            /*****************************************************
             * Add new functionality (e.g. log the registration) *
             *****************************************************/
            $this->container->get('logger')->info(
                sprintf('New user registration: %s', $user)
            );

            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $this->authenticateUser($user);
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);

            return new RedirectResponse($url);
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }
    public function cpAction()
    {
        return $this->render('VipSiteBundle:Default:cp.html.twig', array());
    }
    public function orderAction()
    {
        return $this->render('VipSiteBundle:Default:cp.html.twig', array());
    }
}
