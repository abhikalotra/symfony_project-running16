<?php

namespace Admin\AdminBundle\Controller;


use Symfony\Component\HttpFoundation\Request;   
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Admin\AdminBundle\Entity\Tags;
use Admin\AdminBundle\Resources\TagsType; 


	//use Test\TestBundle\Entity\Questions;
	//use Test\TestBundle\Resources\QuestionsType;  
	//use Test\TestBundle\Entity\Enquiry;
	//use Test\TestBundle\Resources\EnquiryType;  
	//use Test\TestBundle\Entity\Answers;
	//use Test\TestBundle\Resources\AnswersType;  

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
	
	
			/************************ Index function start ********************************/			  
    public function indexAction()
    {
		
		$Questions_count  = $this->getDoctrine()->getManager()   			    //Question counts
							 ->getRepository('TestTestBundle:Questions')
							 ->findAll();	
		$total_noof_questions = count($Questions_count);	  
		
		 
		$Answers_count  = $this->getDoctrine()->getManager()                    //Answers counts
							 ->getRepository('TestTestBundle:Answers')
							 ->findAll();	
		$total_noof_answers = count($Answers_count);	  
		
		$Comments_count  = $this->getDoctrine()->getManager()                    //Comments counts
							 ->getRepository('TestTestBundle:Answers')
							 ->findAll();	
		$total_noof_comments = count($Comments_count);	  
		
		
		$Register_user_count  = $this->getDoctrine()->getManager()                //Register_user counts
							 ->getRepository('TestTestBundle:Enquiry')
							 ->findAll();	
		$total_noof_reg_user = count($Register_user_count);	  
		
		
		$fetch_show_all_question  = $this->getDoctrine()->getManager()                //Show_all_Question 
								 ->getRepository('TestTestBundle:Questions')
								 ->findBy(array(), array('id' => 'DESC'));    
                    
		//echo"<pre>"; 
		//print_r($fetch_show_all_post); die;
		
        return $this->render('AdminAdminBundle:Page:index.html.twig', array('total_noof_questions' => $total_noof_questions,'total_noof_answers' => $total_noof_answers,'total_noof_comments' => $total_noof_comments,'total_noof_reg_user' => $total_noof_reg_user,'fetch_show_all_post'=>$fetch_show_all_question));
    }    
			 // <<<<<-----------------------------    Index function end   ---------------------------- >>>>>>>>>>>.
    
    
    
   /************************ Panel function start ********************************/
    public function panelAction()
    {
				
        return $this->render('AdminAdminBundle:Page:panel.html.twig');
    }
     // <<<<<-----------------------------    Index function end   ---------------------------- >>>>>>>>>>>.
    
    
    
    
    /************************ Tags function start ********************************/	
    public function tagsAction(Request $request)
    {
		
		
			$tags = new Tags();		
			 $formtag = $this->createForm(new TagsType(), $tags);  
			
				
					if ($request->isMethod('POST')) {
																		//$name = $request->get('title');		
									
							$formtag->bind($request);		     					 //   for entry data code process by this code
							$data = $formtag->getData(); 			                //print_r($data->title);	
																					//   for data save process by this code
								$em = $this->getDoctrine()->getEntityManager();
								$em->persist($data);
								$em->flush();     
										
						}	
						
						
		
		$Questions_count  = $this->getDoctrine()->getManager()   			    //Question counts
							 ->getRepository('TestTestBundle:Questions')
							 ->findAll();	
		$total_noof_questions = count($Questions_count); 
		
		 
		$Answers_count  = $this->getDoctrine()->getManager()                    //Answers counts
							 ->getRepository('TestTestBundle:Answers')
							 ->findAll();	
		$total_noof_answers = count($Answers_count);	  
		
		$Comments_count  = $this->getDoctrine()->getManager()                    //Comments counts
							 ->getRepository('TestTestBundle:Answers')
							 ->findAll();	
		$total_noof_comments = count($Comments_count);	  
		
		
		$Register_user_count  = $this->getDoctrine()->getManager()                //Register_user counts
							 ->getRepository('TestTestBundle:Enquiry')
							 ->findAll();	
		$total_noof_reg_user = count($Register_user_count);	  
		
		
		$fetch_show_all_question  = $this->getDoctrine()->getManager()                //Show_all_Question 
								 ->getRepository('TestTestBundle:Questions')
								 ->findBy(array(), array('id' => 'DESC'),5);    
                    		
				
				
        return $this->render('AdminAdminBundle:Page:tags.html.twig', array('total_noof_questions' => $total_noof_questions,'total_noof_answers' => $total_noof_answers,'total_noof_comments' => $total_noof_comments,'total_noof_reg_user' => $total_noof_reg_user,'fetch_show_all_post'=>$fetch_show_all_question,'form' => $formtag->createView()));
    }
     // <<<<<-----------------------------    Tags function end   ---------------------------- >>>>>>>>>>>.
    
    
    
}
