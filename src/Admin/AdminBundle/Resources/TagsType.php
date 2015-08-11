<?php
// src/Admin/AdminBundle/Resources/TagsType.php

namespace Admin\AdminBundle\Resources;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TagsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		
        $builder->add('title');
        $builder->add('tags');
        $builder->add('comments', 'textarea');
        $builder->add('submit','submit');
        
        
       	
        
       //print_r($builder->get('name')->getData());
    }
      public function getName()
    {
        return 'Tags';
    }

    
}
