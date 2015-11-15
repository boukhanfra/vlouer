<?php

namespace GsmLot\OfferBundle\Manager;

use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\IndexBundle\Entity\Manager;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * @since 29/10/2015
 * @author aziz
 * @abstract - Offer Business class
 * @package GsmLot\OfferBundle\Manager
 */
class OfferManager extends Manager 
{
	
	/**
	 * @abstract get repository for Offer Entity (Internal use)
	 * @return EntityRepository
	 */
	private function getRepository()
	{
		return $this->em->getRepository('GsmLotOfferBundle:Offer');
	}
	
	
	/**
	 * @abstract Business - create offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function createOffer(Offer $offer)
	{
		try
		{
			$offer->setCreatedOn(new \DateTime('now'));
			$offer->setDeviceType($this->em->getRepository('GsmLotOfferBundle:DeviceType')->find(1));
			$offer->setActive(false);
			$offer->setEnable(true);
			
			$this->persistAndFlush($offer);
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - update offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function updateOffer(Offer $offer)
	{
		try
		{
			$offer->setUpdateOn(new \DateTime('now'));
			
			$this->persistAndFlush($offer);
		}
		catch(\Exception $e)
		{
			throw $e;	
		}
	}
	
	/**
	 * @abstract Business - remove offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function removeOffer(Offer $offer)
	{
		try
		{
			$this->em->remove($offer);
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - deactivate offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function deactivateOffer(Offer $offer)
	{
		try 
		{
			if($offer->isActive())
			{
				$offer->setActive(false);
				
				$offer->setUpdateOn(new \DateTime('now'));
				
				$this->persistAndFlush($offer);
			}
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business activate Offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function activateOffer(Offer $offer)
	{
		try
		{
			if(!$offer->isActive())
			{
				$offer->setUpdateOn(new \DateTime('now'));
				
				$offer->setActive(true);
				
				$this->persistAndFlush($offer);
			}
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - disable Offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function disableOffer(Offer $offer)
	{
		try
		{
			if($offer->isEnabled())
			{
				$offer->setUpdateOn(new \DateTime('now'));
				
				$offer->setEnable(false);
				
				$this->persistAndFlush($offer);
			}
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - enble Offer function
	 * @param Offer $offer
	 * @throws Exception
	 */
	public function enableOffer(Offer $offer)
	{
		try
		{
			if(!$offer->isEnabled())
			{
				$offer->setUpdateOn(new \DateTime('now'));
				
				$offer->setEnable(true);
				
				$this->persistAndFlush($offer);
			}
		}
		catch(\Exception $e)
		{
			throw $e;	
		}
	}
	
	/**
	 * @abstract Business - get offer by id
	 * @param  $id
	 * @throws Exception
	 * @return Offer
	 */
	public function getOffer($id)
	{
		try
		{
			return $this->getRepository()->find($id);
		}
		
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - get number of offers grouped by brand name
	 * @throws Exception
	 * @return ArrayCollection
	 */
	public function getMobileGroupedOffersBrand($params)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getNumberMobileOfferBrand($params);
			
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - get number of offers grouped by norm
	 * @return ArrayCollection
	 * @throws Exception
	 */
	public function getMobileGroupedOffersNorm($params)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getNumberMobileOfferNorm($params);
			
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - get number offers grouped by country
	 * @param string $type
	 * @throws Exception
	 */
	public function getMobileGroupedOffersCountry($params)
	{
		try
		{
			return $this->em->getRepository('GsmLotOfferBundle:Model')->get($id);
			$list_count_offer = $this->getRepository()->getNumberMobileOfferCountry($params);
				
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business -get number of offers grouped by model
	 * @param string $type
	 * @param integer $brand_id
	 * @throws Exception
	 */
	public function getMobileGroupedOffersModel($type,$brand_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getNumberMobileOfferModel($type,$brand_id);
			
			return $list_count_offer;
				
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - get list of offers filtered by brand
	 * @param string $type
	 * @param integer $brand_id
	 * @throws Exception
	 */
	public function getMobileOfferBrand($type,$brand_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getMobileOfferByBrand($type,$brand_id);
				
			return $list_count_offer;
		
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - get number of offers grouped by city
	 * @param string $type
	 * @param integer $country_id
	 * @throws Exception
	 */
	public function getMobileGroupedOfferCity($type,$country_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getNumberMobileOfferCity($type,$country_id);
			
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Business - get list of offers filtered by country
	 * @param string $type
	 * @param integer $country_id
	 * @throws \Exception
	 */
	public function getMobileOfferCountry($type,$country_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getMobileOfferByCountry($type,$country_id);
			
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - get list of offers filtered by norm
	 * @param string $type
	 * @param integer $country_id
	 * @throws \Exception
	 */
	public function getMobileOfferNorm($type,$norm_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getMobileOfferByNorm($type,$norm_id);
				
			return $list_count_offer;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - get list of offers filtered by model
	 * @param string $type
	 * @param integer $model_id
	 * @throws Exception
	 */
	public function getMobileOfferModel($type,$model_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getMobileOfferByModel($type,$model_id);
			
			return $list_count_offer;
		}
		
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * @abstract Business - get list of offers filtered by model
	 * @param string $type
	 * @param integer $model_id
	 * @throws Exception
	 */
	public function getMobileOfferCity($type,$ctiy_id)
	{
		try
		{
			$list_count_offer = $this->getRepository()->getMobileOfferByCity($type,$ctiy_id);
				
			return $list_count_offer;
		}
	
		catch(\Exception $e)
		{
			throw $e;
		}
	}
}
