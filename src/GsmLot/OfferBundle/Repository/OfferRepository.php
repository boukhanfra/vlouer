<?php

namespace GsmLot\OfferBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @since 12/11/2015
 * @author aziz
 * @abstract repository class for offer entity
 */
class OfferRepository extends EntityRepository 
{
	
	/**
	 * @return ArayCollection
	 * @abstract query to return number of offers grouped by brand
	 */
	public function getNumberMobileOfferBrand($type)
	{
		return $this->createQueryBuilder('o')
		->select('COUNT(0) as number,b.name as name,b.id as id')
		->join('GsmLotOfferBundle:Model', 'm','WITH','m.id = o.model')
		->join('GsmLotOfferBundle:Brand','b','WITH','b.id = m.brand')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->groupBy('b.name')
		->orderBy('b.name','asc')
		->getQuery()->getResult();
	}
	
	
	/**
	 * @return ArrayCollection
	 * @abstract query to return number of offers grouped by norm
	 */
	public function getNumberMobileOfferNorm($type)
	{
		return $this->createQueryBuilder('o')
		->select('COUNT(0) as number,n.description as name')
		->join('GsmLotOfferBundle:Norm', 'n','WITH','n.id = o.norm')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->groupBy('n.name')
		->orderBy('n.name','asc')
		->getQuery()->getResult();
	}

	/**
	 * @return ArrayCollection
	 * @abstract querty to return number of offers grouped by country
	 */
	public function getNumberMobileOfferCountry($type)
	{
		return $this->createQueryBuilder('o')
		->select('COUNT(0) as number,cn.name as name,cn.id as id')
		->join('GsmLotTraderBundle:Trader', 't','WITH','t.id = o.trader')
		->join('GsmLotTraderBundle:City','c','WITH','c.id = t.city')
		->join('GsmLotTraderBundle:Country','cn','WITH','cn.id = c.country')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->groupBy('cn.name')
		->orderBy('cn.name','asc')
		->getQuery()->getResult();
		
	}
	
	
}