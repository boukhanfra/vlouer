<?php

namespace GoDaddy\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * @author aziz
 * @abstract Controlleur par défaut de l'application
 */
class IndexController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('GoDaddyIndexBundle:Index:index.html.twig');
    }
}
