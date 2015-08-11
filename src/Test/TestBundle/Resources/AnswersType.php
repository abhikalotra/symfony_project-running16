<?php
// src/Blogger/BlogBundle/Resources/QuestionsType.php

namespace Test\TestBundle\Resources;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AnswersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user_id', 'hidden');    
        $builder->add('question_id', 'hidden');    
        $builder->add('user_name', 'hidden');
        $builder->add('title');
        $builder->add('answer', 'textarea');
        $builder->add('comments', 'textarea');
        $builder->add('submit','submit');
        
        
       	
        
       //print_r($builder->get('name')->getData());
    }
      public function getName()
    {
        return 'Answers';
    }

    
}
