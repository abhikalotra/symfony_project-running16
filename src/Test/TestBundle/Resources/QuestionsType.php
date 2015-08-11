<?php

namespace Test\TestBundle\Resources;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Doctrine\ORM\EntityManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user_id','hidden');    
        $builder->add('title');

       $builder->add('tags', 'entity', array( 	'mapped'   => true, 
												'class'    => 'AdminAdminBundle:Tags',
												'property' => 'tags'	
												
												));
        /* $builder->add('tags', 'entity', array( 
												'mapped'   => true, 
												'class'    => 'AdminAdminBundle:Tags',
												'property' => 'tags '	
												
												)); */
        $builder->add('question');
        $builder->add('description', 'textarea');
        $builder->add('user_name','hidden');
        $builder->add('views','hidden');
        $builder->add('submit','submit');
        

        
       //print_r($builder->get('name')->getData());
    }
      public function getName()
    {
        return 'Questions';
    }
    

    
}
