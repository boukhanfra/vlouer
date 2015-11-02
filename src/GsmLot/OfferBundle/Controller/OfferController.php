<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\OfferBundle\Form\Type\OfferType;
use Symfony\Component\HttpFoundation\Request;

class OfferController extends Controller
{
    /**
     * @Route("/",name="offer_list")
     * @Template()
     */
    public function listAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('user'=>$user));
    }
        
    /**
     * @Route("/create",name="offer_create")
     * @Template()
     */
    public function createAction()
    {  	
    	$offer = new Offer();
    	$form = $this->createForm(new OfferType(),$offer);
    	$form->handleRequest(Request::createFromGlobals());
    	if($form->isValid())
    	{
    		$offer->setTrader($this->get('security.token_storage')->getToken()->getUser()->getTrader());
    		
    		$this->get('gsm_lot_offer.offer_manager')->createOffer($offer);    		
    	}
    	
    	return $this->render('GsmLotOfferBundle:Offer:create.html.twig',
    			array('form'=>$form->createView()));
    }
        
    /**
     * @Route("/disable")
     * @Template()
     */
    public function disableAction()
    {
    	
    }
    
    /**
     * @Route("/remove")
     * @Template()
     */
    public function removeAction()
    {
    	
    }
    
}
