<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\IndexBundle\Entity\ContactMail;
use Symfony\Component\HttpFoundation\Request;
use GsmLot\IndexBundle\Form\Type\ContactMailType;
use Symfony\Component\DependencyInjection\ContainerInterface;


class IndexController extends Controller
{
	
	
	private $breadcrumbs;
	
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");
	

	}
	
	
	
    /**
     * @Route("/",name="index_index")
     * @Template()
     */
    public function indexAction()
    {
        return  
        $this->render('GsmLotIndexBundle:Index:index.html.twig');
    }
    
    
    /**
     * @Route("/about",name="index_about")
     * @Template()
     */
    public function aboutAction(Request $request)
    {
    	$_locale = $request->getLocale();
    	
    	return   $this->render('GsmLotIndexBundle:Index/About:about.'.$_locale.'.html.twig');

    }
    
    /**
     * @Route("/contact",name="index_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
    	$_locale = $request->getLocale();
    	$form ='';
    	$mail = new ContactMail();
    	$form = $this->createForm(new ContactMailType(),$mail);
    	$form->handleRequest(Request::createFromGlobals());
    	
    	if($form->isValid())
    	{
    		
    		$message = \Swift_Message::newInstance()
    		->setSubject($mail->getObjectMail())
    		->setFrom('contact@gsmlot.com')
    		->setTo($mail->getEmail())
    		->setBody(
    	    $this->renderView('GsmLotIndexBundle:Index/Contact:mail.html.twig',array('mail'=>$mail)),
    				'text/html'
    				);
    		
    		
    		$this->get('mailer')->send($message);
    		
    		$this->get('session')->getFlashBag()->add('success','index.titre.msg');
    		 
    	
    		
    	}
    
    	
    	
    	return $this->render('GsmLotIndexBundle:Index/Contact:contact.'.$_locale.'.html.twig', array(
    			'form' => $form->createView(),
    			));
    	
  
   
    }
   
}
