<?php

namespace GsmLot\MailBoxBundle\Repository;

use Doctrine\ORM\EntityRepository;
use GsmLot\TraderBundle\Entity\Trader;

class MessageRepository extends EntityRepository 
{

    /**
     * @param Trader $trader
     * @return array
     */
    public function getMailBox(Trader $trader)
    {
        return $this->createQueryBuilder('m')
                    ->join('GsmLotTraderBundle:Trader','t','WITH','t.traderReceiver = :trader')
                    ->setParameter('trader',$trader)
                    ->getQuery()
                    ->getResult();
    }

}