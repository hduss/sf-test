<?php

namespace CustomerBundle\Service;

use Doctrine\ORM\EntityManager;


class BalanceWatcher
{

	private $manager;


	public function __construct(EntityManager $manager)
	{
		$this->manager = $manager;
	}


	public function getCustomerWithBalanceLowerThan($balance)
	{
		$qb = $this->manager->createQueryBuilder();

		$query = $qb
			->from('CustomerBundle:Customer', 'c')
			->select('c')
			->where($qb->expr()->lte('c.balance', ':balance'))
			->getQuery()
			->setParameter('balance', $balance);

		return $query->getResult();


	}
}