<?php

namespace GsmLot\MailBoxBundle\Controller;

use GsmLot\MailBoxBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use GsmLot\UserBundle\Entity\User;

class MailBoxController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/send/{offer_id}",name="message_send")
     */
    public function sendMessageAction(Request $request)
    {
        $offer = $this->get('gsm_lot_offer.offer_manager')->getOffer($request->get('offer_id'));

        if($offer)
        {
            $message = new Message();

            /**
             * @var $user User
             */
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $message->setSenderTrader($user->getTrader());
            $message->setOffer($offer);
            $message->setReciverTrader($offer->getTrader());

            $form = $this->createForm($this->get('gsm_lot_mail_box.mail_form'),$message);

            return $this->render('GsmLotMailBoxBundle:MailBox:create.html.twig',
                        array('form'=>$form->createView()));
        }
        else
        {
            return $this->redirect($this->get('router')->generate('offer_mobile'));
        }

    }
}
