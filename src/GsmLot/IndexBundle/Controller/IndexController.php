<?php

namespace GsmLot\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/hello/{name}",name="index_index")
     * @Template()
     */
    public function indexAction($name)
    {
        return  
        $this->render('GsmLotIndexBundle:Index:index.html.twig',array('name' => $name));
    }
}
