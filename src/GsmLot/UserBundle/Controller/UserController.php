<?php

namespace GsmLot\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/{id}")
     * @Template()
     */
    public function indexAction($id)
    {
       $user = $this->getDoctrine()->getRepository('GsmLotUserBundle:User')->find($id);
       
       echo $user->getTrader()->getFirstName();
       echo $user->getTrader()->getCity();
       
       //l'association ça marche daba khassek deconnecta o3awed tconnecta par ce que l'objet f session oma3endoch l'associationok
       
       exit();
    }
}
