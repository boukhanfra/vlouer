<?php
namespace GsmLot\TraderBundle\Manager;


use GsmLot\IndexBundle\Entity\Manager;
use GsmLot\TraderBundle\Entity\Trader;

class TraderManager extends Manager
{

    /**
     * @return \GsmLot\TraderBundle\Repository\TraderRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository('GsmLotTraderBundle:Trader');
    }

    /**
     * @return array
     */
    public function getTraders()
    {
        return $this->getRepository()->findAll();
    }


    /**
     * @param $trader_id
     * @return null|object
     */
    public function getTrader($trader_id)
    {
        return $this->getRepository()->find($trader_id);
    }


    /**
     * @param Trader $trader
     * @throws \Exception
     */
    public function enableTrader(Trader $trader)
    {
        try
        {
            if (!$trader->getEnabled())
            {
                $trader->setEnabled(true);
                $this->persistAndFlush($trader);
            }
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }


    /**
     * @param Trader $trader
     * @throws \Exception
     */
    public function disableTrader(Trader $trader)
    {
        try
        {
            if ($trader->getEnabled())
            {
                $trader->setEnabled(false);
                $this->persistAndFlush($trader);
            }
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }
}