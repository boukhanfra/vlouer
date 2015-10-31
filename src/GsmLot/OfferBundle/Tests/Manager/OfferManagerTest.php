<?php

namespace GsmLot\OfferBundle\Tests\Manager;

use GsmLot\OfferBundle\Entity\Offer;
class OfferManagerTest extends \PHPUnit_Framework_TestCase
{
	
	public function testCreate()
	{
		$offer = new Offer();
		$offer->setActive(false);
		$offer->setCreatedOn(new \DateTime('now'));
		$offer->setDescription('The first offer created with phpunit test');
		$offer->setDisabled(false);
		$offer->setModificationDate(new \DateTime('now'));
		$offer->setPhisicalStock(10);
		$offer->setPrice(1500.20);
		$offer->setUsed(false);
		
		
	}
	
}