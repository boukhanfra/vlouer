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
	public function getNumberMobileOfferBrand($params)
	{
		return $this->createQueryBuilder('o')
		->select('COUNT(0) as number,b.name as name,b.id as id')
		->join('GsmLotOfferBundle:Model', 'm','WITH','m.id = o.model')
		->join('GsmLotOfferBundle:Brand','b','WITH','b.id = m.brand')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $params['type'])
		->groupBy('b.name')
		->orderBy('b.name','asc')
		->getQuery()->getResult();
	}
	
	
	/**
	 * @return ArrayCollection
	 * @abstract query to return number of offers grouped by norm
	 */
	public function getNumberMobileOfferNorm($params)
	{
		$query =  $this->createQueryBuilder('o')
		->select('COUNT(0) as number,n.description as name,n.id as id')
		->join('GsmLotOfferBundle:Norm', 'n','WITH','n.id = o.norm')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type');
		if(isset($params['brand_id']))
		{
			$query->join('GsmLotOfferBundle:Model', 'm','WITH','o.model= m.id');
			$query->join('GsmLotOfferBundle:Brand', 'b','WITH','m.brand = b.id AND b.id = :brand_id');
			$query->setParameter(':brand_id', $params['brand_id']);
		}
	 $query->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $params['type'])
		->groupBy('n.name')
		->orderBy('n.name','asc');
		
		return $query->getQuery()->getResult();
	}

	/**
	 * @return ArrayCollection
	 * @abstract querty to return number of offers grouped by country
	 */
	public function getNumberMobileOfferCountry($params)
	{
		$query = $this->createQueryBuilder('o')
		->select('COUNT(0) as number,cn.name as name,cn.id as id')
		->join('GsmLotTraderBundle:Trader', 't','WITH','t.id = o.trader')
		->join('GsmLotTraderBundle:City','c','WITH','c.id = t.city')
		->join('GsmLotTraderBundle:Country','cn','WITH','cn.id = c.country')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type');
		if(isset($params['brand_id']))
		{
			$query->join('GsmLotOfferBundle:Model', 'm','WITH','o.model= m.id');
			$query->join('GsmLotOfferBundle:Brand', 'b','WITH','m.brand = b.id AND b.id = :brand_id');
			$query->setParameter(':brand_id', $params['brand_id']);
		}
		return $query->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $params['type'])
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
				->where('o.active = true')
				->andWhere('o.enable = true')
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
		->where('o.active = true')
		->andWhere('o.enable = true')
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
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $type)
		->setParameter('country_id', $country_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
	}
	
	
	/**
	 * 
	 * @param string $type
	 * @param integer $country_id
	 * @return ArrayCollection
	 */
	public function getNumberMobileOfferCity($type,$country_id)
	{
		return $this->createQueryBuilder('o')
		->select('COUNT(0) as number,c.name as name,c.id as id')
		->join('GsmLotTraderBundle:Trader','t','WITH','o.trader = t.id')
		->join('GsmLotTraderBundle:City', 'c','WITH','t.city = c.id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->join('GsmLotTraderBundle:Country','cn','WITH','c.country = cn.id AND cn.id = :country_id')
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $type)
		->setParameter('country_id', $country_id)
		->groupBy('c.name')
		->orderBy('c.name','asc')
		->getQuery()->getResult();
		
	}
	
	/**
	 * @abstract query that return list of offers filtered by norm
	 * @return ArrayCollection
	 * @param string $type
	 * @param integer $country_id
	 */
	public function getMobileOfferByNorm($type,$norm_id)
	{
		return $this->createQueryBuilder('o')
		->join('GsmLotTraderBundle:Trader', 't','WITH','t.id = o.trader')
		->join('GsmLotTraderBundle:Norm','n','WITH','n.id = o.norm AND n.id = :norm_id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $type)
		->setParameter('norm_id', $norm_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
	}
	
	
	/**
	 * @abstract query that return list of offers filtered by model
	 * @return ArrayCollection
	 * @param string $type
	 * @param integer $model_id
	 */
	public function getMobileOfferByModel($type,$model_id)
	{
		return $this->createQueryBuilder('o')
		->join('GsmLotOfferBundle:Model', 'm','WITH','o.model = m.id AND m.id = :model_id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $type)
		->setParameter('model_id', $model_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
		
	}
	
	/**
	 * @abstract query that return list of offers filtered by city
	 * @return ArrayCollection
	 * @param string $type
	 * @param integer $city_id
	 */
	public function getMobileOfferByCity($type,$city_id)
	{
		return $this->createQueryBuilder('o')
		->join('GsmLotTraderBundle:Trader', 't','WITH','o.trader = t.id')
		->join('GsmLotTraderBundle:City','c','WITH','t.city = c.id AND c.id = :city_id')
		->join('GsmLotOfferBundle:OfferType','tp','WITH','o.offerType = tp.id and tp.name = :type')
		->where('o.active = true')
		->andWhere('o.enable = true')
		->setParameter('type', $type)
		->setParameter('city_id', $city_id)
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
		
	}
}
