<?php

namespace GsmLot\OfferBundle\Manager;

use Exception;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\IndexBundle\Entity\Manager;
use GsmLot\OfferBundle\Repository\OfferRepository;

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
	 * @return OfferRepository
	 */
	private function getRepository()
	{
		return $this->em->getRepository('GsmLotOfferBundle:Offer');
	}


	/**
	 * @param $params
	 * @return mixed
	 * @throws Exception
	 */
	public function offerList($params)
	{
		try
		{
			return $this->getRepository()->offerFilter($params);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}

	/**
	 * @return array
	 */
	public function offerListAdmin()
	{
		return $this->getRepository()->getAllOffers();
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
			$offer->setActive(true);
			$offer->setEnable(false);
			
			$this->persistAndFlush($offer);
		}
		catch(Exception $e)
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

			$offer->setEnable(false);
			
			$this->persistAndFlush($offer);
		}
		catch(Exception $e)
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
		catch(Exception $e)
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
		catch(Exception $e)
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
		catch(Exception $e)
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
		catch(Exception $e)
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
		catch(Exception $e)
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
		
		catch(Exception $e)
		{
			throw $e;
		}
	}

	/**
	 * @return array
	 * @throws Exception
	 * @param $type
	 */
	public function getOfferReport($type)
	{
		try
		{
			return $this->getRepository()->getOfferReport($type);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}


	/**
	 * @param $trader
	 * @return array
	 */
	public function getOfferTrader($trader)
	{
		return $this->getRepository()->findBy(array('trader'=>$trader));
	}
}