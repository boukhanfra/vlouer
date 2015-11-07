<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\OfferBundle\Form\Type\OfferType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferController extends Controller
{
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
    	$offer = new Offer();
    	$form = $this->createForm(new OfferType(),$offer);
    	$form->handleRequest($request);
    	if($form->isValid())
    	{
    		$offer->setTrader($this->get('security.token_storage')->getToken()->getUser()->getTrader());
    		
    		$this->get('gsm_lot_offer.offer_manager')->createOffer($offer);    		
    	}
    	
    	return $this->render('GsmLotOfferBundle:Offer:create.html.twig',
    			array('form'=>$form->createView()));
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
    	$model = $this->get('gms_lot_offer.offer_manager')->getModel($id);
    	
    	return new Response($model->getName());
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
