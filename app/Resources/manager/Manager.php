<?php

use Doctrine\ORM\EntityManager;
/**
 * 
 * @author aziz
 *
 */
abstract class Manager 
{
	/**
	 * 
	 * @var EntityManager
	 */
	protected $em;
	
	/**
	 * 
	 * @param  $entity
	 */
	protected function persistAndFlush($entity)
	{
		$this->em->persist($entity);
		$this->em->flush();
	}
	
	
	/**
	 * 
	 * @param EntityManager $em
	 */
	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}
	
}