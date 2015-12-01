<?php

namespace GsmLot\TraderBundle\Manager;

use GsmLot\IndexBundle\Entity\Manager;

class CityManager extends Manager
{
	
	
	/**
	 * @abstract Business - get repository class for city entity
	 */
	private function getRepository()
	{
		return $this->em->getRepository('GsmLotTraderBundle:City');
	}
	
	
	/**
	 * @abstract Business - get cities by country_id
	 * @param integer $country_id
	 * @return ArrayCollection
	 * @throws Exception
	 */
	public function getCitiesByCountry($country_id)
	{
		try
		{
			return $this->getRepository()->findBy(array('country'=>$country_id));
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}