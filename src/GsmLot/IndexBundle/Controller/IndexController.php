<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\IndexBundle\Entity\ContactMail;
use Symfony\Component\HttpFoundation\Request;
use GsmLot\IndexBundle\Form\Type\ContactMailType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;


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
		$list_offer_sell = $this->get('gsm_lot_offer.offer_manager')->getOfferReport('sell');
		$list_offer_buy = $this->get('gsm_lot_offer.offer_manager')->getOfferReport('buy');
		return
        $this->render('GsmLotIndexBundle:Index:index.html.twig',array('list_offer_sell'=>$list_offer_sell,
				'list_offer_buy' => $list_offer_buy));
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
    		->setFrom($mail->getEmail())
    		->setTo('admin@gsmlot.com')
    		->setBody(
    	    $this->renderView('GsmLotIndexBundle:Index/Contact:mail.html.twig',array('mail'=>$mail)),
    				'text/html'
    				);
    		
    		
    		$this->get('mailer')->send($message);
    		
    		$this->get('session')->getFlashBag()->add('notice','index.titre.msg');
    		 
    	
    		
    	}
    
    	
    	
    	return $this->render('GsmLotIndexBundle:Index/Contact:contact.'.$_locale.'.html.twig', array(
    			'form' => $form->createView(),
    			));
    	
  
   
    }
  

   
}
