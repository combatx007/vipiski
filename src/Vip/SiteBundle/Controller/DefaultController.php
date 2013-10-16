<?php

namespace Vip\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vip\SiteBundle\Entity\Order;
use Vip\SiteBundle\Entity\Term;
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
        $user = new User();
        $order = new Order();

        $form = $this->createForm(new OrderFormType(), $order);

        $user_form = $this->createForm(new RegistrationFormType($user));

        if ($request->getMethod() == 'POST') {
            $user_form->bind($request);



                $encoder = $this->container->get('security.encoder_factory')->getEncoder(new User());


                $user->setUsername($user_form->getData()->getUsername())
                    ->setPassword($encoder->encodePassword('123', $user->getSalt()))
                    ->setEmail($user_form->getData()->getEmail())
                    ->setEnabled(true)
                    ->setPhone($user_form->getData()->getPhone());
                $em->persist($user);
                $em->flush();

                $form->bind($request);
            $term = new Term('asdfasdf');
            $order->setUser($user);
            $order->setCount($form->getData()->getCount());
            $order->setInn($form->getData()->getInn());
            $order->setOgrn($form->getData()->getOgrn());
            $order->setName($form->getData()->getName());
            $order->setDostavka($form->getData()->getDostavka());
            $order->setSpeed($term);
            ld($order->setSpeed($term));


            $em->persist($order);
            $em->flush();




                return $this->redirect($this->generateUrl(
                    'vip_site_homepage'
                ));

        }

        return $this->render('VipSiteBundle:Default:index.html.twig', array('form' => $form->createView(),'form_user' => $user_form->createView(),));


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
