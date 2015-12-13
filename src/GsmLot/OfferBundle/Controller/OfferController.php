<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\OfferBundle\Form\Type\OfferType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class OfferController extends Controller
{

	/**
	 * @var BreadCrumbs
	 */
	private $breadcrumbs;

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;

		$this->breadcrumbs = $this->get("white_october_breadcrumbs");
		
		$this->breadcrumbs->addItem('index.menu.home',$this->get('router')->generate('index_index'));
		

	}
	
    /**
     * @Route("/",name="offer_list")
     * @Template()
	 * @return Response;
	 * @param Request $request
     */
    public function listAction(Request $request)
    {
		$this->breadcrumbs->addItem('index.menu.myspaceoffers',$this->get('router')->generate('offer_list'));

		$user = $this->get('security.token_storage')->getToken()->getUser();

        $list_offer = array();

        $this->get('session')->set('redirect','offer_list');

        /**
         * @var $offer Offer
         */
		foreach($user->getTrader()->getOffers() as $offer)
		{
			if($offer->getOfferType()->getName()=='sell')
			{
				$list_offer[] = $offer;
			}
		}
        
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
        
        return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('pagination'=>$pagination,'title'=>'index.titre.sell'));
    }


	/**
	 * @param Request $request
	 * @return Response
	 * @Route("/myRequest",name="offer_request")
	 */
	public function requestAction(Request $request)
	{
		$this->breadcrumbs->addItem('index.titre.buy',$this->get('router')->generate('offer_request'));

		$user = $this->get('security.token_storage')->getToken()->getUser();

        $this->get('session')->set('redirect','offer_request');

		$list_offer = array();

        /**
         * @var $offer Offer
         */
		foreach($user->getTrader()->getOffers() as $offer)
		{
			if($offer->getOfferType()->getName()=='buy')
			{
				$list_offer[] = $offer;
			}
		}

		$paginator = $this->get('knp_paginator');

		$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);

		return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('pagination'=>$pagination,'title'=>'index.titre.buy'));
	}
    
    /**
     * @Route("/offerAdmin",name="offer_admin_list")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
	 * @return Response
     */
    public function listAdminAction(Request $request)
    {

        $this->breadcrumbs->addItem('index.menu.myspaceoffers',$this->get('router')->generate('offer_admin_list'));

        $list_offer = $this->get('gsm_lot_offer.offer_manager')->offerListAdmin();
    	
    	$paginator = $this->get('knp_paginator');
    	
    	$pagination = $paginator->paginate($list_offer,$request->query->getInt('page',1),10);
    	
    	return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('pagination'=>$pagination));
    }
    
    /**
     * @Route("/enable/{offer_id}",name="offer_enable")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
	 * @return Response
     */
    public function enableOfferAction(Request $request)
    {
    	
    	$offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($request->get('offer_id'));
    	
    	if($offer)
    	{
    		$this->get('gsm_lot_offer.offer_manager')->enableOffer($offer);
    		
    		$this->get('session')->getFlashBag()->add('notice','The offer has been successfuly enabled');
    	}
    	
    	return $this->redirect($this->get('router')->generate('offer_admin_list'));
    }


	/**
	 * @param Request $request
	 * @return Response
	 * @Route("/disable/{offer_id}",name="offer_disable")
	 * @Security("has_role('ROLE_ADMIN')")
	 */
	public function disableOfferAction(Request $request)
	{
		$offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($request->get('offer_id'));

		if($offer)
		{
			$this->get('gsm_lot_offer.offer_manager')->disableOffer($offer);

			$this->get('session')->getFlashBag()->add('notice','The offer has been successfuly disabled');
		}

		return $this->redirect($this->get('router')->generate('offer_admin_list'));
	}
        
    /**
     * @Route("/create",name="offer_create")
	 * @return Response
	 * @param Request $request
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
    		
    		return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    	}
    	
    	return $this->render('GsmLotOfferBundle:Offer:create.html.twig',
    			array('form'=>$form->createView()));
    }
    
    
    /**
     * @Route("/update/{offer_id}",name="offer_update")
     * @Template()
	 * @return Response
	 * @param Request $request
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

                    return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    			}
    			
    			return $this->render('GsmLotOfferBundle:Offer:update.html.twig',
    					array('form'=>$form->createView()));		
    		}
    	}

			return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    }
    
    /**
     * @Route("/active/{offer_id}",name="offer_activate")
	 * @return Response
	 * @param integer $offer_id
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
    			
    			return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    		}
    	}

		return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    }
    
    
    /**
     * @Route("/deactive/{offer_id}",name="offer_deactive")
	 * @param integer $offer_id
	 * @return Response
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
    			
    			return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    		}
    	}

		return $this->redirect($this->get('router')->generate($this->get('session')->get('redirect')));
    }    
}
