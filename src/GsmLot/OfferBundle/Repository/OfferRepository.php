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
	 * @return array
	 */
	public function getAllOffers()
	{
		return $this->createQueryBuilder('o')
					->orderBy('o.createdOn','desc')
					->getQuery()
					->getResult();
	}
	
	/**
	 * @abstract query that return list of offers filtered by norm
	 * @return ArrayCollection
	 * @param $params
	 */
	public function offerFilter($params)
	{
		$query =  $this->createQueryBuilder('o')
						->join('GsmLotOfferBundle:OfferState','os','WITH','o.offerState = os.id')
						->join('GsmLotOfferBundle:Norm', 'n','WITH','o.norm = n.id')
						->join('GsmLotOfferBundle:Model', 'm','WITH','o.model = m.id')
						->join('GsmLotOfferBundle:Brand', 'b','WITH','m.brand = b.id')
						->join('GsmLotTraderBundle:Trader', 't','WITH','o.trader = t.id')
			  			->join('GsmLotTraderBundle:City','c','WITH','t.city = c.id')
						->join('GsmLotTraderBundle:Country','cn','WITH','c.country = cn.id');
		
		$query->where('1=1');

		if(isset($params['state']))
		{
			if($params['state'] == 'new')
			{
				$query->andWhere('os.name = :state')
					  ->setParameter('state',$params['state']);
			}
			elseif($params['state'] == 'used')
			{
				$query->andWhere('os.name = :state1 OR os.name = :state2')
					  ->setParameter('state1','used')
				     ->setParameter('state2','tested');
			}
		}

		if(isset($params['norm']))
		{
			$query->andWhere('n.id=:norm_id')
				  ->setParameter('norm_id',$params['norm']);
		}
		
		if(isset($params['model']))
		{
			$query->andWhere('m.id = :model_id')
				  ->setParameter('model_id', $params['model']);
		}
		
		if(isset($params['brand']))
		{
			$query->andWhere('b.id = :brand_id')
				   ->setParameter('brand_id', $params['brand']);
		}
		

		if(isset($params['city']))
		{
			$query->andWhere('c.id = :city_id')
				   ->setParameter('city_id', $params['city']);
		}
		
		if(isset($params['country']))
		{
			$query->andWhere('cn.id = :country_id')
				  ->setParameter('country_id', $params['country']);
		}
		
		return $query->andWhere('o.active = true')
		->andWhere('o.enable = true')
		->andWhere('t.enabled = true')
		->orderBy('o.createdOn','desc')
		->getQuery()->getResult();
	}


	/**
	 * @return array
	 * @param $type
	 */
	public function getOfferReport($type)
	{
		return $this->createQueryBuilder('o')
					->select('m.name as model')
					->addSelect('b.name as brand')
					->addSelect('sum(o.quantity) as quantity')
					->addSelect('avg(o.price) as price')
					->addSelect('count(t.id) as sellers')
					->addSelect('o.currency as currency')
					->join('GsmLotOfferBundle:Model','m','WITH','o.model = m.id')
					->join('GsmLotOfferBundle:Brand','b','WITH','m.brand = b.id')
					->join('GsmLotTraderBundle:Trader','t','WITH','o.trader = t.id')
					->join('GsmLotOfferBundle:OfferType','ot','WITH','o.offerType = ot.id AND ot.name= :type')
					->where('o.active = true')
					->andWhere('o.enable = true')
					->andWhere('t.enabled = true')
					->groupBy('m.name')
					->addGroupBy('b.name')
					->setParameter('type',$type)
					->setMaxResults(5)
					->getQuery()
					->getArrayResult();
	}
}