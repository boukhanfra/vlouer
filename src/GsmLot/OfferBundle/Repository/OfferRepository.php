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
		->select('COUNT(0) as number,n.description as name,n.id as id')
		->join('GsmLotOfferBundle:Norm', 'n','WITH','n.id = o.norm')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->groupBy('n.name')
		->orderBy('n.name','asc')
		->getQuery()->getResult();
	}

	/**
	 * @return ArrayCollection
	 * @abstract query to return number of offers grouped offers by country
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
	
	
	/**
	 * 
	 * @param string $type
	 * @param integer $brand_id
	 * @return ArrayCollection
	 * @abstract query to return number of grouped offers by model
	 */
	public function getNumberMobileOfferModel($type,$brand_id)
	{
		return $this->createQueryBuilder('o')
				->select('COUNT(0) as number,m.name as name,m.id as id')
				->join('GsmLotOfferBundle:Model','m','WITH','o.model = m.id')
				->join('GsmLotOfferBundle:Brand', 'b','WITH','b.id = m.brand AND b.id = :brand_id')
				->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
				->setParameter('type', $type)
				->setParameter('brand_id', $brand_id)
				->groupBy('m.name')
				->orderBy('m.name','asc')
				->getQuery()->getResult();
		
	}
	
	/**
	 * @abstract query that return list of offers filtred by brand
	 * @return ArrayCollection
	 * @param string $type
	 * @param integer $brand_id
	 */
	public function getMobileOfferByBrand($type,$brand_id)
	{
		return $this->createQueryBuilder('o')
		->join('GsmLotOfferBundle:Model','m','WITH','o.model = m.id')
		->join('GsmLotOfferBundle:Brand', 'b','WITH','b.id = m.brand AND b.id = :brand_id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->setParameter('brand_id', $brand_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
		
	}
	
	/**
	 * @abstract query that return list of offers filtered by country
	 * @return ArrayCollection
	 * @param string $type
	 * @param integer $country_id
	 */
	public function getMobileOfferByCountry($type,$country_id)
	{
		return $this->createQueryBuilder('o')
		->join('GsmLotTraderBundle:Trader', 't','WITH','t.id = o.trader')
		->join('GsmLotTraderBundle:City','c','WITH','c.id = t.city')
		->join('GsmLotTraderBundle:Country','cn','WITH','cn.id = c.country AND cn.id = :country_id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->setParameter('type', $type)
		->setParameter('country_id', $country_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
	}
	
}