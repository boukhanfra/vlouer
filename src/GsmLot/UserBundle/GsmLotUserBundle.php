<?php

namespace GsmLot\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GsmLotUserBundle extends Bundle
{
	public function getParent(){
		
		return "FOSUserBundle";
	}
}
