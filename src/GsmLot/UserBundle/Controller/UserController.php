<?php

namespace GsmLot\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{


    /**
     * @Route("/showCities",name="show_cities",options={"expose":"true"})
     * @Template()
     */
    

    public function showCitiesAction()
    {
    
    	//   $user = $this->getDoctrine()->getRepository('GsmLotUserBundle:User')->find($id);
    
    	$request = $this->getRequest();
    
    
    	if($request->isXmlHttpRequest()) { // pour vérifier la présence d'une requete Ajax
    		 
    		$id = 'USA';
    		$id = $request->get('id_country');
    		$country='';
    		 
    		if ($id != '--selectionnez un parc--') {
    		
    			$country = $this->getDoctrine()->getRepository('GsmLotTraderBundle:Country')->find($id);
    			$cities=$country->getCities();
    
    			$tabEnsembles = array();
    			$i = 0;
    
    			foreach($cities as $e) { // transformer la réponse de la requete en tableau qui remplira le select pour ensembles
    				$tabEnsembles[$i]['id'] = $e->getId();
    				$tabEnsembles[$i]['nom'] = $e->getName();
    				$i++;
    			}
    
    			$response = new Response();
    
    			$data = json_encode($tabEnsembles); // formater le résultat de la requête en json
    
    			$response->headers->set('Content-Type', 'application/json');
    			$response->setContent($data);
    
    			return $response;
    		}
    
    	} else {
    
    		return new Response('et BIM ça plante');
    	}
    
    }
    
  
}
