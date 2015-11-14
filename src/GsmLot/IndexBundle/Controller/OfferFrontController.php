<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;


class OfferFrontController extends Controller 
{
	
	
	private $breadcrumbs;
	
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");
	
		$this->breadcrumbs->addItem('index.menu.home',$this->get('router')->generate('index_index'));
	
		$this->breadcrumbs->addItem('index.menu.phones',$this->get('router')->generate('offer_mobile'));
	
	}
	
	
	
	/**
	 * @Route("/",name="offer_mobile")
	 * @Template()
	 */
	public function offerMobileAction()
	{
		$list_buy_brand = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersBrand('buy');
		$list_buy_norm = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersNorm('buy');
		$list_buy_country = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersCountry('buy');
		 
		$list_sell_brand = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersBrand('sell');
		$list_sell_norm = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersNorm('sell');
		$list_sell_country = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersCountry('sell');
	
		return $this->render('GsmLotIndexBundle:Offer:offer_1.html.twig',
				array('list_buy_brand'=>$list_buy_brand,
						'list_buy_norm'=>$list_buy_norm,
						'list_buy_country'=>$list_buy_country,
						'list_sell_brand'=>$list_sell_brand,
						'list_sell_norm'=>$list_sell_norm,
						'list_sell_country'=>$list_sell_country,
				));
	}
	
	/**
	 * @Route("/brand/{brand_id}/{type}",name="offer_mobile_brand")
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileBrandAction(Request $request)
	{
		$list_model = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersModel(
				$request->get('type'),$request->get('brand_id'));
		$list_buy_norm = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersNorm($request->get('type'));
		$list_buy_country = $this->get('gsm_lot_offer.offer_manager')->getMobileOffersCountry($request->get('type'));
		$list_offer = $this->get('gsm_lot_offer.offer_manager')->getMobileOfferBrand($request->get('type'),$request->get('brand_id'));
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		return $this->render('GsmLotIndexBundle:Offer:offer_brand.html.twig',
				array('list_model'=>$list_model,
						'list_buy_norm'=>$list_buy_norm,
						'list_buy_country'=>$list_buy_country,
						'list_offer' => $pagination
						
				));
	}
	
	/**
	 * @Route("/country/{country_id}",name="offer_mobile_country")
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileCountryAction($type,$country_id)
	{
		
	}
	
	
	/**
	 * @Route("/norm/{norm_id}",name="offer_mobile_norm")
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileNorm(Request $request)
	{
	
	}
	
	/**
	 * @Route("/model/{model_id}/{type}",name="offer_mobile_model")
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileModelAction(Request $request)
	{
		
	}
	
	
}