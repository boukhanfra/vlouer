<?php

namespace GsmLot\OfferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OfferController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function listAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        return $this->render('GsmLotOfferBundle:Offer:list.html.twig',array('user'=>$user));
    }
        
    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction()
    {
    	return $this->render('GsmLotOfferBundle:Offer:create.html.twig');
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
