<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\IndexBundle\Entity\ContactMail;

class IndexController extends Controller
{
    /**
     * @Route("/{_locale}",name="index_index",defaults={"_locale":"en"},requirements={"_locale":"en|fr|es"})
     * @Template()
     */
    public function indexAction($_locale)
    {
        return  
        $this->render('GsmLotIndexBundle:Index:index.html.twig');
    }
    
    
    /**
     * @Route("/about/{_locale}",name="index_about",defaults={"_locale":"en"},requirements={"_locale":"en|fr|es"})
     * @Template()
     */
    public function aboutAction($_locale)
    {   	
    	return   $this->render('GsmLotIndexBundle:Index/About:about.'.$_locale.'.html.twig');

    }
    
    /**
     * @Route("/contact",name="index_contact")
     */
    public function contactAction()
    {
    	$form ='';
    	$mail = new ContactMail();
    	
    	if($this->getRequest()->getMethod() == 'POST')
    	{
    		
    		$message = \Swift_Message::newInstance()
    		->setSubject('')
    		->setFrom('contact@gsmlot.com')
    		->setTo('recipient@example.com')
    		->setBody(
    	    $this->renderView('GsmLotIndexBundle:Index:mail.html.twig'),array('mail'=>$mail),
    				'text/html'
    				);
    		
    		
    		$this->get('mailer')->send($message);
    		
    		$session = $this->get('session');
    		 
    		$session->getFlashBag()->set('message','Votre message a été bien envoyé');
    		
    	}
    	

    	
    	$this->render('GsmLotIndexBundle:Index:contact.html.twig',array('form'=>$form));
    }
    
}
