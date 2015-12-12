<?php

namespace GsmLot\IndexBundle\Twig;


class GsmLotExtension extends \Twig_Extension
{

    public function getFilters()
    {

        return array(
            new \Twig_SimpleFilter('offer',array($this,'offerFilter')),
            new \Twig_SimpleFilter('request',array($this,'requestFilter'))
        );
    }

    public function offerFilter($list)
    {
        $list_offer = array();

        foreach($list as $offer)
        {
            if($offer->getOfferType()->getName() =='sell')
            {
                $list_offer[] = $offer;
            }
        }

        return $list_offer;
    }

    public function requestFilter($list)
    {

        $list_request = array();

        foreach($list as $offer)
        {
            if($offer->getOfferType()->getName() =='buy')
            {
                $list_request[] = $offer;
            }
        }

        return $list_request;
    }

    public function getName()
    {

    }

}