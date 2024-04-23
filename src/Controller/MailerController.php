<?php

namespace App\Controller;


use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/', name: 'contact')]
    public function contactForm(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $formData = $form->getData();

            $email = (new Email())
                ->from($formData['Email'])
                ->to('adeline.gilet33@gmail.com')
                ->subject($formData['Name'])
                ->text($formData['message']);

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');

            return $this->redirectToRoute('contact');
        }
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
