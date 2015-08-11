<?php
// src/Blogger/BlogBundle/Resources/EnquiryType.php

namespace Test\TestBundle\Resources;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');    
        $builder->add('description');
        $builder->add('last');
        $builder->add('username');
        $builder->add('password', 'password');
        $builder->add('email' , 'email');
        $builder->add('submit','submit');
        
        
       	
        
       //print_r($builder->get('name')->getData());
    }
      public function getName()
    {
        return 'Enquiry';
    }

    
}
