<?php

namespace AppBundle\Services;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MailerService
{
    protected $mailer;
    protected $templating;
    private $from = "no-reply@example.fr";
    private $reply = "contact@example.fr";
    private $name = "Equipe Dals Blog";

    public function __construct($mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendMessage($to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($data->getEmail())
            ->setTo('cbelier2@gmail.com')
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo('925901abb7-fccc9b@inbox.mailtrap.io')
            ->setContentType('text/html');

        $this->mailer->send($mail);

        $this->addFlash('success', 'Votre inscription est validée');

    }
    public function contactAction()
    {
            $message = \Swift_Message::newInstance();

            $message
                ->setSubject('Contact enquiry from symblog')
                ->setFrom('enquiries@symblog.co.uk')
                ->setTo('email@email.com')
                ->setBody($this->renderView('AppBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->Add('notice', 'Your contact enquiry was successfully sent. Thank you!');

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
        }

}