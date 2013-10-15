<?php

namespace Vip\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vip\SiteBundle\Entity\Order;
use Vip\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vip\SiteBundle\Form\Type\OrderFormType;
use Vip\UserBundle\Form\Type\RegistrationFormType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user_form = $this->createForm(new RegistrationFormType($user));
        $user_form ->setData($user);
        if ($request->getMethod() == 'POST') {
            $user_form->bind($request);

            if ($user_form ->isValid()) {
                $user->setUsername('sdf222sf2');
                $user->setPassword('sdfsf2');
                $userManager->updateUser($user);
                $em->persist($user_form->getData());
                $em->flush();




                return $this->redirect($this->generateUrl(
                    'vip_site_homepage'
                ));
            }
        }

        return $this->render('VipSiteBundle:Default:index.html.twig', array('form_user' => $user_form->createView(),));


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
