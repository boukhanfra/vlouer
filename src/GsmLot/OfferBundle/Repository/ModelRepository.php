<?php

namespace GsmLot\OfferBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * 
 * @author aziz
 * @since 2015-11-07
 *
 */
class ModelRepository extends EntityRepository 
{
	
	/**
	 * @abstract Search model devices from database per model name or brand name
	 * @param string $model
	 * @return array
	 */
	public function findModelLike($model)
	{
		return 
		$this->createQueryBuilder('m')
		->join('GsmLotOfferBundle:Brand', 'b','WITH','m.brand = b.id')
		->where('m.name like :model OR b.name like :model')->setParameter('model', '%'.$model.'%')
		->getQuery()->getResult();
	}
	
}