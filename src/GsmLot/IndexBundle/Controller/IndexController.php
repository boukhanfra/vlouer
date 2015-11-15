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
	

		$this->breadcrumbs->addItem('index.menu.home',$this->get('router')->generate('index_index'));
	}
	
	
	
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
     * @Route("/about",name="index_about")
     * @Template()
     */
    public function aboutAction(Request $request)
    {
    	$_locale = $request->getLocale();
    	
    	return   $this->render('GsmLotIndexBundle:Index/About:about.'.$_locale.'.html.twig');

    }
    
    /**
     * @Route("/contact/{_locale}",name="index_contact",defaults={"_locale":"en"},requirements={"_locale":"en|fr|es"})
     * @Template()
     */
    public function contactAction($_locale)
    {
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
    		
    		$session = $this->get('session');
    		 
    		$session->getFlashBag()->set('message','Votre message a été bien envoyé');
    		
    	}
    
    	
    	
    	return $this->render('GsmLotIndexBundle:Index/Contact:contact.'.$_locale.'.html.twig', array(
    			'form' => $form->createView(),
    			));
    	
  
   
    }
   
}
