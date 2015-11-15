<?php

namespace GsmLot\OfferBundle\Manager;

use GsmLot\IndexBundle\Entity\Manager;

/**
 * 
 * @author aziz
 *
 */
class ModelManager extends Manager 
{
	
	/**
	 * @abstract get repository of Model Entity (for internal use)
	 */
	private function getRepository()
	{
		return $this->em->getRepository('GsmLotOfferBundle:Model');
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
	
}