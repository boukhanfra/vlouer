<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\OfferBundle\Form\Type\OfferType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OfferController extends Controller
{
	
	
	private $breadcrumbs;
	
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;

		$this->breadcrumbs = $this->get("white_october_breadcrumbs");
		
		$this->breadcrumbs->addItem('index.menu.home',$this->get('router')->generate('index_index'));
		
		$this->breadcrumbs->addItem('index.menu.myspaceoffers',$this->get('router')->generate('offer_list'));
		
	}
	
    /**
     * @Route("/",name="offer_list")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        $list_offer = $user->getTrader()->getOffers();
        
        $paginator = $this->get('knp_paginator');
        
        $pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
        
        return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('pagination'=>$pagination));
    }
        
    /**
     * @Route("/create",name="offer_create")
     * @Template()
     */
    public function createAction(Request $request)
    {  	
    	$this->breadcrumbs->addItem('offer.create',$this->get('router')->generate('offer_create'));
    	
    	$offer = new Offer();
    	$form = $this->createForm(new OfferType(),$offer);
    	$form->handleRequest($request);
    	if($form->isValid())
    	{
    	
    		$offer->setTrader($this->get('security.token_storage')->getToken()->getUser()->getTrader());
    		
    		$this->get('gsm_lot_offer.offer_manager')->createOffer($offer);
    		
    		$this->get('session')->getFlashBag()->add('notice','offer.created');
    		
    		return $this->redirectToRoute('offer_list');
    	}
    	
    	return $this->render('GsmLotOfferBundle:Offer:create.html.twig',
    			array('form'=>$form->createView()));
    }
    
    
    /**
     * @Route("/update/{offer_id}",name="offer_update")
     * @Template()
     */
    public function updateAction(Request $request)
    {        	
    	$offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($request->get('offer_id'));
    	
    	$user = $this->get('security.token_storage')->getToken()->getUser();
    	
    	if($offer)
    	{
    		if($offer->getTrader()->getUser()->getId() == $user->getId())
    		{
    			$this->breadcrumbs->addItem('offer.update',$this->get('router')->generate('offer_update',array('offer_id'=> $offer->getId())));
    			 
    			
    			$form = $this->createForm(new OfferType(),$offer);
    			
    			$form->handleRequest($request);
    			
    			if($form->isValid())
    			{
    				$offer->setTrader($this->get('security.token_storage')->getToken()->getUser()->getTrader());
    			
    				$this->get('gsm_lot_offer.offer_manager')->updateOffer($offer);
    				
    				$this->get('session')->getFlashBag()->add('notice','offer.updated');
    				
    				return $this->redirectToRoute('offer_list');
    			}
    			
    			return $this->render('GsmLotOfferBundle:Offer:update.html.twig',
    					array('form'=>$form->createView()));		
    		}
    	} 	
    }
   
        
    /**
     * @Route("/searchModel",name="model_search",options={"expose":"true"})
     * @param Request $request
     */
    public function searchModelAction(Request $request)
    {
    	$q = $request->get('term');
    	
    	$results = $this->get('gsm_lot_offer.offer_manager')->searchModel($q);
    	
    	return $this->render('GsmLotOfferBundle:Offer:model.html.twig',
    			array('results'=>$results));
    }
     
    
    /**
     * @Route("/getModel",name="model_get",options={"expose":"true"})
     * @param integer $id
     */
    public function getModelAction($id)
    {
    	$model = $this->get('gsm_lot_offer.offer_manager')->getModel($id);
    	
    	return new Response($model->getName());
    }
    
    
    /**
     * @Route("/active/{offer_id}",name="offer_activate")
     * @Template()
     */
    public function activateAction($offer_id)
    {
    	$offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($offer_id);
    	
    	$user = $this->get('security.token_storage')->getToken()->getUser();
    	
    	if($offer)
    	{
    		if($offer->getTrader()->getUser()->getId() == $user->getId())
    		{
    			$this->get('gsm_lot_offer.offer_manager')->activateOffer($offer);
    			
    			$this->get('session')->getFlashBag()->add('notice','offer.activated');
    			
    			return $this->redirectToRoute('offer_list');
    		}
    	}
    }
    
    
    /**
     * @Route("/deactive/{offer_id}",name="offer_deactive")
     * @Template()
     */
    public function deativateAction($offer_id)
    {
    	$offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($offer_id);
    	 
    	$user = $this->get('security.token_storage')->getToken()->getUser();
    	 
    	if($offer)
    	{
    		if($offer->getTrader()->getUser()->getId() == $user->getId())
    		{
    			$this->get('gsm_lot_offer.offer_manager')->deactivateOffer($offer);
    			
    			$this->get('session')->getFlashBag()->add('notice','offer.desactivated');
    			
    			return $this->redirectToRoute('offer_list');
    		}
    	}
    }    
}
