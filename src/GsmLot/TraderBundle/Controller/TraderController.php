<?php

namespace GsmLot\TraderBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;


class TraderController extends Controller
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
        $this->breadcrumbs->addItem('index.menu.traders',$this->get('router')->generate('trader_list'));

    }

    /**
     * @Route("/",name="trader_list")
     * @Security("has_role('ROLE_ADMIN')")
     * @return Response
     * @param $request Request
     */
    public function indexAction(Request $request)
    {
        $trader_list = $this->get('gsm_lot_trader.trader_manager')->getTraders();

        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate($trader_list,$request->query->getInt('page',1),10);

        return $this->render('GsmLotTraderBundle:Trader:list.html.twig',array('pagination'=>$pagination));
    }


    /**
     * @param Request $request
     * @Route("/enable/{trader_id}",name="trader_enable")
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function enableAction(Request $request)
    {
        $trader = $this->get('gsm_lot_trader.trader_manager')->getTrader($request->get('trader_id'));

        if($trader)
        {
            $this->get('gsm_lot_trader.trader_manager')->enableTrader($trader);

            $this->get('session')->getFlashBag()->add('notice','trader.enable_success');
        }

        return $this->redirect($this->get('router')->generate('trader_list'));
    }



    /**
     * @param Request $request
     * @Route("/disable/{trader_id}",name="trader_disable")
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function disableAction(Request $request)
    {
        $trader = $this->get('gsm_lot_trader.trader_manager')->getTrader($request->get('trader_id'));

        if($trader)
        {
            $this->get('gsm_lot_trader.trader_manager')->disableTrader($trader);

            $this->get('session')->getFlashBag()->add('notice','trader.disable_success');
        }

        return $this->redirect($this->get('router')->generate('trader_list'));
    }
}
