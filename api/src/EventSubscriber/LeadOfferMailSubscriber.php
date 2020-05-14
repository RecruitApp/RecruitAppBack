<?php
// api/src/EventSubscriber/LeadOfferMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Lead;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class LeadOfferMailSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendMail', EventPriorities::PRE_WRITE],
        ];
    }

    public function sendMail(ViewEvent $event): void
    {
        $lead = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$lead instanceof Lead || Request::METHOD_POST !== $method) {
            return;
        }
        $candidateMail = $lead->getEmail();

        $message = (new \Swift_Message('Recruit App rh : invation pour l\'offre'))
            ->setFrom('recruitapprh@gmail.com')
            ->setTo($candidateMail)
            ->setBody(sprintf('The offer #%d has been added.', $lead->getId()));

        $this->mailer->send($message);
    }
}