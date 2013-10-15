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

class DefaultController
{
    public function indexAction()
    {
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
