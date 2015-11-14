<?php

namespace GsmLot\OfferBundle\Manager;

use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\IndexBundle\Entity\Manager;
use GsmLot\OfferBundle\Entity\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @since 29/10/2015
 * @author aziz
 * @abstract - Offer Business class
 * @package GsmLot\OfferBundle\Manager
 */
class OfferManager extends Manager 
{
	
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
			//$offer->setModel($this->em->getRepository('GsmLotOfferBundle:Model')->find(1));
			$offer->setActive(false);
			$offer->setDisabled(false);
			
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
			if(!$offer->isDisabled())
			{
				$offer->setUpdateOn(new \DateTime('now'));
				
				$offer->setDisabled(true);
				
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
			if($offer->isDisabled())
			{
				$offer->setUpdateOn(new \DateTime('now'));
				
				$offer->setDisabled(false);
				
				$this->persistAndFlush($offer);
			}
		}
		catch(\Exception $e)
		{
			throw $e;	
		}
	}
	
	
	/**
	 * @abstract Business - Search a mode of device by name
	 * @param string $model
	 * @return Model
	 * @throws Exception
	 */
	public function searchModel($model)
	{
		try
		{
			$results = $this->em->getRepository('GsmLotOfferBundle:Model')->findModelLike($model);
			
			return $results;
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * @abstract Bussiness - get a model by id
	 * @param integer $id
	 * @throws Exception
	 * @return Model
	 */
	public function getModel($id)
	{
		try
		{
			return $this->em->getRepository('GsmLotOfferBundle:Model')->find($id);
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
			return $this->em->getRepository('GsmLotOfferBundle:Offer')->find($id);
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
	public function getMobileOffersBrand($type)
	{
		try
		{
			$list_count_offer = $this->em->getRepository('GsmLotOfferBundle:Offer')->getNumberMobileOfferBrand($type);
			
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
	public function getMobileOffersNorm($type)
	{
		try
		{
			$list_count_offer = $this->em->getRepository('GsmLotOfferBundle:Offer')->getNumberMobileOfferNorm($type);
			
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
	public function getMobileOffersCountry($type)
	{
		try
		{
			$list_count_offer = $this->em->getRepository('GsmLotOfferBundle:Offer')->getNumberMobileOfferCountry($type);
				
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
	public function getMobileOffersModel($type,$brand_id)
	{
		try
		{
			$list_count_offer = $this->em->getRepository('GsmLotOfferBundle:Offer')->getNumberMobileOfferModel($type,$brand_id);
			
			return $list_count_offer;
				
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
	
	/**
	 * Business - get list of offers filtered by brand
	 * @param string $type
	 * @param integer $brand_id
	 * @throws Exception
	 */
	public function getMobileOfferBrand($type,$brand_id)
	{
		try
		{
			$list_count_offer = $this->em->getRepository('GsmLotOfferBundle:Offer')->getMobileOfferByBrand($type,$brand_id);
				
			return $list_count_offer;
		
		}
		catch(\Exception $e)
		{
			throw $e;
		}
	}
	
}