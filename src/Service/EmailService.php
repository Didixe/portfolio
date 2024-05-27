<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\component\DependencyInjection\Attribute\Autowire;
use Twig\Environment;

class EmailService
{
//    #[Autowire('%admin_email%')] private string $adminEmail;
//    private MailerInterface $mailer;
//    private $twig;
//    private $urlGenerator;

//    public function __construct(MailerInterface $mailer, Environment $twig, UrlGeneratorInterface $urlGenerator)
    public function __construct(
        #[Autowire('%admin_email%')] private string $adminEmail,
        private MailerInterface $mailer,
    )
    {
//        $this->mailer = $mailer;
//        $this->twig = $twig;
//        $this->urlGenerator = $urlGenerator;
    }

    public function sendContactEmail(array $formData): void
    {
        // Création de l'e-mail
        $email = (new Email())
//            ->from($formData['Email'])
            ->from($this->adminEmail)
//            ->to('adeline.gilet33@gmail.com')
            ->to($this->adminEmail)
            ->subject('Nouveau message de ' . $formData['Name'])
            ->text('Nom: ' . $formData['Name'] . "\n" .
                'Email: ' . $formData['Email'] . "\n" .
                'Société: ' . $formData['company'] . "\n" .
                'Téléphone: ' . $formData['phone'] . "\n" .
                'Message: ' . $formData['message']);

        // Envoi de l'e-mail
        $this->mailer->send($email);
    }
}