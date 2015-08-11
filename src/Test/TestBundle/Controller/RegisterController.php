<?php

namespace Test\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;   
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Test\TestBundle\Entity\Questions;
use Test\TestBundle\Resources\QuestionsType;  



use Test\TestBundle\Entity\Enquiry;
use Test\TestBundle\Resources\EnquiryType;  

use Test\TestBundle\Entity\Answers;
use Test\TestBundle\Resources\AnswersType;  


use Symfony\Component\HttpFoundation\Session\Session;


use Symfony\Component\HttpFoundation\RedirectResponse;


use Stripe;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegisterController extends Controller 
 {
	  /************************ Index function start ********************************/
	  public function indexAction(Request $request)
    {
		
		
		  return $this->render('TestTestBundle:Page:index.html.twig');
        
    }
	  public function stripeAction()
    {
		 $request = $this->container->get('request');
        $message = '';
      
        if($request->get('test'))
        {
            \Stripe\Stripe::setApiKey('sk_test_ZPmfNFOUBUAY3YyiSSzUPMA8');

            $token = $request->get('stripeToken');

            $customer = \Stripe_Customer::create(array(
                  'email' => 'customer@example.com',
                  'card'  => $token
            ));

            $charge = \Stripe_Charge::create(array(
                  'customer' => $customer->id,
                  'amount'   => 5000,
                  'currency' => 'usd'
            ));

            $message = '<h1>Successfully charged $50.00!</h1>';
        }

		
		
		  return $this->render('TestTestBundle:Page:stripe.html.twig', array('message' => $message));
        
    }
	  // <<<<<-----------------------------    Index function end   ---------------------------- >>>>>>>>>>>.
	  	 
	 
	 /************************ register  function start ********************************/
	 public function registerAction(Request $request)
	 {
	
			$enquiry = new Enquiry();		
			 $forms = $this->createForm(new EnquiryType(), $enquiry);  
					
					if ($request->isMethod('POST')) {		
							
							$forms->bind($request);		     					 //   for entry data code process by this code
							$data = $forms->getData(); 							   
																		 //   for data save process by this code
																		 
							// $forms->bindRequest($request);
      				/*		
						$messageObject = \Swift_Message::newInstance()               //mailer
							->setSubject('Subject')
							->setFrom('username@xx.eu')
							->setTo('abhinandank@ocodewire.com')
							->setBody('message');
							$this->get('mailer')->send($messageObject);
								
				echo "<pre>"; print_r($messageObject);  
              */
																				 
								$em = $this->getDoctrine()->getEntityManager();
								$em->persist($data);
								$em->flush();     
																			//	echo "<pre>"; print_r($data); 							
							//return $this->redirect($this->generateUrl('test_test_showdata'));
							}

			return $this->render('TestTestBundle:Page:register.html.twig', array('form' => $forms->createView()));
				   
		}
	     // <<<<<-----------------------------    register data function end   ---------------------------- >>>>>>>>>>>.
	     
		
		
		
		/************************ show data function start *******************************/
		
		 public function showdataAction()   
		{
			   //get user detail
			   
			 $fetch_data  = $this->getDoctrine()->getManager()
						 ->getRepository('TestTestBundle:Enquiry')
						 ->findAll();				
																		//	echo "<pre>"; print_r($fetch_data);
			
						return $this->render('TestTestBundle:Page:showdata.html.twig' , array('fetch_data' => $fetch_data,));	
				
		 }
		  // <<<<<-----------------------------    show data function end   ---------------------------- >>>>>>>>>>>.
	    
	    
	    
	    
		/************************ Delete data by id controller start *******************************8*/
		
		 public function deleteAction($id)
		{
						
					$em = $this->getDoctrine()->getEntityManager();
					$del = $em->getRepository('TestTestBundle:Enquiry')->find($id);
					
					 if ($del) {
						$em->remove($del);
						$em->flush();
									return $this->redirect($this->generateUrl('test_test_showdata'));  // redirect the page
						}
						return $this->render('TestTestBundle:Page:delete.html.twig');	
		 }
		  // <<<<<-----------------------------    Delete data function end   ---------------------------- >>>>>>>>>>>.
	    
	    
	    
	    
	    
		/************************ update data by id function start *******************************8*/
		
		 public function updateAction($id, Request $request)
		{
				$em = $this->getDoctrine()->getEntityManager();
				$testimonial = $em->getRepository('TestTestBundle:Enquiry')->find($id);
				$form = $this->createForm(new EnquiryType(), $testimonial);

				$request = $this->get('request');
					if ($request->getMethod() == 'POST') {
						$form->bind($request);

					 $testimonial->getName();    				// go to entity name of set name	
						
						$em->persist($testimonial);
						$em->flush();					
						return $this->redirect($this->generateUrl('test_test_showdata'));
						
					}
	

				return $this->render('TestTestBundle:Page:update.html.twig', array('form' => $form->createView()));
			
					
						
		 }
		  // <<<<<-----------------------------    update data function end   ---------------------------- >>>>>>>>>>>.
	    
	    
	    
	    	  /************************ Index function start ********************************/
		 public function loginAction(Request $request)
			{
			
		$session = $this->getRequest()->getSession();
	     
		$em = $this->getDoctrine()
				->getEntityManager();
		$repository = $em->getRepository('TestTestBundle:Enquiry');
		if ($request->getMethod() == 'POST')
	 	{
	   		$session->clear();
	    	$name = $request->get('name'); //echo $name;  // echo $name; // echo "<pre>"; print_r($fetch_data);
	    	$password = $request->get('password');    //echo $password;
	    	$remember = $request->get('remember');
	    	//find email, password type and status of admin
            $user = $repository->findOneBy(array('name' => $name, 'password' => $password));
				//echo "<pre>"; print_r($user);
				
			if($user !=''){
								 
				$session->set('userIds', $user->getId());  
				$setid = $session->get('userIds', $user->getId());   
					
					  
					   
					$session->set('sessionname', $user->getName());
					$foo = $session->get('sessionname');   
					
					 echo $foo;		
				  return $this->redirect($this->generateUrl('test_test_index'));
						
				}else{
					
					echo "Please Enter your Correct name  OR Password"; 
					
					}
				
				} 
     
					return $this->render('TestTestBundle:Page:login.html.twig');
				}
				  // <<<<<-----------------------------    Index function end   ---------------------------- >>>>>>>>>>>.
				  
	  
	  
				/************************ login function start ********************************/
			  public function logoutAction()
			{
				  $session = $this->getRequest()->getSession();
					$session->clear('foo');
					$session->remove('foo');
					unset($session);
						return $this->redirect($this->generateUrl('test_test_index'));
						
				return $this->render('TestTestBundle:Page:logout.html.twig');
			}
			  // <<<<<-----------------------------    Logout function end   ---------------------------- >>>>>>>>>>>.
				 
			 
			 
			 
	  
				/************************ post_questions function start ********************************/
			  public function post_questionAction(Request $request)
			{
					
				$enquirys = new Questions();		
			 $form = $this->createForm(new QuestionsType(), $enquirys);  
			
			
					if ($request->isMethod('POST')) {		
						
						$form->bind($request);	
								     					 //   for entry data code process by this code
							$data = $form->getData(); 			           
						
															//  main thing  value into the dropdown
							  $objTag = $data->tags;							  
							 $data->tags = $objTag->tags;
							 
							 //echo "<pre>" ;  
							  //print_r($data);	
							  
							
							//$array = json_decode(json_encode($data ),TRUE); 
								
								//echo "<pre>"; 	print_r($array); 	
								//$da->tags  = $array['tags']['tags'];
								
								// print_r($form); 	
							//	die;
																				//   for data save process by this code
								$em = $this->getDoctrine()->getEntityManager();
								$em->persist($data);
								$em->flush();     
																			//	echo "<pre>"; print_r($data); 							
							//return $this->redirect($this->generateUrl('test_test_showdata'));
						}			
				 
				return $this->render('TestTestBundle:Page:post_question.html.twig', array('form' => $form->createView()));
			}
			  // <<<<<-----------------------------    post_questions function end   ---------------------------- >>>>>>>>>>>.
				 
	  
	  
	  
				/************************ Show  All Questions function start ********************************/
			  public function show_all_post_questionAction(Request $request)
			{
				
				
				$fetch_show_all_post  = $this->getDoctrine()->getManager()
										 ->getRepository('TestTestBundle:Questions')
										 ->findAll();	
				$da = array();
				foreach($fetch_show_all_post as $da)
				{ 
					$idq = $da->id;   	
					$show_answer_detail  = $this->getDoctrine()->getManager()
											->getRepository('TestTestBundle:Answers')
											->findBy(array('question_id'=> $idq)); 

																					//counting answer process  start ----------
								$totalCountanswer = count($show_answer_detail);	 
								$da->count = $totalCountanswer;                      //create or marge count 
																					//counting answer process	 end----------- 
										
				} 
											
				 
				return $this->render('TestTestBundle:Page:show_all_post_question.html.twig', array('fetch_show_all_post' => $fetch_show_all_post));
			}
			  // <<<<<-----------------------------    show_all_post_question function end   ---------------------------- >>>>>>>>>>>.
				 
				 
				 
				 
				 
				/************************ show_one_post_question function start ********************************/
			  public function show_one_post_questionAction($ids, Request $request)
			{
				
				
				$em = $this->getDoctrine()->getEntityManager();
				$show_one_post_data = $em->getRepository('TestTestBundle:Questions')->find($ids);
					
					
					/*	$em = $this->getDoctrine()->getEntityManager();
						
						$images = $em->createQueryBuilder()
								->select('Questions')
								->from('TestTestBundle:Questions',  'Questions')
								
								->getQuery()
								->getResult();
						
						
						echo"<pre>";	print_r($images);  die; */
				
			// echo"<pre>";	print_r($data);  die;		 
					
			 //echo"<pre>";	print_r($show_one_post_data);  die;				
			
			$enquirys = new Answers();		
			 $form = $this->createForm(new AnswersType(), $enquirys);   	
			 if ($request->isMethod('POST')) {						
							$form->bind($request);		     					 //   for entry data code process by this code
							$data = $form->getData(); 			                //print_r($data->title);								
																				//   for data save process by this code
								$em = $this->getDoctrine()->getEntityManager();
								$em->persist($data);
								$em->flush();     
																			//	echo "<pre>"; print_r($data); 							
							//return $this->redirect($this->generateUrl('test_test_showdata'));
				}	
	
					 $show_answer_data  = $this->getDoctrine()->getManager()
										 ->getRepository('TestTestBundle:Answers')
										 ->findBy(array('question_id'=> $ids));     	//check OR  match condiotion by Question_Id 
							
					$totalCount = count($show_answer_data);	                       // Counting the total Answers
				
				
		return $this->render('TestTestBundle:Page:show_one_post_question.html.twig' , array('show_one_post_data' => $show_one_post_data ,'show_answer_data' => $show_answer_data ,'totalCount'=> $totalCount, 'form' => $form->createView()));
				
			
			}
			  // <<<<<-----------------------------    show_one_post_question function end   ---------------------------- >>>>>>>>>>>.
				
				
				 
			 
				/************************ show_one_post_question function start ********************************/
			  public function show_post_by_tagsAction($tags, Request $request)
			{
				
				
			$fetch_data_by_tags  = $this->getDoctrine()->getManager()
										 ->getRepository('TestTestBundle:Questions')
										->findBy(array('tags'=> $tags)); 
								
								
			$da = array();
				foreach($fetch_data_by_tags as $da)
				{ 
					$idq = $da->id;   	
					$show_answer_detail  = $this->getDoctrine()->getManager()
											->getRepository('TestTestBundle:Answers')
											->findBy(array('question_id'=> $idq)); 

																					//counting answer process  start ----------
					$totalCountanswer = count($show_answer_detail);	 
					$da->count = $totalCountanswer;                      //create or marge count 
												
				} 
								
			
				return $this->render('TestTestBundle:Page:show_post_by_tags.html.twig', array('fetch_data_by_tags' => $fetch_data_by_tags));
				
			
			}
			  // <<<<<-----------------------------    show_one_post_question function end   ---------------------------- >>>>>>>>>>>.
				 
			 
		
	 }
