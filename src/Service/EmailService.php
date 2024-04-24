<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class EmailService
{
    private MailerInterface $mailer;
    private $twig;
    private $urlGenerator;

    public function __construct(MailerInterface $mailer, Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function sendContactEmail(array $formData): void
    {
        // Création de l'e-mail
        $email = (new Email())
            ->from($formData['Email'])
            ->to('adeline.gilet33@gmail.com')
            ->subject('Nouveau message de ' . $formData['Name'])
            ->text('Nom: ' . $formData['Name'] . "\n" .
                'Société: ' . $formData['company'] . "\n" .
                'Téléphone: ' . $formData['phone'] . "\n" .
                'Message: ' . $formData['message']);

        // Envoi de l'e-mail
        $this->mailer->send($email);
    }
}