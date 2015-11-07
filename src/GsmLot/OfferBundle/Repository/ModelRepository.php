<?php

namespace GsmLot\OfferBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ModelRepository extends EntityRepository 
{
	
	
	public function findModelLike($model)
	{
		return 
		$this->createQueryBuilder('m')
		->where('m.name like :model')->setParameter('model', '%'.$model.'%')
		->getQuery()->getResult();
	}
	
}