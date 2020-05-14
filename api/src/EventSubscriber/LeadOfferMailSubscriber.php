<?php
// api/src/EventSubscriber/LeadOfferMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Proposal;
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
        $proposal = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$proposal instanceof Proposal || Request::METHOD_POST !== $method) {
            return;
        }
        $applicantMail = $proposal->getApplicant()->getEmail();

        $message = (new \Swift_Message('Recruit App rh : invation pour l\'offre'))
            ->setFrom('recruitapprh@gmail.com')
            ->setTo($applicantMail)
            ->setBody(sprintf('The offer #%d has been added.', $proposal->getId()));

        $this->mailer->send($message);
    }
}