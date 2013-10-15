<?php
namespace Vip\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vip\SiteBundle\Entity\Order;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('speed','choice', array(
                'choices'   => array('n' => 'не срочная (5 рабочих дней', 'y' => 'срочная (1 сутки)'),
                'expanded'  => true,
            ))
            ->add('name','text')
            ->add('ogrn','text')
            ->add('inn','text')
            ->add('term', null, ['expanded' => true])
            ->add('count','text')

            ->add('dostavka','choice', array(
                'choices'   => array('y' => 'Нужна', 'n' => 'Не нужно (заберем у вас в офисе)'),
                'expanded'  => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vip\SiteBundle\Entity\Order',
        ));
    }

    public function getName()
    {
        return 'order';
    }
}