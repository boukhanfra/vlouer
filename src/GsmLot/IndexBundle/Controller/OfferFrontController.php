<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GsmLot\IndexBundle\Form\Type\FilterType;
use Symfony\Component\HttpFoundation\Response;
use GsmLot\TraderBundle\Entity\City;


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
	 * @param Request $request
	 * @return Response
	 */
	public function offerMobileAction(Request $request)
	{
		$form = $this->createForm(new FilterType());
		
		$form->handleRequest($request);

		$parameters = $form->getData();

		if(!is_array($parameters))
		{
			$parameters = array();
		}
		$parameters = array_merge($parameters,array('state'=>'new'));

		$list_offer = $this->get('gsm_lot_offer.offer_manager')->offerList($parameters);
		
		$paginator = $this->get('knp_paginator');
		
		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
		
		
		return $this->render('GsmLotIndexBundle:Offer:offer.html.twig',
				array('list_offer'=>$pagination,'form'=>$form->createView()));
	}

	/**
	 * @param Request $request
	 * @return Response
	 * @throws \Exception
	 * @Route("/used",name="offer_used")
	 */
	public function offerUserMobileAction(Request $request)
	{
		$form = $this->createForm(new FilterType());

		$form->handleRequest($request);

		$parameters = $form->getData();

		if(!is_array($parameters))
		{
			$parameters = array();
		}
		$parameters = array_merge($parameters,array('state'=>'used'));

		$list_offer = $this->get('gsm_lot_offer.offer_manager')->offerList($parameters);

		$paginator = $this->get('knp_paginator');

		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);


		return $this->render('GsmLotIndexBundle:Offer:offer.html.twig',
				array('list_offer'=>$pagination,'form'=>$form->createView()));
	}
	
	/**
	 * @Route("/getModel/{brand_id}",name="brand_load_model",options={"expose"= true})
	 * @param Request $request
	 * @return Response
	 */
	public function getModelsAction(Request $request)
	{
		$content = '<option></option>';

		if ($request->isXmlHttpRequest()) 
		{
		
			$models = $this->get ( 'gsm_lot_offer.model_manager' )->getModelsByBrand($request->get('brand_id' ));

			foreach ( $models as $model ) 
			{
		
				$content .= '<option value ="' . $model->getId() . '">' . $model . '</option>';
			}
		}

		return new Response( $content, 200 );
	}
	
	
	/**
	 * @Route("/getCity/{country_id}",name="country_load_city",options={"expose"= true})
	 * @param Request $request
	 * @return Response
	 */
	public function getCitiesAction(Request $request)
	{
		$content = '<option></option>';

		if ($request->isXmlHttpRequest())
		{
		
			$cities = $this->get ('gsm_lot_trader.city_manager')->getCitiesByCountry($request->get('country_id'));

			/**
			 * @var $city City
			 */
			foreach ( $cities as $city )
			{
		
				$content .= '<option value ="' . $city->getId() . '">' . $city . '</option>';
			}
		}

		return new Response( $content, 200 );
	}
}