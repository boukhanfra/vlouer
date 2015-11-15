<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ModelController extends Controller 
{
	
	/**
	 * @Route("/searchModel",name="model_search",options={"expose":"true"})
	 * @param Request $request
	 */
	public function searchModelAction(Request $request)
	{
		$q = $request->get('term');
		 
		$results = $this->get('gms_lot_offer.model_manager')->searchModel($q);
		 
		return $this->render('GsmLotOfferBundle:Offer:model.html.twig',
				array('results'=>$results));
	}
	 
	
	/**
	 * @Route("/getModel",name="model_get",options={"expose":"true"})
	 * @param integer $id
	 */
	public function getModelAction($id)
	{
		$model = $this->get('gms_lot_offer.model_manager')->getModel($id);
		 
		return new Response($model->getName());
	}
	
}