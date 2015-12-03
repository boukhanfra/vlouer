<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GsmLot\IndexBundle\Form\Type\FilterType;
use Symfony\Component\HttpFoundation\Response;


class OfferFrontController extends Controller 
{
	
	
	private $breadcrumbs;


	/**
	 * @param ContainerInterface|null $container
	 * @abstract Initialisation du controleur
	 */
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
	public function offerMobileAction(Request $request)
	{
		$form = $this->createForm(new FilterType());
		
		$form->handleRequest($request);
		
		$list_offer = $this->get('gsm_lot_offer.offer_manager')->offerList($form->getData());
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		
		return $this->render('GsmLotIndexBundle:Offer:offer.html.twig',
				array('list_offer'=>$pagination,'form'=>$form->createView()));
	}
	
	/**
	 * @Route("/brand/{type}/{brand_id}",name="offer_mobile_brand",defaults={"brand_id"=null})
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileBrandAction(Request $request)
	{
		$list_model = $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOffersModel(
				$request->get('type'),
				$request->get('brand_id'));
		$list_buy_norm = $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOffersNorm(
				array('type'=>$request->get('type'),
					'brand_id' => $request->get('brand_id')));
				
		$list_buy_country = $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOffersCountry(
				array('type'=>$request->get('type'),
					'brand_id' => $request->get('brand_id')));
				
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
	 * @Route("/country/{country_id}/{type}",name="offer_mobile_country",defaults={"country_id"= null})
	 * @Template()
	 * @param Request $request
	 */
	public function offerMobileCountryAction(Request $request)
	{
		$list_city= $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOfferCity(
				$request->get('type'),
				$request->get('country_id')
				);
		
		$list_offer = $this->get('gsm_lot_offer.offer_manager')->getMobileOfferCountry(
				$request->get('type'),
				$request->get('country_id'));
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		$list_brand = $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOffersBrand(
				array('type'=>$request->get('type'),
					  'country_id' => $request->get('country_id')
				));
		$list_norm = $this->get('gsm_lot_offer.offer_manager')->getMobileGroupedOffersNorm(
				array(
				'type' => $request->get('type'),
				'country_id' => $request->get('country_id')
				));
		
		return $this->render('GsmLotIndexBundle:Offer:offer_country.html.twig',array(
				'list_offer' => $pagination,
				'list_city' => $list_city,
				'list_brand' => $list_brand,
				'list_norm'	=> $list_norm
		));
	}
	
	
	/**
	 * @Route("/norm/{norm_id}/{type}",name="offer_mobile_norm")
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
		$list_offer = $this->get('gsm_lot_offer.offer_manager')->getMobileOfferModel(
				$request->get('type'),
				$request->get('model_id'));
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		return $this->render('GsmLotIndexBundle:Offer:offer_model.html.twig',array(
				'list_offer' => $pagination,
		));
		
		
	}
	
	/**
	 * @Route("/model/{city_id}/{type}",name="offer_mobile_city")
	 * @param Request $request
	 */
	public function offerMobileCityAction(Request $request)
	{
		$list_offer = $this->get('gsm_lot_offer.offer_manager')->getMobileOfferByCity(
				$request->get('type'),
				$request->get('city_id'));
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		return $this->render('GsmLotIndexBundle:Offer:offer_city.html.twig',array(
				'list_offer' => $pagination,
		));
	}
	
	
	/**
	 * @Route("/getModel/{brand_id}",name="brand_load_model",options={"expose"= true})
	 * @Template()
	 * @param Request $request
	 */
	public function getModelsAction(Request $request)
	{
		if ($request->isXmlHttpRequest()) 
		{
		
			$models = $this->get ( 'gsm_lot_offer.model_manager' )->getModelsByBrand($request->get('brand_id' ));
		
			$content = '<option></option>';
		
			foreach ( $models as $model ) 
			{
		
				$content .= '<option value ="' . $model->getId() . '">' . $model . '</option>';
			}
		
			return new Response( $content, 200 );
		}
	}
	
	
	/**
	 * @Route("/getCity/{country_id}",name="country_load_city",options={"expose"= true})
	 * @Template()
	 * @param Request $request
	 */
	public function getCitiesAction(Request $request)
	{
		if ($request->isXmlHttpRequest())
		{
		
			$cities = $this->get ('gsm_lot_trader.city_manager')->getCitiesByCountry($request->get('country_id'));
		
			$content = '<option></option>';
		
			foreach ( $cities as $city )
			{
		
				$content .= '<option value ="' . $city->getId() . '">' . $city . '</option>';
			}
		
			return new Response( $content, 200 );
		}
	}
	 
	
}